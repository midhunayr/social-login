<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectMark extends Model
{
    use HasFactory;
    protected $fillable = [

        'subject_id',
        'mark',
        'student_term_id'

    ];

    public function subjectName()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function studentTerm()
    {
        return $this->belongsTo(StudentTerm::class,'student_term_id');
    }

}
