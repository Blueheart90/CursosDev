<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 2)->paginate();
        
        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $this->authorize('revision', $course);

        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course)
    {
        $this->authorize('revision', $course);
        
        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image) {
            return back()->with('error', 'No se puede publicar un curso que este incompleto.');
            
        }

        $course->status = 3;
        $course->save();

        // Enviando mail
        // Mail::to($course->teacher)->send(new ApprovedCourse($course));

        // Poner el envio del mail en una cola de trabajo - queue
        Mail::to($course->teacher)->queue(new ApprovedCourse($course));

        return redirect()->route('admin.courses.index')->with('success', 'El curso se publicó con éxito.');
        
    }

    public function observation(Course $course)
    {
        return view('admin.courses.observation', compact('course'));
    }

    public function reject(Request $request, Course $course)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $course->observation()->create([
            'body' => $request->body
        ]);

        $course->status = 1;
        $course->save();
        Mail::to($course->teacher)->queue(new RejectCourse($course));

        return redirect()->route('admin.courses.index')->with('success', 'El curso se Rechazó con éxito.');

    }
}
