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
        $son_data = [];
        $comment = $this->model->where('article_id', \request('article_id'))->orderBy('id', 'desc')->get();
        foreach ($comment as $val) {
            $username = $this->get_username($val->user_id);
            $time_ = (time() - time($val->created_at)) / 60 / 60 / 24;
            if ($val->parent_id) {
                $dat = $this->model->find($val->parent_id);
                $parent = $this->get_username($dat['user_id']);
            }else{
                $parent=null;
            }
//            if (count($son_id = $this->model->where('parent_id', $val->id)->get()) != 0) {
//                foreach ($son_id as $key) {
//                    $username_son = $this->get_username($key->user_id);
//                    $time_son = (time() - time($key->created_at)) / 60 / 60 / 24;
//                    $son_data[] = ['username' => $username_son, 'comment' => $key->comment, 'time' => $time_son, 'id' => $key->id, 'reply' => true, 'parent_id' => $key->parent_id];
//                }
//                $data[] = ['username' => $username, 'comment' => $val->comment, 'time' => $time_, 'id' => $val->id, 'reply' => true, 'son' => $son_data];
//                $son_data = [];
//            } else {
            $data[] = ['username' => $username, 'comment' => $val->comment, 'time' => $time_, 'id' => $val->id, 'reply' => true, 'parent' => $parent];
//            }
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
