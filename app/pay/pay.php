<?php

namespace App\pay;

use App\pay\lib\Config;
class pay 
{
	public $payPath;
	public $alipay;
	public $a;
	public function __construct()
	{
		$this->payPath =  str_replace('\\' ,'.' ,str_replace('pay.php', '', __FILE__)) . 'class.';
		$this->import($this->payPath,'Config.php');
		$this->import($this->payPath,'util.php');
		$this->import($this->payPath,'allpay.php');
		$this->import($this->payPath,'filter.php');
		$this->import($this->payPath,'Send.php');
		$this->alipay = new \Send( new \allpay());
	}
	/**
	 * ���캯��
	 */
	public function pay()
	{
		//$this->payPath =  str_replace('\\' ,'.' ,str_replace('pay.php', '', __FILE__));
		$this->__construct();
	}
	
	public function import($path = '',$file = '')
	{
		 $filePath = str_replace('.', '/', $path).$file;
		 if(is_file($filePath))
		 {			
		 	require_once $filePath;
		 }
	}
	
/* 	public function Alipay()
	{
		//--DEMO

		$this->pay = new \Send( new \allpay());
		$success = $this->pay->setParam($parameter)
		->method('post')
		->formSubmit();
	
	} */
}