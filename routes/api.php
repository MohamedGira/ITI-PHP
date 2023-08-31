<?php


use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\EnrollmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/students',[StudentController::class,'index'])->name('student.index');
Route::post('/students',[StudentController::class,'store'])->name('student.store');
Route::get('/students/{id}',[StudentController::class,'show'])->name('student.show');
Route::patch('/students/{id}',[StudentController::class,'update'])->name('student.update');
Route::delete('/students/{id}',[StudentController::class,'destroy'])->name('student.delete');

Route::get('/courses',[CourseController::class,'index'])->name('course.index');
Route::get('/courses/{id}',[CourseController::class,'show'])->name('course.show');


Route::get('/courses/{id}/students',[CourseController::class,'getStudents'])->name('course.showStudents');
Route::get('/students/{id}/my-courses',[StudentController::class,'myCourses'])->name('student.myCourses');

Route::get('/enrollments',[EnrollmentController::class,'index'])->name('course.index');
Route::post('/enrollments',[EnrollmentController::class,'store'])->name('student.store');
