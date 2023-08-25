<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

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

Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);
Route::get('students/getById/{id}', [StudentController::class, 'showById']);
Route::get('students/{id}/edit', [StudentController::class, 'edit']);
Route::put('students/update/{id}', [StudentController::class, 'updateStudent']);
Route::delete('students/delete/{id}', [StudentController::class, 'deleteStudent']);