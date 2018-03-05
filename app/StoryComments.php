<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoryComments extends Model
{

    protected $table = 'storyComments';
    protected $guarded = ['id'];

    public function comments()
    {
        return $this->hasMany('App\storyComments', 'article_id');
    }

    public function user_com()
    {
        return $this->hasMany('App\User','id');
    }

}
