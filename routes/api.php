<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentsGradesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// create a route to store the data
Route::post('/create', [StudentsController::class, 'store']);
Route::post('/grade/create', [StudentsGradesController::class, 'store_grades']);

// create a route to update the data
Route::get('/fetch/{id}', [StudentsController::class, 'fetchStudent']);

// create a route to fetch the data
Route::get('/fetch',[StudentsController::class,'fetch']);

Route::post('/update/{id}', [StudentsController::class, 'update']);

Route::delete('/delete/{id}',[StudentsController::class, 'delete']);
