<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function show(Course $course)
    {
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
