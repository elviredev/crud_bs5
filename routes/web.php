<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
  return view('home');
});

// students routes
Route::get('/students', [StudentsController::class, 'index'])
    ->name('students.index');
Route::get('/students/create', [StudentsController::class, 'create'])
    ->name('students.create');
Route::post('/students', [StudentsController::class, 'store'])
    ->name('students.store');
Route::get('/students/{student}', [StudentsController::class, 'show'])
  ->name('students.show');
