<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class story extends Model
{

    public $table = 'stories';
    protected $guarded = ['id'];
    protected $casts = [
        'photo' => 'json'
    ];


}
