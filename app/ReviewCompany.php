<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ReviewCompany extends Model
{
    use Searchable;
}
