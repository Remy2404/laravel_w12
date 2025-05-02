<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Classroom;

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

// Student routes
Route::get('/students', function() {
    $students = Classroom::getStudents();
    return response()->json($students);
});

Route::get('/students/{id}', function($id) {
    $student = Classroom::getStudentById($id);
    if (!$student) {
        return response()->json(['message' => 'Student not found'], 404);
    }
    return response()->json($student);
});

Route::post('/students', function(Request $request) {
    $data = $request->all();
    $student = Classroom::createStudent($data);
    return response()->json(['message' => 'Student created', 'data' => $student], 201);
});

Route::patch('/students/{id}', function(Request $request, $id) {
    $data = $request->all();
    $student = Classroom::updateStudent($id, $data);
    if (!$student) {
        return response()->json(['message' => 'Student not found'], 404);
    }
    return response()->json(['message' => 'Student updated', 'data' => $student]);
});

Route::delete('/students/{id}', function($id) {
    $success = Classroom::deleteStudent($id);
    if (!$success) {
        return response()->json(['message' => 'Student not found'], 404);
    }
    return response()->json(['message' => 'Student deleted']);
});

// Teacher routes
Route::get('/teachers', function() {
    $teachers = Classroom::getTeachers();
    return response()->json($teachers);
});

Route::get('/teachers/{id}', function($id) {
    $teacher = Classroom::getTeacherById($id);
    if (!$teacher) {
        return response()->json(['message' => 'Teacher not found'], 404);
    }
    return response()->json($teacher);
});

Route::post('/teachers', function(Request $request) {
    $data = $request->all();
    $teacher = Classroom::createTeacher($data);
    return response()->json(['message' => 'Teacher created', 'data' => $teacher], 201);
});

Route::patch('/teachers/{id}', function(Request $request, $id) {
    $data = $request->all();
    $teacher = Classroom::updateTeacher($id, $data);
    if (!$teacher) {
        return response()->json(['message' => 'Teacher not found'], 404);
    }
    return response()->json(['message' => 'Teacher updated', 'data' => $teacher]);
});

Route::delete('/teachers/{id}', function($id) {
    $success = Classroom::deleteTeacher($id);
    if (!$success) {
        return response()->json(['message' => 'Teacher not found'], 404);
    }
    return response()->json(['message' => 'Teacher deleted']);
});