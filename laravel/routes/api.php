<?php

use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\TasksController;
use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/adminLogin', [AuthController::class, 'adminLogin']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('user', [AuthController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('/tasks', TasksController::class);
});


Route::get('questions', [QuestionController::class, 'index']);
Route::post('questions', [QuestionController::class, 'store']);
Route::get('questions/{id}', [QuestionController::class, 'show']);
Route::get('questions/{id}/edit', [QuestionController::class, 'edit']);
Route::put('questions/{id}/edit', [QuestionController::class, 'update']);
Route::delete('questions/{id}/delete', [QuestionController::class, 'destroy']);

Route::get('diagnosis', [DiagnosisController::class, 'index']);
Route::post('diagnosis', [DiagnosisController::class, 'store']);
Route::get('diagnosis/{id}', [DiagnosisController::class, 'show']);
Route::get('diagnosis/{id}/edit', [DiagnosisController::class, 'edit']);
Route::put('diagnosis/{id}/edit', [DiagnosisController::class, 'update']);
Route::delete('diagnosis/{id}/delete', [DiagnosisController::class, 'destroy']);

