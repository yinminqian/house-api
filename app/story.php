<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{

    public $table = 'stories';
    protected $guarded = ['id'];
    protected $casts = [
        'photo' => 'json'
    ];

    public function comments()
    {
        return $this->hasMany('App\story_comments', 'article_id');
    }


}
