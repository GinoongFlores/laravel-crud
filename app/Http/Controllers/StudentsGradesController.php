<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;

class StudentsGradesController extends Controller
{
    //

    public function store_grades(Request $request) {
        $validatedGrade = $request->validate([
            'subject_1' => 'required|numeric',
            'subject_2' => 'required|numeric',
            'subject_3' => 'required|numeric',
            'subject_4' => 'required|numeric',
            'subject_5' => 'required|numeric',
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

    public function edit_grades(Grades $grade) {
        return view('students.edit_grade', ['grade' => $grade]);
    }

    public function update_grades(Grades $grade, Request $request) {
        $validatedGrade = $request->validate([
            'subject_1' => 'required|numeric',
            'subject_2' => 'required|numeric',
            'subject_3' => 'required|numeric',
            'subject_4' => 'required|numeric',
            'subject_5' => 'required|numeric',
        ]);

        $gradesArray = [
            $validatedGrade['subject_1'],
            $validatedGrade['subject_2'],
            $validatedGrade['subject_3'],
            $validatedGrade['subject_4'],
            $validatedGrade['subject_5']
        ];

        $average = array_sum($gradesArray) / count($gradesArray);
        $validatedGrade['average'] = $average;

        $grade->update($validatedGrade);
        return redirect(route('student.grade'))->with('success', 'Grade updated successfully');
    }

    public function delete_grades(Grades $grade) {
        $grade->delete();
        return redirect('student.grade')->with('success', 'Grade deleted successfully');
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
