<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

// Prefix: admin, Name: admin.
Route::get('/',[HomeController::class, 'index'])->name('home');

Route::resource('roles',RoleController::class)->names('roles');
