<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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

Route::get('/', function () {
    return view('students.welcome');
});

// Route::get('/student', 'StudentsController@index')->name('students.index');
Route::get('/student', [StudentsController::class, 'index'])->name(('student.index'));
Route::get('/student/create', [StudentsController::class, 'create'])->name(('student.create'));
Route::post('/student', [StudentsController::class, 'store'])->name(('student.store'));

Route::get('/student/read', [StudentsController::class, 'read'])->name(('student.read'));

// show the form to edit & update a student
Route::get('/student/{student}/edit', [StudentsController::class, "edit"])->name(('student.edit'));
Route::post('/student/{student}/update', [StudentsController::class, "update"])->name(('student.update'));

// delete a student
Route::delete('/student/{student}/delete', [StudentsController::class, "delete"])->name(('student.delete'));


