<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    function index()
    {
      $enrollments = Enrollment::get();
      return view('enrollment.index', ['enrollments' => $enrollments]);
    }
    function show($id)
    {
      $enrollment = Enrollment::where('id', $id)->first();
      return view('enrollment.show', ['enrollment' => $enrollment]);
    }
  
}
