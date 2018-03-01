<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use function Qiniu\thumbnail;

class HouseController extends ApiController
{


    public function add()
    {
        $arr = $this->v();
        $i= $this->model->create($arr);
        return $i?suc($i):err();
    }

    public function v()
    {
        $columns = Schema::getColumnListing($this->model->table);
        $data = \request()->toArray();

        foreach ($data as $key => $value) {
            if (!in_array($key, $columns))
                unset($data[$key]);
        }
        return $data;
    }

    public function read_wait_audit()
    {
        return $this->model->where('audit_state', '')->get();
    }

    public function read_id()
    {
        return $this->model->where('id', \request('id'))->get();
    }

    public function update_house()
    {
        $arr = \request()->toArray();
        $data = $this->model->find(\request('id'));
        return $data->fill($arr)->save() ?suc() : err();
    }

    public function qiniu()
    {
        $disk = Storage::disk('qiniu');
        return $disk->getDriver()->uploadToken();
    }

    public function read_house(){
        return $this->model->all();
    }
    public function read_user_house(){
        return $this->model->where('user_id',\request('user_id'))->get();


    }


}
