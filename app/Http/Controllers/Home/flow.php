<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class flow extends Controller
{
	private $json_return;
	public function index(Request $requst)
	{
		$id = $requst->id;
		return view('/Home/pay');
	}
	public function pay(Request $requst)
	{
		$type =  $requst->bank;
		switch($type)
		{
			case 'Alipay' :
			{
				$json_return['type'] = 'Alipay';
				return $json_return;
				break;	
			}
		}
	}
}