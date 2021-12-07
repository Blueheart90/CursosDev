<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
       
        // Obtenemos solo los cursos con el status de 'publicado (3)'
        // Con la el numero de estudiantes relacionados con el
        //Y Con el promedio de la relacion reviews en el campo rating
        // Ordernar de forma desc
        //$courses = Course::where('status', '3')->withCount('students')->withAvg('reviews', 'rating')->get(); 
        $courses = Course::where('status', '3')->latest('id')->get(); 
  

        return view('welcome',compact('courses'));
    }
}
