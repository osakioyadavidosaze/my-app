<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::resource('students', StudentController::class);
