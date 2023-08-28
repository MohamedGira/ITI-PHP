<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class StudentController extends Controller
{
  function index()
  {
    $students = Student::get();
    return view('student.index', ['students' => $students]);
  }
  function show($id)
  {
    $student = Student::where('id', $id)->first();
    return view('student.show', ['student' => $student]);
  }

  public function create()
  {
    return view('student.create');
  }

  public function store(Request $request)
  {
  
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'name' => 'required',
      'email' => 'required|email',
    ]);

    $filename=uniqid().".".$request->image->extension();
    $request->image->move(public_path('images'),$filename);
    $stdata=$request->except('_token','_method');
    $stdata['image']=$filename;
    Student::create($stdata);
    return redirect()->route('student.index');

  }
  public function edit($id)
  {
    $student= Student::find($id);
    return view('student.edit',compact('student'));
  }


  public function update($id,Request $request)
  { 
    $stdata=$request->except('_token','_method');
    if($request->hasFile('image')){
      $filename=uniqid().".".$request->image->extension();
      $request->image->move(public_path('Images'),$filename);
      $stdata['image']=$filename;
    }
    $student=Student::find($id);
    $old_image=$student->image;
    $student->update($stdata);
    if($old_image!='default.jpg'&&$request->hasFile('image'))
      File::delete(public_path('Images/'.$old_image));
    return redirect()->route('student.show',$id);
  }


  public function destroy($id)
  {
    $student=Student::find($id);
    $student->delete();
    if($student->image!='default.jpg')
      File::delete(public_path('Images/'.$student->image));
    return redirect()->route('student.index');
  }
}
