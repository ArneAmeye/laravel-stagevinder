<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller {

    public function index(){
        return view("upload");
    }

}