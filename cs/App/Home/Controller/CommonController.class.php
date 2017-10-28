<?php
namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller 
{
    public function _initialize()
	{  
      
		if(!is_mobile())die;
		if(I('get.WeChat')=='tianshu'){
			session('WeChat',1);
			session('WeChat_pay','tianshu');
		}else if(I('get.WeChat')=='kangyun'){
			session('WeChat',2);
			session('WeChat_pay','kangyun');
		}

		if(!session('WeChat_pay')){
			header("Content-Type: text/html;charset=utf-8"); 
			die(C('WEB_LOGIN'));
		}
		$user_phone = cookie('user_phone');
		$user_password = cookie('user_password');
		$data=array();
		$data['user_phone'] = $user_phone;
		$data['user_password'] = $user_password;
		$str = M('consumer')->where($data)->getField('id');
		if($str){
			session('user_phone',$user_phone);
			session('user_password',$user_password);
			session('user_list',$str);
			if(session('Out_trade_no')){
				if(M('indent')->where('out_trade_no='.session('Out_trade_no'))->find()||M('recharge')->where('out_trade_no='.session('Out_trade_no'))->find()){
					 session('Out_trade_no',null);
				}else{
					orderquery();
				}
			}
		}else{
			cookie('user_phone',null); 
			cookie('user_password',null); 
			cookie(null); 
			session('user_phone',null);
			session('user_password',null);
			session('user_list',null);
			$this->redirect('Home/Register/login');
		}
	}
}