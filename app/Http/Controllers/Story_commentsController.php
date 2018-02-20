<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use function Sodium\crypto_sign_ed25519_pk_to_curve25519;

class Story_commentsController extends ApiController
{
    function add()
    {
        return $this->model->fill(\request()->toArray())->save() ? suc() : err();
    }

    function read_comment()
    {
        $user = new User;
        $comment = $this->model->where('article_id', \request('article_id'))->limit(10)->get();
        foreach ($comment as $val) {
            dd($user->where('id', $val['id'])->get());
        }
    }
}
