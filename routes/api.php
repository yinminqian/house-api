<?php

use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::any('/test', function () {
dd(1);
});
Route::any('/read_location', function () {
    $location = new \App\Location;
    return $location->read();
});

Route::any('/read_independent', function () {
    $location = new \App\Location;
    return $location->read_independent();
});

Route::any('/signup', function () {
    $user = new User;
    return $user->signup();
});
Route::any('/login', function () {
    $user = new User;
    return $user->login();
});

Route::any('/islogin', function () {
    $user = new User;
    return $user->is_login();
});
Route::any('/logout', function () {
    $user = new User;
    return $user->logout();
});
Route::any('/{model}/{action}',function($model,$action){
    $conterller='\App\Http\Controllers\\'.ucfirst($model).'Controller';
    //找到这个类的文件
    return (new $conterller($model))->$action();
//    运行这个类下面的方法
});
