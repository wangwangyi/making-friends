<?php

//--支付宝
Route::get('/pay','PayController@index');
//充值记录
Route::get('/pay/record','PayController@record');
//消费记录
Route::get('/consume/record','PayController@consume');

Route::post('/pay/alipay','PayController@payment');
//支付宝支付处理
//Route::get('alipay/pay','AlipayController@pay');
//支付后跳转页面
//Route::post('alipay/return','AlipayController@result');
//--支付宝回调
Route::post('/pay/alipayCallback','PayController@alipayCallback');
Route::get('/pay/alipayResult','PayController@alipayResult');
//--充值异步记录
Route::get('/pay/record/list_{id}','PayController@AjaxRecord');
//--充值记录
Route::get('/pay/record/{id}','PayController@Record');

//--微信支付
Route::post('/pay/wx','PayController@payment');