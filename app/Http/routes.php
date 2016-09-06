<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'IndexController@index');//主页界面


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {


    //前台
    require 'Routes/Home/home.php';

    //后台
    require 'Routes/Admin/admin.php';

    Route::group(['namespace' => 'Home','middleware' => 'auth'], function() {
        //支付
        require 'Routes/Home/pay.php';
    });

    Route::post('/uploads', 'FileController@upload');
    Route::post('/upload_icon', 'FileController@upload_icon');
    Route::post('/upload_slide', 'FileController@upload_slide');
});
