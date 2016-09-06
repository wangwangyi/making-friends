<?php
/**
 *  支付类
 * ============================================================================
 * * 版权所有 2016-2018   网络科技有限公司，并保留所有权利。
 * 网站地址: 
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: lisonglin
 * Id:PayController.php  2016年8月19日  Lisonglin
 */
namespace App\Http\Controllers\Home;
use Auth;
use Omnipay;
use App\pay\pay;
use App\order\order;
use App\Models\OrderModel;
use Symfony\Component\HttpFoundation\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
class PayController extends CommonController
{
	//--用户对象
	protected $user;
	//--存放订单的对象
	protected $order_data;
	//--订单长度
   	const order_length = 18;
   	//--订单前缀
   	const order_prex = 'ME';
   	//--order切面类实例化
	private   $order;

	public function __construct(){
/* 		$this->order_data = '{"payment_type":"1","subject":"\u7528\u6237\u5145\u503c\u4e860.01\u5143","trade_no":"2016081921001004340217027631","buyer_email":"13163303128","gmt_create":"2016-08-19 19:02:29","notify_type":"trade_status_sync","quantity":"1","out_trade_no":"ME1471756338950399","seller_id":"2088221853025770","notify_time":"2016-08-19 19:02:38","body":"\u5145\u503c","trade_status":"TRADE_SUCCESS","is_total_fee_adjust":"N","total_fee":"0.01","gmt_payment":"2016-08-19 19:02:37","seller_email":"51db888@sina.com","price":"0.01","buyer_id":"2088902118233344","notify_id":"6e5a797c70a721bba7f31ab8e4d65a4imi","use_coupon":"N","sign_type":"MD5","sign":"4596b6a0f74c45d8feb4228518f4a97f"}';
		$this->order_data = json_decode($this->order_data); */
		$this->user = Auth::user();
		$this->order = new order($this);
	}
	public function getUser()
	{
		return $this->user;
	}
	//--用户中心充值页面
	public function index()
	{
		return view('home/pay/pay')->with('_pay','block');
	}
	//--支付宝付款
	public function alipay($pay_nuch = 0)
	{
		
		$gateway = Omnipay::gateway();
		$pay = new pay();
	 	$goods = array(
				"subject"	=> '用户顶购了'.$pay_nuch.'元的充值订单',
				"total_fee"	=>  $pay_nuch,
			//	'out_trade_no' => '20168655555555',
			//	"show_url"	=> 'http://www.51db888.com/detail/3-5.html',
				"body"	=> '用户顶购了'.$pay_nuch.'元的充值订单'
		);
	 	//--创建订单
	 	$data = $this->order->create_order($goods);
	 	//--生成订单数据
		if(OrderModel::create_order(new \ArrayObject($data))){
		 	$goods['subject'] = $data ['info'];
		 	$goods['out_trade_no'] = $data ['order_id'];
		}
		$response = $gateway->purchase($goods)->send();
		$response->redirect();
		
		//--调用支付宝接口
	 	//	echo $pay->alipay->setParam($goods)->method('post')->formSubmit(); 
		
	}
	/**
	 * discount 
	 * payment_type   1 
	 * subject
	 * trade_no 
	 * buyer_email 
	 * gmt_create 
	 * notify_type | trade_status_sync
	 * quantity | 1
	 * out_trade_no | ME14716043934156031
	 * seller_id 
	 * trade_status | TRADE_SUCCESS
	 * is_total_fee_adjust | N
	 * total_fee | 
	 * seller_email | 51db888@sina.com
	 * sign_type | 
	 * sign
	 */	
	public function alipayCallback(Request $request)
	{
	    $gateway = Omnipay::gateway();

	    $options = [
	        'request_params'=> $_REQUEST,
	    ];
	
	    $response = $gateway->completePurchase($options)->send();
	
	    if ($response->isSuccessful() && $response->isTradeStatusOk()) {
	    	
	    	//--校验订单
	    	$order = new \ArrayObject($_REQUEST);
	    	
	    	
	    	try{
	    		
	    		//--充回调中拿到订单号
	    		$order_numer = $order->offsetGet('out_trade_no');
	    		
	    		//--判断订单是否合法    		
	    		if(($order_numer)  &&  (self::order_length == strlen($order_numer)) &&
	    			(self::order_prex == substr($order_numer, 0, 2))) {
	    					
	    					$order->offsetSet('users', $this->user);
	    					$order->offsetSet('status', 10);
	    					$order->offsetSet('payment_method','alipay');
	    					//--支付成功
	    					if(OrderModel::order_status($order)){
			    					//支付成功后操作
			    					exit('支付成功');
	    					}
	    					
	    		}
	    		
	    	}catch (\Exception $e){
	    		//这里是错误页面，可以调到404;
	    		echo '支付失败';
	    	}
	    	

	    } else {
	        //支付失败通知.
	        exit('支付失败');
	    }
			 
	}
	//--支付宝回调显示页面
	public function alipayResult()
	{
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
	
	//--付款控制流程
	public function payment(Request $request)
	{

	    $use_nuch = $request->use_nuch;
	    $pay_nuch = isset($request->pay_nuch) ? $request->pay_nuch : 0;
	    $pay_nuch = intval($pay_nuch);
	  
	    //--支付类型
		switch ($request->pay_type)
		{
			case 'alipay' : {
				if( $use_nuch > 0 ) 
				{
					$this->alipay($request->use_nuch);
				}else if ($pay_nuch > 0){
					$this->alipay($pay_nuch);
				}else {
					echo '错误页面';
				}
				break;
			}
			//--微信
			case  'wxpay' : {
				echo '微信支付插件位开通';
				exit;
			}
		}

	}
	/**
	 * 异步数据拉取
	 * @param Request $request
	 */
	public function AjaxRecord(Request $request)
	{
		$param = new \ArrayObject($_GET);
		$success = OrderModel::orderModelfindById($request->id,'ajax',$param);
		echo json_encode($success);
		exit;
	}
	
	//充值记录页面
	public function record()
	{
		return view('home.pay.pay_record')->with('_pay','block');
	}

	//消费记录页面
	public function consume()
	{
		return view('home.pay.consume_record')->with('_pay','block');
	}
}