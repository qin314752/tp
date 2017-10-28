<?php
namespace Home\Controller;
class IndexController extends CommonController 
{	
	//首页
	 public function index()
	{	
		$carousel = M('carousel')->where('carousel_show=1 AND carousel_ststic=1 AND prod_brand='.session('WeChat'))->select();
		$this->assign('carousel',$carousel);
		$this->assign('home_img',1);
		$this->display();

	}

	//分类-产品列表
	public function inquire()
	{
		update_shopping();
		prod_activity();
		$data = I();
		$data['prod_stastic']=1;
		$data['prod_brand']=session('WeChat');
		$product = M('product');
		if($data['prod_kind']==0){
			$arr =array();
			for ($i=2; $i <=5; $i++) { 
				$data['prod_kind'] = $i;
				$arr[$i-2] = $product->where($data)->order('id desc,prod_number desc')->find();
			}
		$product = array_filter($arr);
		}else{
		$product = $product->where($data)->order('id desc,prod_number desc')->select();
		}
		$carousel = M('carousel')->where('prod_brand='.session('WeChat').' AND carousel_ststic=2 AND carousel_show=1')->getField('carousel_img');
		$this->assign('carousel',$carousel);
		$this->assign('product',$product);
		$this->assign('inquire',array_keys($data)[0]);
		$this->assign('pag',array_values($data)[0]);
		$this->assign('home_img',1);

		$this->display();
	}

