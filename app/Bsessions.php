<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bsessions extends Model
{
    public $table = 'bsession';
    protected $guarded = ['id'];
    protected $casts = [
        'data' => 'json'
    ];


    static $meta;


    public static function valid($token)
    {
        return !!self::init($token);
    }


//    找到数据库符合条件的token
    public static function init($token)
    {
        $row = self::where('token', $token)->first();
        //找打数据库的符合条件的第一条token;
        if (!$row) {
            return false;
        } else {
            return self::$meta = $row;
        }
    }


//    存一条数据进数据库
    public static function generate($user_id = null)
    {
        $row = new self;
        $expired_ut = time() + self::day(7);
//        当前时间加上7天的时间,结果是7天以后的时间

        $row->token = self::make_token();
        $row->data = [];
        $row->user_id = $user_id;
        $row->expired_at = date('Y-m-d H:i:s', $expired_ut);
//        把过期时间转换成时分秒
        $row->save();


        self::$meta = $row;
        return $row;
    }


//    将数据打包存进全局变量中去
    public static function sync_to_cache()
    {
        $meta = self::$meta;
        $arr = $meta->toArray();
        unset($arr['data']);

        $cache = [
            'meta' => $arr,
            'user' => $meta->user_id ? User::find($meta->user_id)->toArray() : null,
            'data' => $meta->data ?: [],
        ];
        $GLOBALS['__BSESSION__'] = $cache;
    }


    public static function bind_user($user_id)
    {
        $row = self::where('token', self::get_token())->first();
//        先在数据库中找到有这条toke的行
        if (!$row) {
            return false;
        }

        $row->user_id = $user_id;
        return $row->save();
    }


    public static function get_token()
    {
        return self::$meta->token;
    }

//    从变量中取bsession数据
    public function get_cache()
    {
        return $GLOBALS['__BSESSION__'];
    }

    public static function day($num = 1)
    {
        return $num * 24 * 60 * 60;
//        返回一天多少秒
    }

    public static function make_token()
    {
        return uniqid() . md5(rand(999, 10000) . 'xyee11111111111111111111111111111111');
//        返回一个唯一的md5加密码
    }


    public static function on_logout($token){
        $row=self::where('token',$token)->first();
        $row->user_id=null;
        $row->save();
        return ['success'=>true];
    }

}
