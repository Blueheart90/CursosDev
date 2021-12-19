<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseController extends Controller
{
    // estas clases ya vienen al extender Controller 
    // use AuthorizesRequests;
    

    public function enrolled(Course $course)
    {
        // Agregando registro en la tabla pivot (Relacion M:M)
        $course->students()->attach(auth()->user()->id);

        return redirect()->route('courses.status', $course);
    }

    public function show(Course $course)
    {
        // policy qye verifica que el curso este con el status
        $this->authorize('published', $course);

        $similares = Course::where([
            ['category_id', $course->category_id],
            ['id', '!=', $course->id],
            ['status', 3],
        ])
        ->latest('id')
        ->take(5)
        ->get();

        return view('courses.show', compact('course','similares'));
    }

    public function index()
    {
        return view('courses.index');
    }
}
