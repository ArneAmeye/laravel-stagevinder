<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
