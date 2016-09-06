<?php


function get_constellation($month, $day){
    $signs = array(
        array('20'=>'宝瓶座'), array('19'=>'双鱼座'),
        array('21'=>'白羊座'), array('20'=>'金牛座'),
        array('21'=>'双子座'), array('22'=>'巨蟹座'),
        array('23'=>'狮子座'), array('23'=>'处女座'),
        array('23'=>'天秤座'), array('24'=>'天蝎座'),
        array('22'=>'射手座'), array('22'=>'摩羯座')
    );
    $key = (int)$month - 1;
    list($startSign, $signName) = each($signs[$key]);
    if( $day < $startSign ){
        $key = $month - 2 < 0 ? $month = 11 : $month -= 2;
        list($startSign, $signName) = each($signs[$key]);
    }
    return $signName;
}

/**
 * 根据生日中的年份来计算所属生肖
 *
 * @param int $birth_year
 * @return string
 */
function get_animal($birth_year)
{
//1900年是子鼠年
    $animal = array(
        '鼠','牛','虎','兔','龙','蛇',
        '马','羊','猴','鸡','狗','猪'
    );

    $my_animal = ($birth_year-1900)%12;
    return $animal[$my_animal];
}

/**
 * 根据生日来计算年龄
 *
 * 用Unix时间戳计算是最准确的，但不太好处理1970年之前出生的情况
 * 而且还要考虑闰年的问题，所以就暂时放弃这种方式的开发，保留思想
 *
 * @param int $birth_year
 * @param int $birth_month
 * @param int $birth_date
 * @return int
 */
function get_age($birth_year,$birth_month,$birth_date)
{
    $now_age = 1; //实际年龄，以出生时为1岁计
    $full_age = 0; //周岁，该变量放着，根据具体情况可以随时修改

    $now_year   = date('Y',time());
    $now_date_num  = date('z',time()); //该年份中的第几天
    $birth_date_num = date('z',mktime(0,0,0,$birth_month,$birth_date,$birth_year));

    $difference = $now_date_num - $birth_date_num;
    if ($difference > 0)
    {
        $full_age = $now_year - $birth_year;
    }
    else
    {
        $full_age = $now_year - $birth_year - 1;
    }

    $now_age = $full_age + 1;

    return $now_age;
}


function getIPLoc_sina($queryIP){
    $url = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$queryIP;
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_ENCODING ,'utf8');
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
    $location = curl_exec($ch);
    $location = json_decode($location);
    curl_close($ch);
    $loc = "";
    if($location===FALSE) return "";
    if (empty($location->desc)) {
        $loc = $location->province.' '.$location->city.$location->district.$location->isp;
    }else{         $loc = $location->desc;
    }
    return $loc;
}

 function getip() {
    $unknown = 'unknown';
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    /**
     * 处理多层代理的情况
     * 或者使用正则方式：$ip = preg_match("/[\d\.]{7,15}/", $ip, $matches) ? $matches[0] : $unknown;
     */
    if (false !== strpos($ip, ',')) $ip = reset(explode(',', $ip));
    return $ip;
}


?>