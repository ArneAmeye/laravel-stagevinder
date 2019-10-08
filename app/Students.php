<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['id', 'facebook_user_id', 'firstname', 'lastname', 'email', "password"];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
