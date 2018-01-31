<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Bsessions as BS;

class User extends Authenticatable
{
    use Notifiable;
    protected $guarded = ['id'];
    public $table = 'user';
    protected $fillable = [
        'username', 'password', 'phone', 'email',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'data' => 'json'
    ];

    public function login()
    {
        $username = request('username');
        $password = request('password');
        $user = $this->where([
            'username' => $username,
            'password' => $password,
        ])->first();

        if (!$user) {
            abort(403);
        }

        if ($user->sync_to_session()) {
            Bsessions::bind_user($user->id);
//            token绑定用户
            return 1;
        }
        return 0;
    }


    public function sync_to_session()
    {
        if (!$this->id)
            return false;
        array_set($GLOBALS['__BSESSION__'], 'user', $this->toArray());
        return true;
    }


    public function is_login()
    {
        return @$GLOBALS['__BSESSION__']['user'] ? ['success' => true, 'data' => @$GLOBALS['__BSESSION__']['user']] : ['success' => false];
    }

    public function signup()
    {
        $this->username = request('username');
        $this->password = request('password');
        $this->phone = request('phone');
        $this->email = request('email');
//        dd($this->toArray());
        return $this->save() ? 1 : 0;
    }


    public function logout()
    {
        $token = $GLOBALS['__BSESSION__']['meta']['token'];
        return BS::on_logout($token);
    }



}
