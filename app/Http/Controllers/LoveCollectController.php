<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoveCollectController extends ApiController
{


    public function add()
    {
        if ($this->model->where(['user_id' => \request('user_id'), 'article_id' => \request('article_id')])->exists()) {
            $data = $this->model->where(['user_id' => \request('user_id'), 'article_id' => \request('article_id')])->get();
            return $data[0]->fill(\request()->toArray())->save() ? suc() : err();
        } else {
            return $this->model->fill(\request()->toArray())->save() ? suc() : err();
        }
    }


    public function read_user_love()
    {
        $data = $this->model->where(['user_id' => \request('user_id'), 'article_id' => \request('article_id')])->get();
        return count($data) > 0 ? suc($data) : err();
    }

    public function update_love()
    {

    }
}
