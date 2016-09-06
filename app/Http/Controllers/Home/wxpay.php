<?php
use Overtrue\Wechat\Payment;
use Overtrue\Wechat\Payment\Order;
use Overtrue\Wechat\Payment\Business;
use Overtrue\Wechat\Payment\UnifiedOrder;
use App\Http\Controllers\Controller;
use Overtrue\Wechat\Payment\Notify;
class wxpay extends Controller
{
	/**
	 * 微信支付
	 */
	public function pay()
	{
		//--定义商户
		$gateway    = Omnipay::create('WechatPay_App');
		$gateway->setAppId($config['app_id']);
		$gateway->setMchId($config['mch_id']);
		$gateway->setApiKey($config['api_key']);
		
		$order = [
		    'body'              => '',
		    'out_trade_no'      => date('YmdHis').mt_rand(1000, 9999),
		    'total_fee'         => 1, //=0.01
		    'spbill_create_ip'  => 'ip_address',
		    'fee_type'          => 'CNY'
		];
		
		
		$request  = $gateway->purchase($order);
		$response = $request->send();
		
		//available methods
		$response->isSuccessful();
		$response->getData(); //For debug
		$response->getAppOrderData(); //For WechatPay_App
		$response->getJsOrderData(); //For WechatPay_Js
		$response->getCodeUrl(); //For Native Trade Type
	}
	/**
	 * 微信回调
	 */
	public function Result()
	{
		$notify = new Notify( APP_ID, APP_KEY, MCH_ID, MCH_KEY );
		
		$transaction = $notify->verify();
		
		if (!$transaction) {
			$notify->reply('FAIL', 'verify transaction error');
		}
		
		// var_dump($transaction);
		
		echo $notify->reply();
	}
}