<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/students/create','student.create')->name('student.create');
Route::get('/students',[StudentController::class,'index'])->name('student.index');
Route::get('/students/{id}',[StudentController::class,'show'])->name('student.show');
Route::get('/students/{id}/edit',[StudentController::class,'edit'])->name('student.edit');

Route::post('/students',[StudentController::class,'store'])->name('student.store');
Route::put('/students/{id}',[StudentController::class,'update'])->name('student.update');
Route::delete('/students/{id}',[StudentController::class,'destroy'])->name('student.delete');

Route::get('/courses',[CourseController::class,'index'])->name('course.index');
Route::get('/courses/{id}',[CourseController::class,'show'])->name('course.show');