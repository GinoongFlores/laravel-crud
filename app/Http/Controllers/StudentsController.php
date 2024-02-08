<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    /*
     * Lists
        * Arithmetic
        * logs
        * Graphs
        * Unit testing
    */

    public function index() {
        $students = Students::latest()->get();
        return view('students.welcome',['students'=>$students]);
    }

    public function create() {
        return view('students.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:200|unique:students',
            'course' => 'required|string|max:255',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $new_Students = Students::create($validatedData);

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
        $student->grades()->delete(); // delete the grades of the student
        $student->delete(); // delete the selected student
        return redirect(route('student.index'))->with('success','Student deleted successfully!');
    }
}
