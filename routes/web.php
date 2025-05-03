<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Classroom;

Route::get('/', function () {
    return view('welcome');
});

// Student routes
Route::get('/students', function() {
    try {
        // Directly query database instead of using the model
        $students = DB::select('SELECT * FROM students');
        return response()->json($students);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

Route::get('/students/{id}', function($id) {
    $student = Classroom::getStudentById($id);
    if (!$student) {
        return response()->json(['message' => 'Student not found'], 404);
    }
    return response()->json($student);
});

Route::post('/students', function() {
    $data = request()->all();
    $student = Classroom::createStudent($data);
    return response()->json(['message' => 'Student created', 'data' => $student], 201);
});

Route::patch('/students/{id}', function($id) {
    $data = request()->all();
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
    try {
        // Directly query database instead of using the model
        $teachers = DB::select('SELECT * FROM teachers');
        return response()->json($teachers);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

Route::get('/teachers/{id}', function($id) {
    $teacher = Classroom::getTeacherById($id);
    if (!$teacher) {
        return response()->json(['message' => 'Teacher not found'], 404);
    }
    return response()->json($teacher);
});

Route::post('/teachers', function() {
    $data = request()->all();
    $teacher = Classroom::createTeacher($data);
    return response()->json(['message' => 'Teacher created', 'data' => $teacher], 201);
});

Route::patch('/teachers/{id}', function($id) {
    $data = request()->all();
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
