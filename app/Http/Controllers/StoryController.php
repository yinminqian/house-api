<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoryController extends ApiController
{

    public function add()
    {


        if ($this->model->where('detection', \request('detection'))->exists()) {
            $story = $this->model->where('detection', \request('detection'))->get();
            return $story[0]->fill(\request()->toArray())->save() ? suc($this->model) : err();
        } else {
            $arr = \request()->toArray();
            return $this->model->fill($arr)->save() ? suc($this->model) : err();
        }

    }

    public function read_state()
    {
        return $this->model->where('publish', 1)->get();
    }

    public function read_story_user()
    {
        return $this->model->where('user_id', \request('user_id'))->get();
    }

    public function read_id()
    {
        return $this->model->find(\request('id'));
    }
}
