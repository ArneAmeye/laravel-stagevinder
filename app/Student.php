<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Student extends User implements Authenticatable
{
    protected $table = 'students';

    protected $fillable = ['user_id', 'facebook_user_id', 'firstname', 'lastname', 'email', 'password', 'profile_picture'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'dribbble_api_result' => 'object',
    ];
}
