<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCompany extends Model
{
    protected $table = 'students_companies';

    protected $fillable = [
        'student_id', 'company_id'
    ];

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }
}