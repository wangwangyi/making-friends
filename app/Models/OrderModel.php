<?php
namespace App\Models;
use DB;
use Cache;
use App\pay\pay;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrderModel extends Model
{
	protected $table = 'payment_order';
	static $fixtable = 'payment_log';
	public $timestamps = false;
	/**
	 * 创建订单
	 * @param \ArrayObject $data
	 * @return boolean
	 */
	static function create_order(\ArrayObject $data)
	{
		$pay = new pay();
		//--过滤参数
		$success = new \filterParamter($data->getIterator(),'');	
		$dat = array();
		$sql = 'insert into payment_order (';
		$vstring = '';
		$datas = null;
		$i = 0;
		foreach ($success as $result)
		{
			$key = $success->key();
			$sql = $sql . $success->key().',';
			$dat [$key] = $result;
			$vstring = $vstring .'?,';
			$datas[$i] = $result;
			$i = -~$i;
		}
		//--生成订单
		$sql = substr($sql,0,strlen($sql)-1) . ')values('. substr($vstring,0,strlen($vstring)-1) .')';
		//--返回订单数据
		if(DB::insert($sql, $datas))
		{
			return true;
		}
		return false;
	}
	/**
	 * 添加订单流水
	 */
	static function add_order_log(\ArrayObject $data)
	{
		$sql = 'insert into '. self::$fixtable.' (order_id,uid,payment_method,amount,create_time)values(?,?,?,?,?)';		
		$datas = [
			$data->offsetGet('out_trade_no'),
			$data->offsetGet('users')->id,
			$data->offsetGet('payment_method'),
			$data->offsetGet('total_fee'),
			$data->offsetGet('time')
		];
		
		//--是否已经支付过
		if(DB::select("SELECT id FROM ".self::$fixtable." where order_id = ?",[$data->offsetGet('out_trade_no')]))
		{
			return false;
		}
		if(DB::insert($sql, $datas))
		{
			return true;
		}
		return false;
	}
	
	/**
	 * 修改订单状态
	 * @param \ArrayObject 
	 */
	static function order_status(\ArrayObject $data)
	{
		$pay = new pay();
		$order = new OrderModel();
		$data->offsetSet('time', time());
		if($order::where('order_id', $data->offsetGet('out_trade_no'))
				->where('payment_status',0)
				->update(['payment_status' => $data->offsetGet('status'),'update_time'=>$data->offsetGet('time')])) {
			  if(!self::add_order_log($data))
			  {
			  		 echo '已经支付过';
			  }
		}
	}
	/**
	 * 根据id返回数据
	 * @param number $uid
	 * @param unknown $array
	 * @param string $method
	 * @return unknown
	 */
	static  function orderModelfindById($uid = 0, $method = 'ajax',  $param = null)
	{
		$searchValue = strtotime(trim($param['search']['value']));
		if($param['search']['value']){
			$searchWhere =  ' Where create_time like \'%'.$searchValue.'%\'';
			$sql = 'SELECT amount,create_time,payment_method FROM '.self::$fixtable.' '.$searchWhere .' AND uid = ?';
		}else {
			$searchWhere = '';
			$sql = 'SELECT amount,create_time,payment_method FROM '.self::$fixtable. ' where uid = ?';
		}
		
		$res = DB::select($sql,[$uid]);
		$success['data'] = $res;
		$i = 0;
		while($i < count($success['data']))
		{
			$success['data'][$i]->create_time =  date('Y-m-d H:i:s',$success['data'][$i]->create_time);
			$i = -~$i;
		}
		//--返回ajax数据
		if($method == 'ajax')
		{
			$success['draw'] = 0;
			$success['iTotalDisplayRecords'] = count($success['data']);
			$success['iTotalRecords'] = count($success['data']);
			return $success;
		}
		
		return $success['data'];
		
	}
}