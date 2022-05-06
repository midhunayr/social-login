<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTerm extends Model
{
    use HasFactory;
    protected $fillable = [

        'student_id',
        'term_id',

    ];

    public function studentName()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id');
    }

    public function subjectMark()
    {
        return $this->hasMany(SubjectMark::class, 'student_term_id');
    }
}
