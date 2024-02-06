<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;

class StudentsGradesController extends Controller
{
    //

    public function calculate_grades($grades) {
        $total = array_sum($grades);
        $average = $total / count($grades);

        return ['total' => $total, 'average' => $average];
    }

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

        $calculatedGrades = $this->calculate_grades($grades);

        $validatedGrade['total'] = $calculatedGrades['total'];
        $validatedGrade['average'] = $calculatedGrades['average'];

        $newGrade = Grades::create($validatedGrade);
        return redirect(route('student.grade'))->with('success', 'Grade created successfully');
    }

    public function create_grades() {
        $grades = Grades::latest()->get();
        return view('students.grades', ['grades'=>$grades]);
    }

    public function edit_grades(Grades $grades) {
        return view('students.edit_grade', ['grades' => $grades]);
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