	//首页查找
	public function find()
	{
		$prod_name = trim(I('post.prod_name'));
		if(!$prod_name)$this->error();
		$data = M('product')->query('select * from zc_product where prod_name like "%'.$prod_name.'%"');
		$this->assign('product',$data);
		$this->display('inquire');
	}
	//收藏数据处理
	public function collect()
	{
		if(I()){
			$data  =I();
			$data['user_id'] = session('user_list');
			if($data['ststic']==1){
				unset($data['ststic']);
				$string = inquire_name('collect','',$data,'add');
			}else if($data['ststic']==0){
				unset($data['ststic']);
				$string = inquire_name('collect',$data,'','delect');
			}
			if($string)echo '成功';
		}else{
		$data = M('collect')->where('user_id='.session('user_list'))->getField('product_id',true);
		for ($i=0; $i < count($data); $i++) { 
			$data[$i] = 'id ='.$data[$i];
			$product[$i] = M('product')->where($data[$i])->order('prod_number desc')->select();
		}
		$this->assign('product',$product);
		$this->assign('collect',$data);
		$this->assign('home_img',2);
		$this->display();
		}

	}
	//意见反馈
	public function opinion()
	{
		$data = I();
		$data['opinion_time']=time();
		$data['user_id']=session('user_list');
		if($data['opinion_centents']==''){
			unset($data['opinion_centents']);
		}
		if(!inquire_name('opinion','',$data,'add')){
			alogs('index',6,session('user_list').'意见反馈添加失败',session('user_list'));
		}else{
			echo '成功';
		}
	}
	//购买后列表
	public function shopping()
	{
		update_shopping();
		prod_activity();
		$id = session('user_list');
		$data =	M('indent')->where('user_id='.$id.' AND indent_static<4')->order('indent_static asc,reserve_time desc')->select();	
		foreach ($data as $key => $value) {
		    $data[$key]['product_id'] =inquire_name('product','id='.$value['product_id'],'','select')[0];
		    $data[$key]['address_id'] =inquire_name('address','id='.$value['address_id'],'','select')[0];
		    $data[$key]['address_name'] = $data[$key]['address_id']['address_name'];
		    $data[$key]['address_phone'] = $data[$key]['address_id']['address_phone'];
		    $data[$key]['address'] = $data[$key]['address_id']['address'];
		    $data[$key]['address_static'] = $data[$key]['address_id']['address_static'];
		    $data[$key]['prod_name'] = $data[$key]['product_id']['prod_name'];
		    $data[$key]['prod_product_time'] = $data[$key]['product_id']['prod_product_time'];
		    $data[$key]['prod_part'] =  $data[$key]['product_id']['prod_part'];
		    unset($data[$key]['address_id']);
		    unset($data[$key]['product_id']);
		    $data[$key]['out_trade_no'] = mb_substr($data[$key]['out_trade_no'],10);
		   	
		}
		$this->assign('home_img',3);
		$this->assign('data',$data);
		$this->display();
	}
	
	
	//产品详情页
	public function particulars()
	{
		$data = I();
		if(I('get.lun')){
			unset($data['lun']);
			$home_img=1;
		}else{
		$home_img=$data['home_img'];
		}
		unset($data['home_img']);
		$data['prod_stastic']=1;
		$arr = M('product')->where($data)->find();
		$address_data['address_static']=1;
		$address_data['prod_brand']=$data['prod_brand'];
		if($arr['prod_kind']==1){
			$address_data['address_name'] = C('ADDRESS_NAME');
		}
		$address = M('address')->where($address_data)->select();
		$arr['prod_part'] = prod_part($arr['prod_part'],1);
		$collect = inquire_name('collect','user_id='.session('user_list').' AND product_id='.$data['id'],'','select');
		$this->assign('collect',$collect);
		$this->assign('address',$address);
		$this->assign('particulars',$arr);
		$this->assign('home_img',$home_img);
		$this->assign('prod_brand',$data['prod_brand']);
		$this->display();
	}
	//消费记录
	public function consume_list()
	{
		$indent = M('indent')->where('user_id='.session('user_list'))->order('id desc')->getField('id,cash_fee,time_end');
		$recharge = M('recharge')->where('user_id='.session('user_list'))->order('id desc')->getField('id,cash_fee,time_end');
		$this->assign('indent',$indent);
		$this->assign('recharge',$recharge);
		$this->assign('home_img',4);
		$this->display();
	}
 	//支付密码比对
 	public function pay_password(){
 		$string = I('get.pay_password');
 		$data = I('post.pay_password');
	 	$consumer = M('consumer');
 		if($data){
	 		$str = $consumer->where('id='.session('user_list'))->getField('pay_password');
	 		if(md5($data)==$str){
	 			echo 1;
	 		}else{
	 			echo 0;
	 		}
	 		die;
 		}
 		if($string){
	 		$pay_password = $consumer->where('id='.session('user_list'))->getField('pay_password');
	 		if($pay_password){echo 0;die;}
			$str = $consumer->where('id='.session('user_list'))->setField('pay_password',md5($string));
			if(!$str){echo 0;die;}
				echo 1;die;
 		}
 	}
 	//产品购买
 	public function product()
 	{
 		// var_dump(I());die;
 		$arr = I();
 		$prod_brand = $arr['prod_brand'];
 		$arr['reserve_time']=strtotime($arr['reserve_time']);
 		unset($arr['prod_brand']);
		$string ='payment_id=2@';
		$string .='user_id='.session('user_list').'@';
 		foreach ($arr as $key => $value) {
 			$string .= $key.'='.$value.'@';
 		}
 		$pay_y='address_id='.$arr['address_id'].'@product_id='.$arr['product_id'].'@reserve_time='.$arr['reserve_time'];
		$this->assign('pay_y',$pay_y);
	
		$error = 'particulars?id='.$arr['product_id'].'&prod_brand='.$prod_brand;
		$this->assign('error',$error);
 		
 		$product  =M('product')->where('id='.$arr['product_id'])->find();

 		$pay_password = M('consumer')->where('id='.session('user_list'))->getField('pay_password');
		$this->assign('pay_password',$pay_password);
 		
 		$members_id = M('consumer')->where('id='.session('user_list'))->getField('members_id');
 		

 		if($product['prod_kind']==7){
 		$money = number_format($product['prod_money'], 2, '.', '');
 		}else{
 		$members_discount = M('members')->where('id='.$members_id)->getField('members_discount')/100;
 		$money = number_format($product['prod_money']*$members_discount, 2, '.', '');
 		}

 		$jsApiParameters = $this->jsApiCall($money*100,$string,$product['prod_name']);
		$this->assign('jsApiParameters',$jsApiParameters);


		$this->assign('id',$product['id']);
		$this->assign('money',$money);
		$this->display();
 	}
 	//优惠券
 	public function give_data(){

 		$give = M('prod_give');
 		$give_data = $give->where('give_static=1 and user_id='.session('user_list'))->select();
		$this->assign('give_data',$give_data);
		$num = $give->where('give_static=1')->count();
		$this->assign('num',$num);
		$prod_money = M('product')->where('id='.I('get.id'))->getField('prod_money');
		$this->assign('money',$prod_money);
		$this->assign('moneys',I('get.money'));
		$this->display();

 	}
 	
