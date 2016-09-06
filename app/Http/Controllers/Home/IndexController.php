<?php

namespace App\Http\Controllers\Home;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class IndexController extends CommonController
{
    public function index()
    {
        return view('home.index.home');
    }

}

class charm{

    //result方法返回总分，得分，比例
    public function result($user_id)
    {
        $base =self::base($user_id);
    }

    //返回基本信息得分总分
    public function base($user_id)
    {
        $arr = array();
        $date = array(
            'sex' => 1,               //用户性别
            'provice' => 1,           //用户省
            'city' => 1,              //城市
            'area' => 1,              //区域
            'marital_status' => 1,     //婚姻状态
            'height' => 1,             //身高
            'myself' => 1,              //自我介绍
            'blood' => 1,               //血型
            'nation' => 1,              //民族
            'education' => 1,         //学历
            'house' => 1,               //住房
            'auto' => 1,                //用车
            'salary' => 1,            //薪水
            'name' => 1,              //名字
            'email' => 1,             //邮箱
            'birthday' => 1,           //生日
        );

        $one = User::find($user_id);
        if ($one != null) {
            $ones = $one->toArray();
            foreach ($ones as $k => $v) {
                if (array_key_exists($k, $date) && strlen($v) > 0 && $v !== 0) {
                    $arr[] = $date[$k];
                }
            }
            $arsum = array_sum($date);  //总分
            $mark = array_sum($arr);    //得分
//            $proportion = ceil(($mark / $arsum) * 100) . '%';   //得分跟总分比
            $resou = array($date, $mark);   //总分，得分
            return $resou;
        }else{
            return false;
        }
    }

    //返回用户其他信息得分总分
    public function extc(){
        
    }
}
