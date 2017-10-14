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
		$data = I();
		$data['prod_stastic']=1;
		$data['prod_brand']=session('WeChat');
		$product = M('product')->where($data)->order('id desc,prod_number desc')->select();
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
		$this->update_shopping();
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

		$this->assign('data',$data);

		$this->display();
	}
	//过期数据处理
	public function update_shopping()
	{
		$indent = M('indent');
		$data = $indent->where('indent_static=1 AND user_id='.session('user_list'))->getField('id,reserve_time,indent_static,user_id');
		foreach ($data as $key => $value) {
			if($value['reserve_time']<time()){
				$arr = array('indent_static'=>3,'past_time'=>$value['reserve_time']);
				if(!$indent->where('id='.$value['id'])->setField($arr)){
					alogs('Common',4,'用户产品过期数据更改失败',session('user_phone'),'indent_dologs');
				}
				
			}
		}
	}
	//产品详情页
	public function particulars()
	{
		$data = I();
		$home_img=$data['home_img'];
		unset($data['home_img']);
		$data['prod_stastic']=1;
		$arr = M('product')->where($data)->find();
		$address_data['address_static']=1;
		$address_data['prod_brand']=$data['prod_brand'];
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
 		$members_discount = M('members')->where('id='.$members_id)->getField('members_discount')/100;
 		$money = number_format($product['prod_money']*$members_discount, 2, '.', '');
		$this->assign('money',$money);

 		// $jsApiParameters = $this->jsApiCall($money*100,$string,$product['prod_name']);
		// $this->assign('jsApiParameters',$jsApiParameters);
		$this->display();
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
 		$product = M('product')->where('id='.$arr['product_id'])->find();
 		$arr['cash_fee'] = $product['prod_money'];

 		$consumer= M('consumer');
        $consumer->startTrans();
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
 		
		$chars = "abcdefghijkmnpqrstuvwxy0123456789";  
		$str ="";
		for ( $i = 0; $i < 8; $i++ )  {  
			$str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
		} 

 		$arr['nonce_str'] = $str;
 		$arr['openid'] = '0000000000000000000000000000';

 		$string = $consumer->where('id='.session('user_list'))->setField('user_money',$con_data['user_money']-$arr['cash_fee']);
 		$indent = M('indent')->data($arr)->add();
 		$product  =M('product');
		$product_data = $product->where('id='.$arr['product_id'])->find();
		$time_end = date('Y-m-d H:i:s',$arr['reserve_time']);
		$content =str_replace('#CODE#',$arr['nonce_str'],str_replace('#TIME#',$time_end,str_replace('#DATE#',date('Y-m-d H:i:s',time()),str_replace('#MONEY#',$product_data['prod_money'],str_replace('#CROWDID#',$product_data['prod_name'],str_replace('#USERANEM#',session('user_phone'),FS('Dynamic/smstxt')['withdraw']))))));
      if($indent&&$string){
          $consumer->commit();
          texting(session('user_phone'),$content);
		  alogs('payment',1,$content,session('user_phone'),'indent_dologs');
          echo '成功';
          die;
      }else{
          $consumer->rollback();
          echo '失败';
          die;
      }

 	}
 	//用户中心
 	public function userlist()
 	{
 		
 		if(!session('user_list')){
 			cookie(null);
			session(null);
			$this->redirect('index');
 		}
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
		if(I('get.dispose')<=0)$this->redirect(U('Home/Index/recharge'));
		$money =trim(I('get.dispose'));
		$user_id = 'user_id='.session('user_list').'@';
		$payment_id ='payment_id=1';
		$string = $user_id.$payment_id;
		// var_dump($string);
		// if(figure($money)){
			// var_dump($money);
			$jsApiParameters = $this->jsApiCall($money*100,$string);
			// $this->assign('jsApiParameters',$jsApiParameters);
		// }else{
			// $this->error('请输入数字',U('Home/Index/recharge') );
		// } 
		$this->assign('jsApiParameters','jsApiParameters');
		$this->assign('error','recharge');
		$this->display();
			
 			
 	}

 	public function jsApiCall($money,$string,$prod_name='在线充值')
 	{
 			Vendor(session('WeChat_pay').'.WxPayApi');
			Vendor(session('WeChat_pay').'.JsApiPay');

			//①、获取用户openid
			$tools = new \JsApiPay();
			$openId = $tools->GetOpenid();
			//②、统一下单
			$input = new \WxPayUnifiedOrder();
			$input->SetBody($prod_name);//设置商品或支付单简要描述 //产品名称
			$input->SetAttach($string);//设置附加数据，在查询API和支付通知中原样返回，该字段主要用于商户携带订单的自定义数据
			$input->SetOut_trade_no(\WxPayConfig::MCHID.date("YmdHis").rand(0000,9999));//设置商户系统内部的订单号,32个字符内、可包含字母, 其他说明见商户订单号
			$input->SetTotal_fee($money);//单位分设置订单总金额，只能为整数，详见支付金额
			$input->SetTime_start(time());//设置订单生成时间，格式为yyyyMMddHHmmss，如2009年12月25日9点10分10秒表示为20091225091010。其他详见时间规则
			$input->SetTime_expire(date("YmdHis", time() + 600));//设置订单失效时间，格式为yyyyMMddHHmmss，如2009年12月27日9点10分10秒表示为20091227091010。其他详见时间规则
			$input->SetGoods_tag("test");//设置商品标记，代金券或立减优惠功能的参数，说明详见代金券或立减优惠
			$input->SetNotify_url('http://'.$_SERVER['HTTP_HOST'].'/index.php/Home/Index/notify');//设置接收微信支付异步通知回调地址
			$input->SetTrade_type("JSAPI");//设置取值如下：JSAPI，NATIVE，APP，详细说明见参数规定
			$input->SetOpenid($openId);//设置trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识。下单前需要调用【网页授权获取用户信息】接口获取到用户的Openid。
			$order = \WxPayApi::unifiedOrder($input);
			//参数列表 供JS调用
			return $jsApiParameters = $tools->GetJsApiParameters($order);

 	}
	public function notify()
	{
		Vendor(session('WeChat_pay').'.PayNotifyCallBack');
		$notify = new \PayNotifyCallBack();
		$notify->Handle(false);
 	}



}