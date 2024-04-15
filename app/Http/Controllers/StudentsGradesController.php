<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;
use App\Models\Students;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentsGradesController extends Controller
{
    //

    public function store_grades(Request $request) {
        $validatedGrade = $request->validate([
            'subject_1' => 'required|numeric|between:70,100',
            'subject_2' => 'required|numeric|between:70,100',
            'subject_3' => 'required|numeric|between:70,100',
            'subject_4' => 'required|numeric|between:70,100',
            'subject_5' => 'required|numeric|between:70,100',
        ]);

        $grades = [
            $validatedGrade['subject_1'],
            $validatedGrade['subject_2'],
            $validatedGrade['subject_3'],
            $validatedGrade['subject_4'],
            $validatedGrade['subject_5']
        ];

        $average = array_sum($grades) / count($grades);
        $validatedGrade['average'] = $average;

        Grades::create($validatedGrade);

        return redirect(route('student.grade'))->with('success', 'Grade created successfully');
    }

    public function create_grades() {
        $grades = Grades::latest()->get();
        return view('students.grades', ['grades' => $grades]);
    }

    public function input_grades($id) {
        $student = Students::find($id);
        try {
            $student = Students::findOrFail($id);
        } catch(ModelNotFoundException) {
            return redirect()->back()->with('error', 'Student not found');
        }
        $grades = $student->grades; // get the grades of the student
        return view('students.add_grade', ['student' => $student, 'grades' => $grades]);
    }

    public function add_grades(Request $request, $id ) {
        $validatedGrade = $request->validate([
            'subject_1' => 'required|numeric|between:70,100',
            'subject_2' => 'required|numeric|between:70,100',
            'subject_3' => 'required|numeric|between:70,100',
            'subject_4' => 'required|numeric|between:70,100',
            'subject_5' => 'required|numeric|between:70,100',
        ]);

        $grades = [
            $validatedGrade['subject_1'],
            $validatedGrade['subject_2'],
            $validatedGrade['subject_3'],
            $validatedGrade['subject_4'],
            $validatedGrade['subject_5']
        ];

        $average = array_sum($grades) / count($grades);
        $student = Students::find($id);
        $grade = new Grades;

        try {
            $student = Students::findOrFail($id);
        } catch(ModelNotFoundException) {
            return redirect(route('student.grade'))->with('error', 'Student not found');
        }

        // check if the students added 5 grades
        if($student->grades()->count() >= 5) {
            return redirect(route('student.grade.input',['student'=> $id]))->with('error', 'You can only add 5 grades');
        }

        $grade->subject_1 = $validatedGrade['subject_1'];
        $grade->subject_2 = $validatedGrade['subject_2'];
        $grade->subject_3 = $validatedGrade['subject_3'];
        $grade->subject_4 = $validatedGrade['subject_4'];
        $grade->subject_5 = $validatedGrade['subject_5'];
        $grade->average = $average;

        $student->grades()->save($grade);
        return redirect(route('student.grade.input', ['student'=> $id]))->with('success', 'Grade updated successfully');
    }

    public function edit_grades($id) {
        $grade = Grades::find($id);
        return view('students.edit_grade', ['grade' => $grade]);
    }

    public function update_grades(Request $request, Grades $grade) {
        $validatedGrade = $request->validate([
            'subject_1' => 'required|numeric|between:70,100',
            'subject_2' => 'required|numeric|between:70,100',
            'subject_3' => 'required|numeric|between:70,100',
            'subject_4' => 'required|numeric|between:70,100',
            'subject_5' => 'required|numeric|between:70,100',
        ]);

        $grades = [
            $validatedGrade['subject_1'],
            $validatedGrade['subject_2'],
            $validatedGrade['subject_3'],
            $validatedGrade['subject_4'],
            $validatedGrade['subject_5']
        ];

        $average = array_sum($grades) / count($grades);
        $validatedGrade['average'] = $average;
        $grade->update($validatedGrade);

        return redirect(route('student.grade'))->with('success', 'Grade updated successfully');
    }

    public function delete_grades(Grades $grade) {
        $grade->delete();
        return redirect(route('student.grade'))->with('success', 'Grade deleted successfully');
    }


    // public function store_grades(Request $request) {
    //     $validatedGrade = $request->validate([
    //         'subject_1' => 'required|numeric',
    //         'subject_2' => 'required|numeric',
    //         'subject_3' => 'required|numeric',
    //         'subject_4' => 'required|numeric',
    //         'subject_5' => 'required|numeric',
    //         'total' => 'required|numeric'
    //     ]);

    //     $total = $validatedGrade['subject_1'] + $validatedGrade['subject_2'] + $validatedGrade['subject_3'] + $validatedGrade['subject_4'] + $validatedGrade['subject_5'];

    //     $average = $total / 5;
    // }

}
