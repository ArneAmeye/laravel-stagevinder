<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInternship extends Model
{
    protected $table = 'students_internships';

    protected $fillable = [
        'student_id', 'internship_id'
    ];

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function internship()
    {
        return $this->hasOne(Internship::class);
    }
}
