<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['user_id', 'facebook_user_id', 'firstname', 'lastname', 'email', "password"];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
