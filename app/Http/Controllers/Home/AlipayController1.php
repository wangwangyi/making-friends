<?php
namespace App\Http\Controllers\Home;
use Auth;
use Omnipay;
class AlipayController1 extends CommonController 
{
	public function pay(){

		
		$gateway = Omnipay::gateway();
	
		$options = [
				'out_trade_no' => date('YmdHis') . mt_rand(1000,9999),
				'subject' => '123',
				'total_fee' => '0.01',
		];
	
		$response = $gateway->purchase($options)->send();
		$response->redirect();
	}
	
	public function result(){
	
		$gateway = Omnipay::gateway();
	
		$options = [
				'request_params'=> $_REQUEST,
		];
	
		$response = $gateway->completePurchase($options)->send();
	
		if ($response->isSuccessful() && $response->isTradeStatusOk()) {
			//支付成功后操作
			exit('支付成功');
		} else {
			//支付失败通知.
			exit('支付失败');
		}
	
	}
}