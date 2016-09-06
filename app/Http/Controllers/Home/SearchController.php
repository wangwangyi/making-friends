<?php

namespace App\Http\Controllers\Home;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
class SearchController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share([
            '_search' => 'nav-active',
        ]);
    }
    //搜索首页
   public function index(Request $request)
   {
       $where = function ($query) use ($request) {
           //根据地区查
           if ($request->has('provice') and $request->provice != '') {
               $query->where('provice', $request->provice);
           }
           //根据城市查
           if ($request->has('city') and $request->city != '') {
               $query->where('city', $request->city);
           }
           //根据结婚状态
           if ($request->has('marital_status') and $request->marital_status != '') {
               $query->where('marital_status', $request->marital_status);
           }
           //根据年龄查
          if($request->has('birthday')){
              $age = $request->birthday;
              $arr[] = explode("-",$age);
              $arr[0][1] = strtotime("-" .$arr[0][1] . "year",strtotime(Carbon::now()));
              $arr[0][0] =strtotime("-" .$arr[0][0] . "year",strtotime(Carbon::now()));
              $query->whereBetween('birthday',[$arr[0][1],$arr[0][0]]);
           }
       };
       $users = User::where($where)->get();
       return view('home.search.index')->with('users',$users);
   }
}
