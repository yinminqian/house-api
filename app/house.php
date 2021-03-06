<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    public $table = 'house';
    public $guarded = ['id'];

    public $casts = [
        'location' => 'json',
        'convenience' => 'json',
        'facility' => 'json',
        'photo' => 'json',
        'regulation' => 'json',
        'string'=>'json',
        'suit'=>'json'
    ];
}
