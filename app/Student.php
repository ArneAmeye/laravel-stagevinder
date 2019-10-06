<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['id', 'firstname', 'lastname', 'email'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
