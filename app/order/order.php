<?php
/**
 * 
 * ============================================================================
 * * 版权所有 2016-2018   网络科技有限公司，并保留所有权利。
 * 网站地址: 
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: lisonglin
 * Id:order.php  2016年8月21日  Lisonglin
 */
namespace App\order;

class order {
	public $pay;
	
	public $user;
	
	public $chars;
	
	public function __construct($pay = null)
	{
		$this->chars = '0123456789';	
		$this->pay = $pay;		
		$this->user = $pay->getUser();
	}
	/**
	 * 创建订单号
	 * @return string
	 */
	public function create_order_num()
	{
		$rand = mt_rand(0,1000);
	    $rand = 2 == strlen($rand) ? ('0'.$rand) : $rand;
	    $rand = 1 >= strlen($rand) ? ('00'.$rand) : $rand;
		list($usec, $sec) = explode(" ",  microtime());
		$time = $usec + (float) $sec;
		$order_id = 'ME' . substr(str_replace('.', '', $time), 0, 13) . $rand;
		return $order_id;
	}
	public function create_order($goods)
	{
		
		$order = array(
				//--订单id 生成规则 ME +13时间戳+3位随机数
				'order_id' => $this->create_order_num(),
				//--用户的id
				'uid'  => $this->user->id,
				//--订单的状态
				'payment_status' => 0,
				//-- 充值金额
				'amount'  => $goods['total_fee'],
				
				//--订单描述(此处生成充值的金额)
				'info' => $goods['subject'],
				
				//--订单创建时间
				'create_time' => time(),
				
				//--订单更新时间
				'update_time' => time(),
		);
		return $order;
	}
}