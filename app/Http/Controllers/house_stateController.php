<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class House_stateController extends ApiController
{
    public function add()
    {
        $arr = \request()->toArray();


        $house_id = \request('house_id');
        $old = $this->model->where('house_id', $house_id)->get();
        if (count($old)) {
            return $old[0]->fill($arr)->save() ? 1 : 0;
        }


        return $this->model->fill($arr)->save() ? 1 : 0;
    }


    public function read_house_id()
    {
        $id = \request('id');
        return $this->model->where('house_id', $id)->get();
    }


}
