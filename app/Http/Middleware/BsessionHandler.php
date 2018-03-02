<?php

namespace App\Http\Middleware;

use \App\Bsessions as Bs;
use Closure;

class BsessionHandler
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
        $session_name = 'BSESSIONTOKEN';
        $token = $request->get($session_name) ?: $request->header($session_name);
        if (!$token || !Bs::valid($token)) {
//            如果用户上传的数据没有携带token||数据库没有找到用户上传的token;
            Bs::generate();
//            生成一条token进储存进数据库
//           这时meta已经有数据

            $token = Bs::get_token();
//            取到新的token;
            header("Access-Control-Expose-Headers: $session_name");
            header("$session_name: $token");
        } else {
//            将整合的数据存进全局变量中
            Bs::sync_to_cache();
        }


        return $next($request);
    }
}
