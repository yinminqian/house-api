<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class house extends Model
{
    public $table = 'house';
    public $guarded = 'id';

    public $casts = [
        'location' => 'json',
        'convenience' => 'json',
        'facility' => 'json',
        'photo' => 'json',
        'regulation' => 'json'
    ];
}
