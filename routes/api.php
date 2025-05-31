<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| API routes for application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group
|
*/

// Test route to check if API is working
Route::get('/test', function() {
    return response()->json(['message' => 'API is working!'], 200);
});

// Student routes
Route::get('/students', [ClassroomController::class, 'indexStudents']);
Route::get('/students/{id}', [ClassroomController::class, 'showStudent']);
Route::post('/students', [ClassroomController::class, 'storeStudent']);
Route::patch('/students/{id}', [ClassroomController::class, 'updateStudent']);
Route::delete('/students/{id}', [ClassroomController::class, 'destroyStudent']);

// Teacher routes
Route::get('/teachers', [ClassroomController::class, 'indexTeachers']);
Route::get('/teachers/{id}', [ClassroomController::class, 'showTeacher']);
Route::post('/teachers', [ClassroomController::class, 'storeTeacher']);
Route::patch('/teachers/{id}', [ClassroomController::class, 'updateTeacher']);
Route::delete('/teachers/{id}', [ClassroomController::class, 'destroyTeacher']);