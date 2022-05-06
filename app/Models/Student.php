<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'age',
        'gender_id',
        'teacher_id',

    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class,'gender_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Reportingteacher::class,'teacher_id');
    }

}

