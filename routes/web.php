<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', function () {
    return view('contact_form');
});

Route::post('student', [StudentController::class,'store']);
Route::get('student', [StudentController::class,'index']);
Route::get('student/create', [StudentController::class,'create']);
Route::get('student/{id}/edit', [StudentController::class,'edit']);
Route::put('/student/{id}', [StudentController::class, 'update']);
Route::delete('/student/{id}', [StudentController::class, 'destroy']);