<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Student extends User implements Authenticatable
{
    protected $fillable = ['id', 'facebook_user_id', 'firstname', 'lastname', 'email', "password"];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
