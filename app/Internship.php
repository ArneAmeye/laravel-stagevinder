<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Internship extends Model
{
    use Searchable;

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
