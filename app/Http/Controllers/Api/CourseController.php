<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
  function index()
  {
    $courses = Course::get();
    return response(['data' => $courses]);
  }
  function show($id)
  {
    $course = Course::where('id', $id)->first();
    if (!$course)
      return response(['message' => 'item not found'], 404);
    return response(['data' => $course]);
  }
  function getStudents($id)
  {
    $course = Course::find($id);
    if (!$course)
      return response(['message' => 'item not found'], 404);
      $students=[];
      foreach ( $course->enrollments as $enrollment){
        $students[]=$enrollment->student;
      }
    return response(['data'=>$students]);
  }
}
