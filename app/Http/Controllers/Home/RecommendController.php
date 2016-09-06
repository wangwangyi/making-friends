<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use App\Models\Invite;
class RecommendController extends Controller
{
    public function recommend()
    {
      /*  $pid = Auth::guard('home')->user()->id;
        $cookie = setcookie("Users_Invitation",$pid,3600*3,"/","laravel52.app/home/register");
        $url = "<span>http://".$_SERVER["HTTP_HOST"].'/home/register/?pid='.$cookie."</span>";
        return $url;*/
        $pid = Auth::guard('home')->user()->id;
        $token =  session('_token');
        $content = "http://".$_SERVER["HTTP_HOST"].'/home/register/?pid='.$pid.'&token='.$token."";
        $status = 200;
        //设置cookie有效期为30分钟，作用路径为应用根目录，作用域名为laravel52.app
        return response($content,$status)->header('recommend_id',$pid)
            ->withCookie('Users_Invitation',$pid,60,$content,$content);
    }

    public function set(Request $request)
    {
        $pid = md5(Auth::guard('home')->user()->id);
        setcookie("Users_Invitation",$pid,time()+3600*3,"/");//生成推广链接后的checkcookie 防止同cookie注册
        $re = Invite::where("home_id",$pid)->first();
        if(!$re){//没有数据则写入，生成推广链接。
            $ip = $request->getClientIp();
            $data['home_id']=$pid;
            $data['token']=md5($pid.$_SERVER["HTTP_HOST"]);
            $data['created_at']= Carbon::now();
            $data['ip']=$ip;
           Invite::insert($data);
        }
        $ref = Invite::where("home_id",$pid)->first();
        return "<span>http://".$_SERVER["HTTP_HOST"].'/home/register/?invite_id='.$pid.'&token='.$ref['token']."</span>";
    }



}
