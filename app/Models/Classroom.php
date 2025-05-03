<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Classroom
{
    // Get all students from the database
    public static function getStudents()
    {
        return DB::table('students')->get();
    }

    // Get all teachers from the database
    public static function getTeachers()
    {
        return DB::table('teachers')->get();
    }

    // Get student by id
    public static function getStudentById($id)
    {
        return DB::table('students')->where('id', $id)->first();
    }

    // Delete student by id
    public static function deleteStudent($id)
    {
        $deleted = DB::table('students')->where('id', $id)->delete();
        return $deleted > 0;
    }

    // Create student
    public static function createStudent($data)
    {
        $data['created_at'] = now();
        $data['updated_at'] = now();
        
        $id = DB::table('students')->insertGetId($data);
        return DB::table('students')->where('id', $id)->first();
    }

    // Create teacher
    public static function createTeacher($data)
    {
        $data['created_at'] = now();
        $data['updated_at'] = now();
        
        $id = DB::table('teachers')->insertGetId($data);
        return DB::table('teachers')->where('id', $id)->first();
    }

    // Update student by id
    public static function updateStudent($id, $data)
    {
        $data['updated_at'] = now();
        
        $updated = DB::table('students')
            ->where('id', $id)
            ->update($data);
        
        if ($updated) {
            return DB::table('students')->where('id', $id)->first();
        }
        
        return null;
    }

    // Update teacher by id
    public static function updateTeacher($id, $data)
    {
        $data['updated_at'] = now();
        
        $updated = DB::table('teachers')
            ->where('id', $id)
            ->update($data);
        
        if ($updated) {
            return DB::table('teachers')->where('id', $id)->first();
        }
        
        return null;
    }

    // Get teacher by id
    public static function getTeacherById($id)
    {
        return DB::table('teachers')->where('id', $id)->first();
    }

    // Delete teacher by id
    public static function deleteTeacher($id)
    {
        $deleted = DB::table('teachers')->where('id', $id)->delete();
        return $deleted > 0;
    }
}