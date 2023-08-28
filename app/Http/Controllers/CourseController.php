<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    function index()
    {
      $courses = Course::get();
      return view('course.index', ['courses' => $courses]);
    }
    function show($id)
    {
      $course = Course::where('id', $id)->first();
      return view('course.show', ['course' => $course]);
    }
}
