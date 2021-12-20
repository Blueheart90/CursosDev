<?php

use App\Http\Controllers\Instructor\CourseController;
use Illuminate\Support\Facades\Route;

// Todos los 'names' de la rutas empiezan con 'intructor.' Ej: 'instructor.courses.index'

Route::redirect('', 'instructor/courses');

Route::resource('/courses', CourseController::class )->names('courses');

