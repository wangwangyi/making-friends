<?php
/**
 * 财务中心类
 * ============================================================================
 * * 版权所有 2016-2018   网络科技有限公司，并保留所有权利。
 * 网站地址: 
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: lisonglin
 * Id:FinanceController.php  2016年8月23日  Lisonglin
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
class FinanceController extends CommonController 
{
	public function __construct()
	{
		parent::__construct();
		view()->share(['_set' => 'active']);
	}
	
	//--默认
	public function index()
	{
		$success = OrderModel::OrderModelList();
		return view('system.finance.index',['listData'=>$success,'status'=>config('info.pay_status')]);
	}
	//--搜索
	public function seach()
	{
		
	}
	//--编辑，修改
	public function edit()
	{
		
	}
	//--删除
	public function delete()
	{
		
	}
	//--分页
	public function page()
	{
		
	}
}