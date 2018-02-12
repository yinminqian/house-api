<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoryController extends ApiController
{

    public function add()
    {
        $arr = \request()->toArray();
        return $this->model->fill($arr)->save() ? suc($this->model) : err();
    }
}
