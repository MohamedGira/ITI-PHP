<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Enrollment;
use Exception;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
  function index()
  {
    $enrollments = Enrollment::get();
    return response(['data' => $enrollments]);
  }
  function show($id)
  {
    $enrollment = Enrollment::where('id', $id)->first();
    if ($enrollment)
      return response(['data' => $enrollment]);
    return response(['data' => 'item not found'], 404);
  } 
  
  public function store(Request $request)
  {
    try {
    $request->validate([
      'student_id' => 'required',
      'course_id' => 'required',
    ]);
      $stdata = $request->except('_token', '_method');
      Enrollment::create($stdata);
      return response()->json(['message' => 'Created successfuly'], 201);
    } catch (Exception $e) {
      return response()->json(['message' => $e->getMessage()], 400);
    }
  }
}
