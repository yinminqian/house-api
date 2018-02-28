<?php

namespace App\Http\Middleware;

use \App\Bsessions as BS;
use Closure;

class BSessionHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $session_name = 'BSESSION_TOKEN';
        $token = $request->get($session_name) ?: $request->header($session_name);
//        dd($token);
        if (!$token || !BS::valid($token)) {
//            如果用户上传的数据没有携带token||数据库没有找到用户上传的token;
            BS::generate();
//            生成一条token进储存进数据库
//           这时meta已经有数据

            $token = BS::get_token();
//            取到新的token;
            header("Access-Control-Expose-Headers: $session_name");
            header("$session_name: $token");
        } else {
//            将整合的数据存进全局变量中
            BS::sync_to_cache();
        }


        return $next($request);
    }
}