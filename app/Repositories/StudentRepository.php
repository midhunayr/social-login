<?php

namespace App\Repositories;

use App\Models\Student;
use App\Models\StudentTerm;
use App\Models\SubjectMark;

class StudentRepository
{
    public function model()
    {
        return Student::class;
    }

    public function find($id)
    {
        $modelName = $this->model();
        $model = null;
        if ($id instanceof $modelName) {

            $model = $id;
        } else {
            $model = $this->model()::find($id);
        }
        return $model;
    }


    public function createStudent($data)
    {

        $student = new Student();
        $student->name = $data['name'];
        $student->age = $data['age'];
        $student->gender_id = $data['gender'];
        $student->teacher_id = $data['teacher'];

        $student->save();

        return $student;
    }

    public function studentMark($data)
    {
        // dd($data);
        $student_term = new StudentTerm();
        $student_term->student_id = $data['student'];
        $student_term->term_id = $data['term'];
        $student_term->save();

        foreach ($data['mark'] as $subject_id => $mark) {

            $subject_mark = new SubjectMark();
            $subject_mark->subject_id = $subject_id;
            $subject_mark->mark = $mark;
            $subject_mark->student_term_id = $student_term->id;
            $subject_mark->save();
        }
        return true;
    }
}
