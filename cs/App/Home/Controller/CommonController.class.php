<?php
namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller 
{
    public function _initialize()
	{  
		// var_dump($_SERVER['HTTP_HOST']);
		// die;
		// if(I('get.WeChat')=='tianshu'){
			session('WeChat',1);
			session('WeChat_pay','tianshu');
		// }else if(I('get.WeChat')=='kangyun'){
			// session('WeChat',2);
			// session('WeChat_pay','kangyun');
		// }else{
			// die;
		// }
		$user_phone = cookie('user_phone');
		$user_password = cookie('user_password');
		if($user_phone&&$user_password){
			$data=array();
			$data['user_password'] = $user_password;
			$data['user_phone'] = $user_phone;
			$str = M('consumer')->where($data)->getField('id');
			if($str){
				session('user_phone',$user_phone);
				session('user_password',$user_password);
				session('user_list',$str);
			}else{
				cookie('user_phone',null); 
				cookie('user_password',null); 
				cookie(null); 
				session(null);
			}
		}else{

			$this->redirect('Home/Register/login');
		}
				
	}

	


		// file_put_contents('ab.text', $xml);
		
		// $data = xmlToArray($xml);
		// if($data['result_code']=='SUCCESS'){
		// 	$arr = explode('@', $data['attach']);
		// 	foreach ($arr as $value){
		// 		if($value){
		// 			$data[explode('=', $value)[0]] = explode('=', $value)[1];
		// 		}
		// 	}
		// 		unset($data['appid']);
		// 		unset($data['bank_type']);
		// 		unset($data['fee_type']);
		// 		unset($data['is_subscribe']);
		// 		unset($data['sign']);
		// 		unset($data['total_fee']);
		// 		unset($data['attach']);
		// 		// var_dump($data);
		// 	$data['time_end'] = strtotime($data['time_end']);
		// 	$data['cash_fee'] = $data['cash_fee']/100;
		// 	$time = date('Y-m-d H:i:s',$data['time_end']);
		// 	$user_phone = M('consumer')->where('id='.$data['user_id'])->getField('user_phone');
			

		// 	if($data['payment_id']==1){
		// 		unset($data['payment_id']);
		// 		//短息内容拼接
		// 	    $contenr = str_replace('#MONEY#',$data['cash_fee'],str_replace('#DATE#',$time,str_replace('#USERANEM#',$user_phone,FS('Dynamic/smstxt')['payonline'])));
	 // 			//会员等级判断 id获取
		// 		$members_money =  M('members')->getField('members_money',true);
	 // 			$members_money[end(array_keys($members_money))+1] = $data['cash_fee']+0.01;
	 // 			$members_money = bubble_sort($members_money);
	 // 			$members_id = $members_money[array_search($data['cash_fee']+0.01, $members_money)-1];
	 // 			$members_id =  M('members')->where('members_money='.$members_id)->getField('id');
	 // 			//用户数据读取
		// 		$user_money = M('consumer');
		// 		$consumer = $user_money->where('id='.$data['user_id'])->find();
	 // 			//充值写入
	 // 			$user_data = array();
	 // 			$user_data['user_money']=$consumer['user_money']+$data['cash_fee'];
	 // 			$user_data['money_amount']=$consumer['money_amount']+$data['cash_fee'];
		// 		//会员等级判断
	 // 			if($consumer['members_id']<$members_id){
	 // 				$user_data['members_id']=$members_id;
	 // 			}else{
	 // 				$user_data['members_id']=$consumer['members_id'];
	 // 			}
		// 		if($user_money->where('id='.$data['user_id'])->setField($user_data)){
		// 			if(M('recharge')->data($data)->filter('strip_tags')->add()){
		// 			message($user_phone,$contenr);
		// 			alogs('WxPayApi',2,$contenr,$user_phone,'indent_dologs');
		// 			}
		// 		}
		// 	}else if($data['payment_id']==2){
		// 		unset($data['payment_id']);
		// 		if($data['reserve_time']){
		// 			$data['reserve_type']=1;
		// 		}else{
		// 			$period = inquire_name('period','','','select')[0];
		//             $name = session('WeChat_pay');
		//             $data['reserve_time'] = $data['time_end']+$period[$name]*86400;
		// 		}
				
		// 		$product  =M('product');
		// 		$product_data = $product->where('id='.$data['product_id'])->find();
		// 		$time_end = date('Y-m-d H:i:s',$data['reserve_time']);
				
		// 		$contenr =str_replace('#CODE#',$data['nonce_str'],str_replace('#TIME#',$time_end,str_replace('#DATE#',$time,str_replace('#MONEY#',$product_data['prod_money'],str_replace('#CROWDID#',$product_data['prod_name'],str_replace('#USERANEM#',$user_phone,FS('Dynamic/smstxt')['withdraw']))))));
		// 		$indent = M('indent');
		// 		if($indent->data($data)->add()){
		// 			texting($user_phone,$contenr);
		// 			alogs('WxPayApi',1,$contenr,$user_phone,'indent_dologs');
		// 		}

		// 	}

		// }






		// if(unserialize($data['attach'])['payment_id']==1){
		// 	$data['user_id'] = unserialize($data['attach'])['user_id'];

		// 	$time = date('Y-m-d H:i:s',strtotime($data['time_end']));
		// 	$user_phone = M('consumer')->where('id='.$data['user_id'])->getField('user_phone');
		//     $contenr = str_replace('#MONEY#',$data['cash_fee']/100,str_replace('#DATE#',$time,str_replace('#USERANEM#',$user_phone,FS('Dynamic/smstxt')['payonline'])));
		// 	$members_money =  M('members')->getField('members_money',true);
 	// 		$members_money[end(array_keys($members_money))+1] = $data['cash_fee']/100+0.01;

 	// 		$members_money = bubble_sort($members_money);
 	// 		$members_id = $members_money[array_search($data['cash_fee']/100+0.01, $members_money)-1];
 	// 		$members_id =  M('members')->where('members_money='.$members_id)->getField('id');
		// 	$user_money = M('consumer');
		// 	$consumer = $user_money->where('id='.$data['user_id'])->find();
 		

 	// 		$user_data = array();
 	// 		$user_data['user_money']=$consumer['user_money']+$data['cash_fee']/100;

 	// 		if($consumer['members_id']<$members_id){
 	// 			$user_data['members_id']=$members_id;
 	// 		}else{
 	// 			$user_data['members_id']=$consumer['members_id'];
 	// 		}
		// 	$up_user_mZoney = $user_money->where('id='.$data['user_id'])->setField($user_data);
		// 	$string = M('recharge')->data($data)->filter('strip_tags')->add();
		// 	if($up_user_money&&$string){
		// 		if(message($user_phone,$contenr)){
		// 			alogs('index',7,$contenr,$user_phone);
		// 		}

		// 	}
		// }
















}