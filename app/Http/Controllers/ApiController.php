<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct($model)
    {
        $model='\App\\'.ucfirst($model);
        $this->model=new $model;
    }



}
