<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $table='t_location';
    protected $guarded=['id'];

    public $casts=[

    ];






    //只返回中国的市级数据
    public function read(){
        $test=[];
       $province= $this->where('parent_id',1)->get();

       foreach ($province as $val){
           $city=$this->where('parent_id',$val['id'])->get();
           foreach ($city as $key){
               if ($key['parent_id']==$val['id']){
                       $test[]=$key;
                       $key['value']=$key['value'].'/'.$val['value'];
               }
           }
//           $city_name=$city['name'];,
       }
       return $test;
    }

    public function read_independent(){
        $test=[];
        $province= $this->where('parent_id',1)->get();
//        dd($province);
        foreach ($province as $val){
            $test[]=$val;
            $city=$this->where('parent_id',$val['id'])->get();
            foreach ($city as $key){
                $test[]=$key;
            }
        }
        return $test;
    }

}
