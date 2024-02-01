<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{

    public function index() {
        return view('students.welcome');
    }

    public function create() {
        return view('students.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'course' => 'required'
        ]);
        $newStudent = Students::create($validatedData);
        return redirect(route('student.index'));
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

    //API
    // public function store(Request $request) {
    //     Students::create([
    //     'first_name'=>$request->first_name,
    //     'last_name'=>$request->last_name,
    //     'email'=>$request->email,
    //     'course'=>$request->course
    //     ]);
    //     return response()->json('Successfully Created');
    // }

    // public function fetch() {
    //     return response()->json(Students::latest()->get());
    // }

    // public function fetchStudent(string $id) {
    //     return response()->json(Students::whereId($id)->first());
    // }

    // public function update(Request $request, string $id) {
    //     $user = Students::whereId($id)->first();

    //     $user->update([
    //         'first_name'=>$request->first_name,
    //         'last_name'=>$request->last_name,
    //         'email'=>$request->email,
    //         'course'=>$request->course,
    //     ]);
    //     return response()->json('Update Successfully');
    // }

    // public function delete($id) {
    //     {
    //         Students::whereId($id)->delete();
    //         return response()->json(("Deleted Successfully"));
    //     }
    // }

}
