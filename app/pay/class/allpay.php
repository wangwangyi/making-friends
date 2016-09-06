<?php
/**
 *  支付宝请求类
 * ============================================================================
 * * 版权所有 2016-2018   网络科技有限公司，并保留所有权利。
 * 网站地址: 
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: lisonglin
 * Id:allpay.php  2016年8月8日  Lisonglin
 */
class allpay 
{
	public function buildSign(Send $send)
	{
		$param = Util::getlinkParamter($send->param);
		$send->param['sign'] = Util::buildRequestsign($param);
		$send->param['sign_type'] = $send->Config->Cfg('sign_type');
	
	}
	public function get(Send $send)
	{
		$send->param['service'] = $send->Config->Cfg('service');
		$send->param['partner'] = $send->Config->Cfg('partner');
		$send->param['notify_url'] = $send->Config->Cfg('notify_url');
		$send->param['return_url'] = $send->Config->Cfg('return_url');
		$send->param['_input_charset'] = $send->Config->Cfg('_input_charset');
		$send->param['payment_type'] = $send->Config->Cfg('payment_type');
		$send->param['seller_id'] = $send->Config->Cfg('seller_id');
		$send->param = $send->requestFilter($send->param,'');
		$send->param = Util::sort($send->param);
		$this->buildSign($send);
	}
}