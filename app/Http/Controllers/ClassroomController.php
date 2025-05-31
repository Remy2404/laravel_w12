<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use Illuminate\Validation\ValidationException;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the students.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexStudents()
    {
        $students = Classroom::getStudents();
        return response()->json($students);
    }

    /**
     * Display the specified student.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showStudent($id)
    {
        $student = Classroom::getStudentById($id);
        
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        
        return response()->json($student);
    }

    /**
     * Store a newly created student in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeStudent(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'age' => 'required|integer|min:1|max:100',
            ]);
            
            $student = Classroom::createStudent($validated);
            
            return response()->json([
                'message' => 'Student created successfully',
                'data' => $student
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Update the specified student in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStudent(Request $request, $id)
    {
        $student = Classroom::getStudentById($id);
        
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        
        try {
            $validated = $request->validate([
                'name' => 'sometimes|string|max:255',
                'age' => 'sometimes|integer|min:1|max:100',
            ]);
            
            $updatedStudent = Classroom::updateStudent($id, $validated);
            
            return response()->json([
                'message' => 'Student updated successfully',
                'data' => $updatedStudent
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Remove the specified student from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyStudent($id)
    {
        $success = Classroom::deleteStudent($id);
        
        if (!$success) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        
        return response()->json(['message' => 'Student deleted successfully']);
    }

    /**
     * Display a listing of the teachers.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexTeachers()
    {
        $teachers = Classroom::getTeachers();
        return response()->json($teachers);
    }

    /**
     * Display the specified teacher.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showTeacher($id)
    {
        $teacher = Classroom::getTeacherById($id);
        
        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }
        
        return response()->json($teacher);
    }

    /**
     * Store a newly created teacher in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeTeacher(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'subject' => 'required|string|max:255',
            ]);
            
            $teacher = Classroom::createTeacher($validated);
            
            return response()->json([
                'message' => 'Teacher created successfully',
                'data' => $teacher
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Update the specified teacher in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateTeacher(Request $request, $id)
    {
        $teacher = Classroom::getTeacherById($id);
        
        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }
        
        try {
            $validated = $request->validate([
                'name' => 'sometimes|string|max:255',
                'subject' => 'sometimes|string|max:255',
            ]);
            
            $updatedTeacher = Classroom::updateTeacher($id, $validated);
            
            return response()->json([
                'message' => 'Teacher updated successfully',
                'data' => $updatedTeacher
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Remove the specified teacher from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyTeacher($id)
    {
        $success = Classroom::deleteTeacher($id);
        
        if (!$success) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }
        
        return response()->json(['message' => 'Teacher deleted successfully']);
    }
}
