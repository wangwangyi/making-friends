<?php
/**
 *  LD工具类
 * ============================================================================
 * * 版权所有 2016-2018   网络科技有限公司，并保留所有权利。
 * 网站地址: 
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: lisonglin
 * Id:util.php  2016年8月5日  Lisonglin
 */

class Util  extends Config
{
	
	static $key_start = '-----BEGIN RSA PRIVATE KEY-----';
	static $key_end = '-----END RSA PRIVATE KEY-----';
	/**
	 * @param $data 配置参数
	 * 生成RSA 加密
	 */
    static function RSA($data)
	{
    	$Config = new \Config();
    	$publicKey = $Config->Cfg('publicKey');
    	$key_width = $Config->Cfg('key_width');
		$prive_key = file_get_contents($Config->Cfg('private_key'));

		openssl_sign($data, $sign_ssl, $prive_key,  OPENSSL_ALGO_SHA1);

		return $sign_ssl;
	}
	/**
	 * RSA签名
	 * @param $data 待签名数据
	 * @param $private_key 商户私钥字符串
	 * return 签名结果
	 */
	static function rsaSign($data , $prive_key) 
	{
			str_replace(self::$key_start, '', $prive_key);
	}
	static function create_key() 
	{
		$Config = new Config();
		//--私钥
		$fp = fopen('key/pri.key','wr');
		
		$pubkey = $Config->Cfg('publicKey');
		
		$key_width = $Config->Cfg('key_width');
		
		$i = 0;
		
		fwrite($fp, self::$key_start."\r");
		
		while ($key_str = substr($pubkey , ($i *  64), $key_width)) {
			fwrite($fp, $key_str."\r");
			$i++;
		}
		
		fwrite($fp, self::$key_end);
		
		fclose($fp);
	}
	
	static function getKey()
	{
		$Config = new Config();
		$key = file_get_contents($Config->Cfg('private_key'));	
		
		return $key;
	}

	/**
	 * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
	 * @param $para 需要拼接的数组
	 * return 拼接完成以后的字符串
	 */
	static function getlinkParamter($para) {
	
		$arg  = "";
		while (list ($key, $val) = each ($para)) {
			$arg.=$key."=".$val."&";
		}
		//去掉最后一个&字符
		$arg = substr($arg,0,count($arg)-2);
	
		//如果存在转义字符，那么去掉转义
		if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}

		return $arg;
	}
	
	/**
	 * 对数组排序
	 * @param $para 排序前的数组
	 * return 排序后的数组
	 */
	static function sort($para) 
	{
		ksort($para);
		reset($para);
		return $para;
	}
	/**
	 * 签名字符串
	 * @param $prestr 需要签名的字符串
	 * @param $key 私钥
	 * return 签名结果
	 */
	static function md5Sign($prestr, $key) {
		$prestr = $prestr . $key;
		return md5($prestr);
	}
	/**
	 * 生成签名结果
	 * @param $para_sort 已排序要签名的数组
	 * return 签名结果字符串
	 */
	static function buildRequestsign($para_sort) 
	{
		$Config = new Config();
		$sign = "";
		switch (strtoupper(trim($Config->Cfg('sign_type')))) 
		{
			case "RSA" : { $mysign = self::RsaSigns($para_sort, self::getKey()); break; }
			case "MD5" : { $mysign = self::md5Sign($para_sort, $Config->Cfg('key'));break; }
			default : { $mysign = ""; }
		}
		return $mysign;
	}	
	static function toCoding($param = array())
	{
		
		$temp = '';
		foreach ($param as $k => $v)
		{
			$encode = mb_detect_encoding($v, array('ASCII','GB2312','UTF-8'));
			if($encode == 'GB2312'){
				$temp[$k] = iconv('GB2312', 'utf-8', $v);
			}else {
				$temp[$k] = $v;
			}
		}
		return $temp;
	}
	/**
	 * 将对象转换成数组
	 * @param unknown $obj
	 */
	static function objectToArray($obj)
	{
		$arr = is_object($obj) ? get_object_vars($obj) : $obj;
		if(is_array($arr))
		{
			return array_map(__FUNCTION__, $arr);
		}else{
			return $arr;
		}
	}
	/**
	 * RSA签名
	 * @param $data 待签名数据
	 * @param $private_key 商户私钥字符串
	 * return 签名结果
	 */
	static function RsaSigns($data, $private_key) 
	{
		/* //以下为了初始化私钥，保证在您填写私钥时不管是带格式还是不带格式都可以通过验证。
		$private_key=str_replace("-----BEGIN RSA PRIVATE KEY-----","",$private_key);
		$private_key=str_replace("-----END RSA PRIVATE KEY-----","",$private_key);
		$private_key=str_replace("\n","",$private_key);
		
		$private_key="-----BEGIN RSA PRIVATE KEY-----".PHP_EOL .wordwrap($private_key, 64, "\n", true). PHP_EOL."-----END RSA PRIVATE KEY-----";
		echo $private_key;
		exit; */
		
		$res=openssl_get_privatekey($private_key);
	
		if($res)
		{
			openssl_sign($data, $sign,$res);
		
		}
		else {
			echo "您的私钥格式不正确!"."<br/>";
			exit();
		}
		openssl_free_key($res);
		//base64编码
		$sign = base64_encode($sign);
	
		return $sign;

	}
	

}