 	//用户中心
 	public function userlist()
 	{
 		$data = M('consumer')->where('id='.session('user_list'))->find();
 		$members_name = M('members')->where('id='.$data['members_id'])->getField('members_name');
 		$this->assign('data',$data);
 		$this->assign('members_name',$members_name);
 		$this->assign('home_img',4);
 		$this->display();
 	}
 	//充值页面
 	public function recharge()
 	{
		$members = M('members')->select();
 		$this->assign('members',$members);
 		$this->assign('home_img',4);
 		$this->display();
 	}
 	//充值
 	public function recharge_money()
 	{
 		if(I('get.pay_data')){
 			$data = explode("@", I()['pay_data']);
	 		$arr = array();
	 		foreach ($data as $key => $value) {
	 			 $array  =explode("=", $value);
	 			 $arr[$array[0]]=$array[1];
	 		}
	 		$arr['give_id'] = I('get.give_id');
	 		if(I('get.give_id')){$this->error('参数丢失1');}
			$product  =M('product')->where('id='.$arr['product_id'])->find();
 			$give = M('prod_give')->where('give_static=1 and id='.$arr['give_id'])->find();
 			$arr['prod_give']=$give['prod_give_money'];
 			$string ='payment_id=2@';
			$string .='user_id='.session('user_list').'@';
	 		foreach ($arr as $key => $value) {
	 			$string .= $key.'='.$value.'@';
	 		}
			$jsApiParameters = $this->jsApiCall(($product['prod_money']-$give['prod_give_money'])*100,$string,$product['prod_name']);
 		}else{
			$money = trim(I('get.money'));
			$string = 'user_id='.session('user_list').'@payment_id=1';
			$jsApiParameters = $this->jsApiCall($money*100,$string);
 		}
		$this->assign('jsApiParameters',$jsApiParameters);
		$this->display();
 	}

 	public function jsApiCall($money,$string,$prod_name='在线充值')
 	{	
 			ini_set('date.timezone','Asia/Shanghai');
 			Vendor(session('WeChat_pay').'.WxPayApi');
			Vendor(session('WeChat_pay').'.JsApiPay');
			Vendor(session('WeChat_pay').'.log');
			//初始化日志
			$logHandler= new \CLogFileHandler("/phpstudy/www/logs/".date('Y-m-d').'.log');
			$log = \Log::Init($logHandler, 15);

			//①、获取用户openid
			$tools = new \JsApiPay();
			$openId = $tools->GetOpenid();
			//②、统一下单
			$input = new \WxPayUnifiedOrder();
			$input->SetBody($prod_name);//设置商品或支付单简要描述 //产品名称
			$input->SetAttach($string);//设置附加数据，在查询API和支付通知中原样返回，该字段主要用于商户携带订单的自定义数据
			//订单号
			$Out_trade_no = \WxPayConfig::MCHID.date("YmdHis").rand(0000,9999);
			session('Out_trade_no',$Out_trade_no);
			$input->SetOut_trade_no($Out_trade_no);//设置商户系统内部的订单号,32个字符内、可包含字母, 其他说明见商户订单号
			$input->SetTotal_fee($money);//单位分设置订单总金额，只能为整数，详见支付金额
			$input->SetTime_start(time());//设置订单生成时间，格式为yyyyMMddHHmmss，如2009年12月25日9点10分10秒表示为20091225091010。其他详见时间规则
			$input->SetTime_expire(date("YmdHis", time() + 600));//设置订单失效时间，格式为yyyyMMddHHmmss，如2009年12月27日9点10分10秒表示为20091227091010。其他详见时间规则
			$input->SetGoods_tag("test");//设置商品标记，代金券或立减优惠功能的参数，说明详见代金券或立减优惠
			$input->SetNotify_url("http://tianshutang.com/index.php/Home/Index/notify");//设置接收微信支付异步通知回调地址
			$input->SetTrade_type("JSAPI");//设置取值如下：JSAPI，NATIVE，APP，详细说明见参数规定
			$input->SetOpenid($openId);//设置trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识。下单前需要调用【网页授权获取用户信息】接口获取到用户的Openid。
			$order = \WxPayApi::unifiedOrder($input);
			//参数列表 供JS调用
			return $jsApiParameters = $tools->GetJsApiParameters($order);

 	}

