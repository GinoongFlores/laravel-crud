<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentsGradesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('students.welcome');
// });


Route::get('/', [StudentsController::class, 'index'])->name(('student.index'));

// students grades
Route::get('/grade/create', [StudentsGradesController::class, 'create_grades'])->name(('student.grade'));
Route::post('/grade', [StudentsGradesController::class, 'store_grades'])->name(('student.grade.store'));

Route::get('/grade/{grade}/edit', [StudentsGradesController::class, 'edit_grades'])->name(('student.grade.edit'));
Route::post('/grade/{grade}', [StudentsGradesController::class, 'update_grades'])->name(('student.grade.update'));

Route::delete('/grade/{grade}/delete', [StudentsGradesController::class, 'delete_grades'])->name(('student.grade.delete'));

// edit grades

// show the form to create a new student
Route::get('/student/create', [StudentsController::class, 'create'])->name(('student.create'));
Route::post('/student', [StudentsController::class, 'store'])->name(('student.store'));

Route::get('/student/read', [StudentsController::class, 'read'])->name(('student.read'));

// show the form to edit & update a student
Route::get('/student/{student}/edit', [StudentsController::class, "edit"])->name(('student.edit'));
Route::post('/student/{student}', [StudentsController::class, "update"])->name(('student.update'));

// delete a student
Route::delete('/student/{student}/delete', [StudentsController::class, "delete"])->name(('student.delete'));


