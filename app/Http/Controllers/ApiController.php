<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\story_comments;
use App\Story;


class ApiController extends Controller
{
    public function __construct($model)
    {
        $model='\App\\'.ucfirst($model);
        $this->model=new $model;
    }



}
