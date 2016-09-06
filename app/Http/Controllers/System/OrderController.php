<?php
/**
 * 充值订单
 * ============================================================================
 * * 版权所有 2016-2018   网络科技有限公司，并保留所有权利。
 * 网站地址: 
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: lisonglin
 * Id:OrderController.php  2016年8月23日  Lisonglin
 */
namespace App\Http\Controllers\System;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Category;
use Validator;
use App\Models\Gallery;
use App\Models\OrderModel;
use function League\Flysystem\getConfig; 
class OrderController extends  CommonController
{
	public function __construct()
	{
		parent::__construct();
		view()->share(['_set' => 'active']);
	}
	//--默认页面
	
	public function index()
	{
		$success = OrderModel::findByOrder();
		return view('system.order.index',['listData'=>$success,'status'=>config('info.pay_status')]);
	}
	
}