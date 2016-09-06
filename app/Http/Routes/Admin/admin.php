<?php

    //后台用户登陆
Route::group(['prefix' => 'admin','namespace' => 'Admin'], function(){
    Route::get('/login', 'AuthController@getLogin');
    Route::post('/login', 'AuthController@postLogin');
    Route::get('/register', 'AuthController@getRegister');
    Route::post('/register', 'AuthController@postRegister');
    Route::get('/logout', 'AuthController@getLogout');
});

Route::group(['namespace' => 'System','middleware' => 'auth:admin','prefix' => 'admin'], function(){

    Route::get('/', 'IndexController@index');
    Route::resource('category', 'CategoryController');//分类资源路由
    Route::get('/clear_cache','SettingController@clear_cache');//清除缓存
    Route::get('/setting','SettingController@index');
    Route::get('/finance', 'FinanceController@index');  //财务中心
    Route::get('/order', 'OrderController@index');  //财务中心
    Route::put('/setting/change_password','SettingController@change_password');//修改账号密码
    Route::delete('/article/delete', 'ArticleController@delete');//内容ajax删除
    Route::delete('/article/destroy_gallery', 'ArticleController@destroy_gallery');//相册ajax删除
    Route::delete('/article/destroy_checked', 'ArticleController@destroy_checked');//多选删除
    Route::resource('article', 'ArticleController');//内容资源路由
    Route::get('/trash/restore','TrashController@restore');//还原
    Route::delete('/trash/delete/{id}','TrashController@delete');//删除
    Route::get('/trash','TrashController@index');//回收站
    Route::resource('user', 'UserController');//用户资源路由
    Route::get('/config','ConfigController@index');//站点信息
    Route::delete('/slide/delete', 'SlideController@delete');//轮播图ajax删除
    Route::resource('slides', 'SlideController');//轮播图资源路由
});