<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class story_comments extends Model
{

    protected $table = 'story_comments';
    protected $guarded = ['id'];

    public function comments()
    {
        return $this->hasMany('App\story_comments', 'article_id');
    }

    public function user_com()
    {
        return $this->hasMany('App\User','id');
    }

}
