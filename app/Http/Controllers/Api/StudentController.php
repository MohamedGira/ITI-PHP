<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
  function index()
  {
    $students = Student::get();
    return response()->json(['data' => $students]);
  }
  function show($id)
  {
    $student = Student::where('id', $id)->first();
    if (!$student)
      return response(['data' => 'item not found'], 404);
    return response(['data' => $student]);
  }


  public function store(Request $request)
  {

    try {
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'name' => 'required',
        'email' => 'required|email',
        'track' => 'required',
      ]);

      $filename = uniqid() . "." . $request->image->extension();
      $request->image->move(public_path('images'), $filename);
      $stdata = $request->except('_token', '_method');
      $stdata['image'] = $filename;
      Student::create($stdata);
      return response()->json(['message' => 'Created successfuly'], 201);
    } catch (Exception $e) {
      return response()->json(['message' => $e->getMessage()], 400);
    }
  }


  public function update($id, Request $request)
  {
    try {
      $stdata = $request->except('_token', '_method');
      if ($request->hasFile('image')) {
        $filename = uniqid() . "." . $request->image->extension();
        $request->image->move(public_path('Images'), $filename);
        $stdata['image'] = $filename;
      }

      $student = Student::find($id);
      if(!$student)
        return response()->json(['message' => 'this student does\'t exist'], 400);
        
      $old_image = $student->image;
      $student->update($stdata);
      if ($old_image != 'default.jpg' && $request->hasFile('image'))
        File::delete(public_path('Images/' . $old_image));
      return response()->json(['message' => 'updated Successfully']);
    } catch (Exception $e) {
      return response()->json(['message' => $e->getMessage()], 400);
    }
  }


  public function destroy($id)
  {
    try {
      $student = Student::find($id);
      if (!$student) 
        return response()->json(['message' => 'this student does\'t exist'], 400);

      $student->delete();
      if ($student->image != 'default.jpg')
        File::delete(public_path('Images/' . $student->image));
      return response()->json([], 204);
      
    } catch (Exception $e) {
      return response()->json(['message' => $e->getMessage()], 500);
    }
  }


  function myCourses($id)
  {
    $student = Student::find($id);
    if (!$student)
      return response(['message' => 'item not found'], 404);
      $courses=[];
      foreach ( $student->enrollments as $enrollment){
        $courses[]=$enrollment->course;
      }
    return response(['data'=>$courses]);
  }
}
