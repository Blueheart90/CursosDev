<?php

use App\Http\Livewire\InstructorCourses;
use Illuminate\Support\Facades\Route;

// Todos los 'names' de la rutas empiezan con 'intructor.' Ej: 'instructor.courses.index'

Route::redirect('', 'instructor/courses');

Route::get('/courses', InstructorCourses::class )->middleware('can:Leer cursos')->name('courses.index');

