<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\StudentRepository;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Gender;
use App\Models\ReportingTeacher;
use App\Http\Requests\AddStudentRequest;
use App\Http\Requests\StudentMarkRequest;
use App\Models\Student_Mark;
use App\Models\Term;
use App\Models\StudentTerm;
use App\Models\SubjectMark;

class StudentController extends Controller
{
    public $studentRepo;

    public function __construct(StudentRepository $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }

    public function addStudentView()
    {

        $gender = Gender::get();
        $teacher = ReportingTeacher::get();
        return view('pages.addstudent', compact('gender', 'teacher'));
    }

    public function storeStudent(AddStudentRequest $request)
    {

        $this->studentRepo->createStudent($request);
        return response()->json(['status' => 200, 'message' => 'success']);
    }

    public function listStudent()
    {

        $student = Student::with(['gender'], ['teacher'])->get();
        return view('pages.liststudent', compact('student'));
    }

    public function addMarkView()
    {

        $student = Student::get();
        $term = Term::get();
        $subject = Subject::get();
        return view('pages.addmark', compact('student', 'term', 'subject'));
    }

    public function storeStudentMark(StudentMarkRequest $request)
    {

        $this->studentRepo->studentMark($request);
        return response()->json(['status' => 200, 'message' => 'success']);
    }

    public function listStudentMarks()
    {

        $student_term = StudentTerm::with(['studentName', 'term', 'subjectMark'])
            ->withSum('subjectMark', 'mark')->get();
        $subject = Subject::get();
        // dd($student_term);
        return view('pages.liststudentmarks', compact('student_term', 'subject'));
    }
}
