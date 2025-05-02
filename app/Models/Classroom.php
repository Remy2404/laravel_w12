<?php

namespace App\Models;

class Classroom
{
    // Fake database
    protected static $data = [
        'students' => [
            ['name' => 'Ramy', 'age' => 20 , 'id' => 1],
            ['name' => 'chhay Heng', 'age' => 22, 'id' => 2],
            ['name' => 'sok chea', 'age' => 19, 'id' => 3],
        ],
        'teachers' => [
            ['name' => 'Mrs. donald trump', 'subject' => 'Math', 'id' => 1],
            ['name' => 'Mrs. Cristiano Ronaldo', 'subject' => 'Science', 'id' => 2],
            ['name' => 'Mrs.Lionel Messi', 'subject' => 'English', 'id' => 3]
        ]
    ];

    public static function getStudents()
    {
        return self::$data['students'];
    }

    public static function getTeachers()
    {
        return self::$data['teachers'];
    }

    // get student by id
    public static function getStudentById($id)
    {
        foreach (self::$data['students'] as $student) {
            if ($student['id'] == $id) {
                return $student;
            }
        }
        return null;
    }

    // delete student by id
    public static function deleteStudent($id)
    {
        foreach (self::$data['students'] as $index => $student) {
            if ($student['id'] == $id) {
                array_splice(self::$data['students'], $index, 1);
                return true;
            }
        }
        return false;
    }

    // create student
    public static function createStudent($data)
    {
        // Generate a new ID (max ID + 1)
        $maxId = 0;
        foreach (self::$data['students'] as $student) {
            if ($student['id'] > $maxId) {
                $maxId = $student['id'];
            }
        }
        $data['id'] = $maxId + 1;
        
        // Add the new student
        self::$data['students'][] = $data;
        return $data;
    }

    // create teacher
    public static function createTeacher($data)
    {
        // Generate a new ID (max ID + 1)
        $maxId = 0;
        foreach (self::$data['teachers'] as $teacher) {
            if ($teacher['id'] > $maxId) {
                $maxId = $teacher['id'];
            }
        }
        $data['id'] = $maxId + 1;
        
        // Add the new teacher
        self::$data['teachers'][] = $data;
        return $data;
    }

    // edit student by id
    public static function updateStudent($id, $data)
    {
        foreach (self::$data['students'] as $index => $student) {
            if ($student['id'] == $id) {
                // Preserve the ID
                $data['id'] = $id;
                self::$data['students'][$index] = $data;
                return $data;
            }
        }
        return null;
    }

    // edit teacher by id
    public static function updateTeacher($id, $data)
    {
        foreach (self::$data['teachers'] as $index => $teacher) {
            if ($teacher['id'] == $id) {
                // Preserve the ID
                $data['id'] = $id;
                self::$data['teachers'][$index] = $data;
                return $data;
            }
        }
        return null;
    }

    // get teacher by id
    public static function getTeacherById($id)
    {
        foreach (self::$data['teachers'] as $teacher) {
            if ($teacher['id'] == $id) {
                return $teacher;
            }
        }
        return null;
    }

    // delete teacher by id
    public static function deleteTeacher($id)
    {
        foreach (self::$data['teachers'] as $index => $teacher) {
            if ($teacher['id'] == $id) {
                array_splice(self::$data['teachers'], $index, 1);
                return true;
            }
        }
        return false;
    }
}