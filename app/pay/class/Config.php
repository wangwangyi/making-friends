<?php
/**
 * 支付宝配置文件
 * ============================================================================
 * * 版权所有 2016-2018   网络科技有限公司，并保留所有权利。
 * 网站地址: 
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: lisonglin
 * Id:Comfig.php  2016年8月5日  Lisonglin
 */
class Config 
{
	private $Config = array(
			
			//--产品类型，无需修改
			
			'service' => 'create_direct_pay_by_user',
			
			//--合作身份者ID，签约账号
			
			'partner' => '2088221853025770',
			
			//--收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
			
			'seller_id' => '2088221853025770',
			
			'key' => 'dm389repz1r7d9n35z43mdbbe326latr',
			
			'http_type' => 'https://',
			
			//--接口地址
			
			'url' => 'mapi.alipay.com/gateway.do?',
			
			//--支付宝的公钥
			
			'publicKey' => '',
			
			//--商户的私钥
			
			'private_key'  => 'key/private.key',
			
			//--SSL请求证书地址
			
			'authKey_dir'  => '../key/auth.pem',
			
			//--服务器异步通知页面路径
			
			'notify_url' => 'http://test.musxxw.com/test.php',
			
			//-页面跳转同步通知页面路径
			
			'return_url' => 'http://www.jy.com/pay/alipayResult',
			
			
			
			'_input_charset' => 'utf-8',
			
			
			
			'key_width' => 64,
	
			//--支付类型
			'payment_type' => '1',
			
			'sign_type' => 'MD5'
				
	);
	public function Cfg($key) 
	{
		return $this->Config[$key];
	}
	
}