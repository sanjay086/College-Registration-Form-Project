<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view('student.create');
    }
    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course = $request->input('course');
        $student->section = $request->input('section');
        $student->save();
        return redirect('fetch_students')->with('status', 'Student Added Successfully');
        //return view('store-student');
        //return redirect()->back()->with('status','Student Added Successfully');
    }
    public function fetchdata(Request $request){
        $student = Student::all();
        return view('student.fetchalldata', compact('student'));
    }
    public function edit($id){
        $student = Student::find($id);
        return view('student.edit', compact('student'));
    }
    public function update(Request $request, $id){
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course = $request->input('course');
        $student->section = $request->input('section');
        $student->update();
        //return view('student.edit', compact('student'));
        return redirect()->back()->with('status','Student Updated Successfully');
    }
    public function destroy($id){
        $student = Student::find($id);
        $student->delete();
        return redirect('fetch_students')->with('status','Student Deleted Successfully');
        }
}
