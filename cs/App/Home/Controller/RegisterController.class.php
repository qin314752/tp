<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller 
{
	
	public function code()
	{
		$code = rand(111111,999999);
		$phone = I('post.phone');
		session('home_code',$code);
		session('home_code_time',time()+600);
		$smstxt = FS('Dynamic/smstxt')['regsuccess'];
		$str = str_replace('#USERANEM#',$phone,$smstxt);
		$contenr = str_replace('#CODE#',$code,$str);
		if(!message($phone,$contenr)){
			alogs('index',5,$contenr,$phone,'indent_dologs');
		}

	}
	

	public function register()
	{
		$User = D('Register');
   		 if (!$User->create()){ 
       	 $this->error($User->getError(),U('login'));
     	 }else{ 
			$data = I();
			$data['user_coms_ip'] = get_client_ip(); 
			if(session('home_code_time')<time()){$this->error("验证码已过期",U('login'));}
			if($data['user_code']!=session('home_code')){$this->error('验证码错误',U('login'));}
     	 	$data['register_time']=time();
     	 	$data['user_password']=md5(md5($data['user_password']).md5($data['user_phone']));
     	 	unset($data['user_code']);
     	 	session('home_code',null);
     	 	session('home_code_time',null);
     	 	if(!M('consumer')->add($data)){
     	 	 alogs('index',1,'用户'.$data['user_phone'].'注册失败',$data['user_phone'],'adjustment_dologs');
     	 	 $this->error('注册失败请联系管理员',U('login'));
     	 	}
     	 	cookie('user_phone',$data['user_phone'],86400*90);
     	 	cookie('user_password',$data['user_password'],86400*90);
     	 	alogs('index',1,'用户'.$data['user_phone'].'注册成功',$data['user_phone'],'adjustment_dologs');
     	 	$this->redirect('/Home/Index/index');
     	 }		
		
	}
	public function login()
	{
		if(!session('WeChat_pay')){
			header("Content-Type: text/html;charset=utf-8"); 
			die(C('WEB_LOGIN'));
		}
		
		if(I()){
			$User = D('Login');
	   		 if (!$User->create()){ 
	       	 $this->error($User->getError(),U('login'));
	     	 }else{ 
				$data = I();
	     	 	$data['user_password']=md5(md5($data['user_password']).md5($data['user_phone']));
	     	 	if(!M('consumer')->where($data)->select()){
	     	 	 alogs('index',2,'用户'.$data['user_phone'].'登录失败',$data['user_phone'],'adjustment_dologs');
	     	 	 $this->error('账号或密码错误',U('login'));
	     	 	}
	     	 	cookie('user_phone',$data['user_phone'],86400*90);
	     	 	cookie('user_password',$data['user_password'],86400*90);
	     	 	alogs('index',2,'用户'.$data['user_phone'].'登录成功',$data['user_phone'],'adjustment_dologs');
	     	 	$this->redirect('/Home/Index/index');
	     	 }		
		}else{
			$carousel = M('carousel')->where('carousel_show=1 AND carousel_ststic=1 AND prod_brand='.session('WeChat'))->select();
			$this->assign('carousel',$carousel);
			$this->assign('home_img',1);
			$this->display();
		}
	}
	public function reset(){
		if(I('post.code')){
			if(session('home_code_time')<time()){echo "验证码已过期";die;}
			if(I('post.code')!=session('home_code')){echo '验证码错误';die;}
			if(M('consumer')->where('user_phone='.I('post.user_phone'))->find()){
				echo '正确';
			}else{
				echo '账号未注册';
			}
		}else{
			$this->display();
		}
	}

	public function up_password(){
		$data = I();
		$phone = "/^1[3-9]{1}[0-9]{9}$/";
		if(!preg_match($phone,$data['phone'])){echo '手机号不对';die;}
		if($data['password']!=$data['passwords']){echo '两次密码不一致';die;}
		$str = M('consumer')->where('user_phone='.$data['phone'])->setField('user_password',md5(md5($data['passwords']).md5($data['phone'])));
		if($str){
			echo '成功';
		}else{
			echo '修改失败';
		}

	}








}