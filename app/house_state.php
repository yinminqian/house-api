<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House_state extends Model
{
    public $table = 'house_states';
    protected $guarded = ['id'];
    public $casts=[
        'time_reserve'=>'json',
        'reserve_poke'=>'json',
    ];

}
