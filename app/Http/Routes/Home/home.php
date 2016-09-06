<?php

    Route::auth();
    Route::get('/captcha/mews','Auth\AuthController@mews');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/recommend', 'Home\RecommendController@recommend');
    Route::get('/set', 'Home\RecommendController@set');
    Route::group(['namespace' => 'Home'], function() {
        Route::get('/home/send/{id}', 'UserController@send');
        Route::post('upload', 'CropController@postUpload');
        Route::post('crop', 'CropController@postCrop');
        Route::get('home', 'IndexController@index');
        Route::get('photo','UserController@photoUpload' );
    });
    Route::group(['namespace' => 'Home'], function() {
        Route::get('/user/info', 'UserController@userInfo');//用户信息中心
        Route::put('/user/info/update', 'UserController@updateInfo');//更新用户信息
        Route::get('/user/changePassword', 'UserController@changePassword');//修改密码
        Route::put('/user/updatePassword','UserController@updatePassword');//修改密码
        //消息中心
        Route::get('/message', 'MessageController@myMessage');//我的信息
        Route::get('/systemMessage', 'MessageController@systemMessage');//系统信息

        //搜索
        Route::get('/search','SearchController@index');

        //谁看过我
        Route::get('/seen','SeenController@index');
    });
    
    
});
