<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table = 'companies';

    protected $fillable = ['user_id', 'facebook_user_id', 'name', 'email', "password"];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