 	//微信充值 、购买支付数据处理
 	public function orderquery(){
		Vendor(session('WeChat_pay').'.WxPayApi');
		if(session('Out_trade_no')&& session('Out_trade_no') != ""){
			
			$out_trade_no = session('Out_trade_no');
			$input = new \WxPayOrderQuery();
			$input->SetOut_trade_no($out_trade_no);
			$data = \WxPayApi::orderQuery($input);
		}
		$consumer= M('consumer');
		if($data['result_code']=='SUCCESS'&&$data['trade_state']=='SUCCESS'){
			$arr = explode('@', $data['attach']);
			foreach ($arr as $value){
				if($value){
					$data[explode('=', $value)[0]] = explode('=', $value)[1];
				}
			}
			unset($data['appid']);
			unset($data['bank_type']);
			unset($data['fee_type']);
			unset($data['is_subscribe']);
			unset($data['sign']);
			unset($data['total_fee']);
			unset($data['attach']);
			if($data['code'])unset($data['code']);
			if($data['state'])unset($data['state']);
			if($data['return_msg'])unset($data['return_msg']);
			$data['time_end'] = strtotime($data['time_end']);
			$data['cash_fee'] = $data['cash_fee']/100;
			$data['nonce_str']=substr(strtolower($data['nonce_str']),-8);
			session('W_time',date('Y-m-d H:i:s',$data['time_end']));
			$time = session('W_time');
			$user_phone = $consumer->where('id='.$data['user_id'])->getField('user_phone');
			if($data['payment_id']==1&&$data['trade_state']=='SUCCESS'){
       			 $consumer->startTrans();
				unset($data['payment_id']);
				unset($data['trade_state']);
				$moneys = $consumer->where('id='.$data['user_id'])->getField('user_money')+$data['cash_fee'];
				//短息内容拼接
			    $contenr = str_replace('#MONEYS#',$moneys,str_replace('#MONEY#',$data['cash_fee'],str_replace('#DATE#',$time,str_replace('#USERANEM#',$user_phone,FS('Dynamic/smstxt')['payonline']))));
	 			//会员等级判断 id获取
				$members_money =  M('members')->getField('members_money',true);
	 			$members_money[end(array_keys($members_money))+1] = $data['cash_fee']+0.01;
	 			$members_money = bubble_sort($members_money);
	 			$members_id = $members_money[array_search($data['cash_fee']+0.01, $members_money)-1];
	 			$members_id =  M('members')->where('members_money='.$members_id)->getField('id');
	 			//用户数据读取
				$consumer_data = $consumer->where('id='.$data['user_id'])->find();
	 			//充值写入
	 			$user_data = array();
	 			$user_data['user_money']=$consumer_data['user_money']+$data['cash_fee'];
	 			$user_data['money_amount']=$consumer_data['money_amount']+$data['cash_fee'];
				//会员等级判断
	 			if($consumer_data['members_id']<$members_id){
	 				$user_data['members_id']=$members_id;
	 			}else{
	 				$user_data['members_id']=$consumer_data['members_id'];
	 			}


			$user_add = $consumer->where('id='.$data['user_id'])->setField($user_data);
			$recharge = M('recharge')->data($data)->filter('strip_tags')->add();
			if($user_add&&$recharge){
		          $consumer->commit();
		          texting($user_phone,$contenr);
				  alogs('WxPayApi',2,$contenr,$user_phone,'indent_dologs');
				  session('Out_trade_no',null);
		      }else{
		          $consumer->rollback();
		      }
		         $this->redirect('userlist');

			}else if($data['payment_id']==2&&$data['trade_state']=='SUCCESS'){
				unset($data['payment_id']);
				unset($data['trade_state']);
				$give = M('prod_give');
				if($data['give_id']){
					$prod_give_money = $give->where('give_static=1 and id='.$data['give_id'])->getField('prod_give_money');
	 				$give->where('give_static=1 and id='.$data['give_id'])->setField('give_static',0);
	 				$data['prod_give']=$prod_give_money;
				}
	 				unset($data['give_id']);

				if($data['reserve_time']){
					$data['reserve_type']=1;
				}else{
					$period = inquire_name('period','','','select')[0];
		            $name = session('WeChat_pay');
		            $data['reserve_time'] = $data['time_end']+$period[$name]*86400;
				}
				$product  =M('product');
				$product_data = $product->where('id='.$data['product_id'])->find();
				if($product_data['prod_give']>0){
					$give_data = array(
						'user_id'=>session('user_list'),
						'prod_id'=>$data['product_id'],
						'prod_give_money'=>$product_data['prod_give'],
					);
					$give_data = $give->add($give_data);
				}

				$time_end = date('Y-m-d H:i:s',$data['reserve_time']);
				$chars = "0123456789";  
				$str ="";
				for ( $i = 0; $i < 8; $i++ )  {  
					$str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
				} 

				$data['nonce_str'] = $str;
				$contenr =str_replace('，可用余额为#MONEYS#元','',str_replace('#CODE#',$data['nonce_str'],str_replace('#TIME#',$time_end,str_replace('#DATE#',$time,str_replace('#MONEY#',$product_data['prod_money'],str_replace('#CROWDID#',$product_data['prod_name'],str_replace('#USERANEM#',$user_phone,FS('Dynamic/smstxt')['withdraw'])))))));
 				if(!$arr['prod_give'])unset($arr['prod_give']);

				if(M('indent')->data($data)->add()){
				  	session('Out_trade_no',null);
					texting(session('user_phone'),$contenr);
					alogs('WxPayApi',1,$contenr,session('user_phone'),'indent_dologs');
				}
					$this->redirect('shopping');

			}

		}else{
			$this->error();
		}
 	}

//余额支付
 	public function payment()
 	{
 		$data = explode("@", I()['data']);
 		$arr = array();
 		foreach ($data as $key => $value) {
 			 $array  =explode("=", $value);
 			 $arr[$array[0]]=$array[1];
 		}
 		$consumer= M('consumer');
        $consumer->startTrans();
 		$product = M('product')->where('id='.$arr['product_id'])->find();
 		$give = M('prod_give');
 		if($arr['give_id']){
 			$give_money = $give->where('give_static=1 and id='.$arr['give_id'])->getField('prod_give_money');
 			if($give_money){
 				$givemoney = $product['prod_money']-$give_money;
 				if($givemoney<=0){
 					$arr['cash_fee'] = 0;
 				}else{
 					$arr['cash_fee'] = $givemoney;
 				}
 			$prod_give = $give->where('give_static=1 and id='.$arr['give_id'])->setField('give_static',0);
 			}else{
 				$arr['cash_fee'] = $product['prod_money'];
 			}
 		}else{
 		$arr['cash_fee'] = $product['prod_money'];
 		}
 		$give_id = $arr['give_id'];
 		unset($arr['give_id']);
 		$arr['prod_give'] = $give_money;
 		
 		$con_data = $consumer->where('id='.session('user_list'))->find();
 		if(($con_data['user_money']-$arr['cash_fee'])<0){echo '余额额不足';die;}

 		if(session('WeChat')==1){
 		$arr['mch_id'] = C('MCHID_T');	
 		$arr['out_trade_no'] = C('MCHID_T').date('YmdHis',time()).rand(0000,9999);
 		}else{
 		$arr['mch_id'] = C('MCHID_K');	
 		$arr['out_trade_no'] = C('MCHID_K').date('YmdHis',time()).rand(0000,9999);
 		}
 		$arr['result_code'] = 'SUCCESS';
 		$arr['return_code'] = 'SUCCESS';
 		$arr['time_end'] = time();
 		$arr['trade_type'] = 'pay_y';
 		$arr['transaction_id'] ='4200000021'.date('YmdHis',time()).rand(0000,9999);
 		$arr['user_id'] = session('user_list');
 		
 		if($arr['reserve_time']){
 			$arr['reserve_type']=1;
 		}else{
 			$period = inquire_name('period','','','select')[0];
            $name = session('WeChat_pay');
            $arr['reserve_time'] = time()+$period[$name]*86400;
 		}
 		
		$chars = "0123456789";  
		$str ="";
		for ( $i = 0; $i < 8; $i++ )  {  
			$str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
		} 

 		$arr['nonce_str'] = $str;
 		$arr['openid'] = '0000000000000000000000000000';
 		if($arr['cash_fee']!=0){
	 		if($con_data['user_money']-$arr['cash_fee']<=0){
	 			$con_data['user_money']=0;
	 		}else{
	 			$con_data['user_money']=$con_data['user_money']-$arr['cash_fee'];
	 		}
 			$string = $consumer->where('id='.session('user_list'))->setField('user_money',$con_data['user_money']);
 		}else{
 			$string=1;
 		}
 		if(!$arr['prod_give'])unset($arr['prod_give']);
 		$indent = M('indent')->data($arr)->add();
 		$product  =M('product');
		$product_data = $product->where('id='.$arr['product_id'])->find();
		$give_data = array(
				'user_id'=>session('user_list'),
				'prod_id'=>$arr['product_id'],
				'prod_give_money'=>$product_data['prod_give'],
			);
		$time_end = date('Y-m-d H:i:s',$arr['reserve_time']);
		$content =str_replace('#MONEYS#',$con_data['user_money'],str_replace('#CODE#',$arr['nonce_str'],str_replace('#TIME#',$time_end,str_replace('#DATE#',date('Y-m-d H:i:s',time()),str_replace('#MONEY#',$product_data['prod_money'],str_replace('#CROWDID#',$product_data['prod_name'],str_replace('#USERANEM#',session('user_phone'),FS('Dynamic/smstxt')['withdraw'])))))));
		if($give_id){
			if($indent&&$string&&$prod_give){
		          $consumer->commit();
		          $give_data = $give->add($give_data);
		          texting(session('user_phone'),$content);
				  alogs('payment',1,$content,session('user_phone'),'indent_dologs');
		          echo '成功';
		      }else{
		          $consumer->rollback();
		          echo '1';
		          echo '失败';
		      }
		}else{
			if($indent&&$string){
		          $consumer->commit();
		          $give_data = $give->add($give_data);
		          texting(session('user_phone'),$content);
				  alogs('payment',1,$content,session('user_phone'),'indent_dologs');
		          echo '成功';
		      }else{
		          $consumer->rollback();
		          echo '2';
		          echo '失败';
		      }
		}
 	}

	public function notify()
	{
		Vendor(session('WeChat_pay').'.PayNotifyCallBack');
		\Log::DEBUG("begin notify");
		$notify = new \PayNotifyCallBack();
		$notify->Handle(false);


 	}



}