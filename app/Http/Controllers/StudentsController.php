<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    public function index() {
        $students = Students::latest()->get();
        return view('students.welcome',['students'=>$students]);
    }

    public function create() {
        return view('students.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:200|unique:students',
            'course' => 'required|string|max:255',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $student = new Students($validatedData); // This will create a new student object

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/students/', $filename);
            $student->image = $filename; // This will store the image in the image column of the students table in the database
        }
        $student->save(); // This will save the student object

        return redirect(route('student.index'))->with('success', 'Student created successfully!');
    }

    public function read() {
        $students = Students::all();
        return view('students.read', ['students'=>$students]);
    }

    public function edit(Students $student) {
        // This will display the student object
        // dd($student);

        return view('students.edit', ['student' => $student]);
    }

    public function update(Students $student, Request $request) {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'course' => 'required'
        ]);
        // This will update the student object
        $student->update($validatedData);
        return redirect(route('student.index'))->with('success','Student updated successfully!');
    }

    public function delete(Students $student) {
        $student->delete();
        return redirect(route('student.index'))->with('success','Student deleted successfully!');
    }
}
