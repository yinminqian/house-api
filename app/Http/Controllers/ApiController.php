<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function __construct($model)
    {
        $model='\App\\'.ucfirst($model);
        return $model;
        dd(1);
        $this->model=new $model;
    }



}
