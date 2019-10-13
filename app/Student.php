<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = 'students';

    protected $fillable = ['user_id', 'facebook_user_id', 'firstname', 'lastname', 'email', "password"];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
