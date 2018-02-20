<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use function Sodium\crypto_sign_ed25519_pk_to_curve25519;
use App\story_comments;
use App\story;

class Story_commentsController extends ApiController
{
    function add()
    {
        return $this->model->fill(\request()->toArray())->save() ? suc() : err();
    }

    function read_comment()
    {
        $data = [];
        $comment = $this->model->where('article_id', \request('article_id'))->limit(10)->get();
        foreach ($comment as $val) {
            $username = $this->get_username($val->user_id);
            $time_ = (time() - time($val->created_at)) / 60 / 60 / 24;
            $data[] = ['username' => $username, 'comment' => $val->comment, 'time' => $time_];
        }
        return $data;
    }


    public function test()
    {
        $comments = story::find(1)->comments;
        return $comments;
    }


    public function test1()
    {
        $user = User::find(1)->comments_user;
        return $user;
    }

    public function get_username($user_id)
    {
        $user = story_comments::find($user_id)->user_com;
        return $user[0]->username;
    }
}
