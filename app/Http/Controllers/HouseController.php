<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HouseController extends ApiController
{


    public function add()
    {
        $arr = \request()->toArray();
//        $arr['convenience'] = json_encode(\request()->convenience);
//        $arr['facility'] = json_encode(\request()->facility);
//        $arr['photo'] = json_encode(\request()->photo);
        $i = $this->model->create($arr);
        return $i;
    }


}
