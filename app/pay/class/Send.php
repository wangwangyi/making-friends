<?php
/**
 * LD 框架库文件
 * 该类未请求类，采用挂载模式请求 ，详细请参考LDFRAMEWORK框架文档
 * ============================================================================
 * * 版权所有 2016-2018   网络科技有限公司，并保留所有权利。
 * 网站地址: 
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: lisonglin
 * Id:Send.php  2016年8月5日  Lisonglin
 */
class Send extends Config implements filter
{
	
	 //-- 请求的URL
	 public $url;
	 
	 //--请求参数
	 public $param;
	 
     //--商户的ID
     
	 private $media_id		  = '';
	 
	 private $privateKey;
	 
	 //--默认编码
	 private $DEFAULT_CHARSET = 'UTF-8';
	 
	 
	 //--默认POST请求方式
	 private $METHOD_POST     = "POST";
	 
	 //--默认请求GET方式
	 private $METHOD_GET      = "GET";
	 
	 //--get name
	 private $SIGN			  = 'sign'; 
	 
	 //--超时时间
	 private $timeout 		  =  10 ;
	 
	 //--
	 private $charset;
	 
	 //--挂载类对象
	 private $class;
	 
	 //--curl 对象
	 public $curl;
	 
	 //--
	 public  $Config;
	 
	 //--返回结果集
	 
	 public $success;
	 
	 /**
	  * 构造函数--初始化
	  */
	 public function Send(allpay $class) 
	 {
	 	$this->success = '';
	 	$this->class = $class;
	 	$this->Config = new \Config();
	 }
	 /**
	  * 过滤参数 ， 关于用法请看官方描述
	  * @param unknown $param
	  * @param string $filter
	  */
	 public function requestFilter(Array $param,$filter = '')
	 {
	 
	 	$param = new ArrayObject($param);
	 	$success = new filterParamter($param->getIterator(),$filter);
	 	foreach ($success as $result)
	 	{
	 		$key = $success->key();
	 		$res [$key] = $result;
	 	}
	 	return $res;
	 }
	 public function setUrl($url = '') 
	 {
	 	if(is_object($this->Config)) 
	 	{
	 		$this->url = $this->Config->Cfg('url');
	 	}
	 	$this->url = $url;
	 	return $this;
	 }
	 /**
	  * 初始化
	  * @return resource
	  */
	 public function init()
	 {
	 	 $url =  $this->Config->Cfg('http_type').$this->Config->Cfg('url');
	 	 if (!$this->url && !is_array($this->param))
	 	 {
	 	 	$this->url = $url;
	 		$this->url = $this->url.'?'.$this->param;
	 	 	$this->curl = curl_init($this->url);
	 	 
	 	 	return $this->curl;
	 	 }
	 	 $this->url = $url."_input_charset=".trim($this->Config->Cfg('_input_charset'));	 	
	 	 $this->curl = curl_init($url);
	 	 return $this->curl;
	 }
	 
	 /**
	  * 设置请求参数
	  * @param array $param
	  * @return Send
	  */	 
	 public function setParam(Array $param = array())
	 {

	 	$param = \Util::toCoding($param);
	 	
	 	//--去掉为空的元素
	 	$param = $this->requestFilter($param,'');
		$this->param = $param;
		$this->class->get($this);
	 	return $this;
	 }
	 /**
	  *  设置请求方式
	  * @param string $method GET | POST
	  * @return Send
	  */
	 public function method($method = 'post')
	 {
	 	if('get' == $method&&is_array($this->param))
	 	{
	 		$this->param = \Util::getlinkParamter($this->param);
	 	}
	 	return $this;
	 }
	 public function getParam() 
	 {
	 	return $this->param;
	 }
	 
	 private function _setSuccess($success ='')
	 {
	 	
	 	if('' == $this->success)
	 	{
	 		return false;
	 	}
	 	
	 	$this->success = $success;
	 	return true;
	 }
	 /**
	  * 单个
	  */
	 public function getSuccess()
	 {
	 	return $this->success;
	 }
	 
	 
	 public function sslPost()
	 {
	 	$this->curl = $this->init();
	 	curl_setopt($this->curl, CURLOPT_POST, true);
	 	curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);//SSL证书认证
	 	curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
	 	curl_setopt($this->curl, CURLOPT_CAINFO,$this->Config->Cfg('authKey_dir'));//证书地址
		curl_setopt($this->curl, CURLOPT_POST, true); 
		curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->param); 
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($this->curl, CURLOPT_TIMEOUT, 10); 
		$success = curl_exec($this->curl);
		//var_dump(curl_error($this->curl));
		$this->success = $success;
		curl_close($this->curl);
		return $success;
	 }
	 /**
	  * 构造form表单
	  */	 
	 public function formSubmit($method = 'get' ,$button_name = '')
	 {

	 	$url =  $this->Config->Cfg('http_type').$this->Config->Cfg('url');

	 	$sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='".$url."_input_charset=".trim($this->Config->Cfg('_input_charset'))."' method='".$method."'>";
	 	while (list ($key, $val)  = each($this->param))
	 	{
	 		$sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
	 	}
	 	$sHtml = $sHtml."<input type='submit'  value='".$button_name."' style='display:none;'></form>";
	 	$sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";
	 	return $sHtml;
	 }
	 /**
	  * 构造form GET表单
	  */
	 public function formGet()
	 {
	 	 
	 }
	 public function sslGet()
	 {
	    $this->curl = $this->init();
	 	curl_setopt($this->curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
	 	curl_setopt($this->curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
	 	curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
	 	curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
	 	curl_setopt($this->curl, CURLOPT_CAINFO, $this->Config->Cfg('authKey_dir'));//证书地址
	 	$success = curl_exec($this->curl);
	 	$this->success = $success;
	 	var_dump(curl_error($this->curl));//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
	 	curl_close($this->curl);
	 	return $success;
	 }
	 
	 
	 /*
	  * 发送post请求
	  * 
	  */
	 public function curlPost($data = '') 
	 {

	 	$this->init();
 		curl_setopt($this->curl, CURLOPT_URL, $this->url);
 		curl_setopt($this->curl, CURLOPT_POST, 1);
 		curl_setopt($this->curl, CURLOPT_HEADER, 0);
 		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
 		curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->param);
 		$success = curl_exec($this->curl);
 		$this->success = $success;
 		return $success;
	 }
	 /**
	  * 发送get请求
	  */
	 public function curlGet()
	 {
	 	$this->init();
	 	curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->curl, CURLOPT_HEADER, 0);
		$output = curl_exec($this->curl);
		return $output;
	 }
	 public function accept() 
	 {
	 	return $souccess;
	 }
}