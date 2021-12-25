<?php

use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;
use Illuminate\Support\Facades\Route;

// Todos los 'names' de la rutas empiezan con 'intructor.' Ej: 'instructor.courses.index'

Route::redirect('', 'instructor/courses');

Route::resource('/courses', CourseController::class )->names('courses');

Route::get('courses/{course}/curriculum', CoursesCurriculum::class )->name('courses.curriculum');
Route::get('courses/{course}/goals', [CourseController::class, 'goals'] )->name('courses.goals');
Route::get('courses/{course}/students', CoursesStudents::class)->name('courses.students');

