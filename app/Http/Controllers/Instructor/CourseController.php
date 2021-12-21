<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Level;
use App\Models\Price;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.courses.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $pricies = Price::pluck('name', 'id');

        return view('instructor.courses.create', compact('categories', 'levels', 'pricies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'max:4000|image',
        ]);

        // $course = Course::create($request->all());
        $course = auth()->user()->courses_dictated()->create($request->all());

        // Si el user sube una foto
        if($request->hasFile('file')){ 

            // Almacena la imagen en myapp/storage/app/public
            // Ej. 'courses/image_name.jpg'
            $url = $request->file('file')->store('courses', 'public');

            $course->image()->create([
                'url' => $url,
            ]);
        }
        
        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $pricies = Price::pluck('name', 'id');

        return view('instructor.courses.edit', compact('course', 'categories', 'levels', 'pricies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image',
            'file' => 'max:4000|image',
        ]);

        $course->update($request->all());
        // Si el user sube una foto
        if($request->hasFile('file')){ 

            // Almacena la imagen en myapp/storage/app/public
            // Ej. 'courses/image_name.jpg'
            $url = $request->file('file')->store('courses', 'public');
  
            // Consultamos si el curso ya tiene una imagen asociada
            if (isset($course->image)) {

                // Si es asi, preguntamos si esta imagen existe en la carpeta 'public/courses/image.jpg
                if (Storage::exists( 'public/' . $course->image->url)) {
                    // Si esta existe se elimina
                    Storage::delete( 'public/' . $course->image->url);
                } 
                // actualizamos por medio de la relacion la url
                $course->image()->update([
                    'url' => $url,
                ]);

                
            }else{
                // Si no tiene una imagen aun entonces creamos un nuevo registro en la tabla imagen
                $course->image()->create([
                    'url' => $url,
                ]);
                
            }

        }

        return redirect()->route('instructor.courses.edit', $course);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
