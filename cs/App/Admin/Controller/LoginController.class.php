<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;
class LoginController extends Controller {
    public function index(){
        $this->display();
    }
    public  function verify_code()
    {
    	$Verify = new \Think\Verify();
    	$Verify->fontSize = 18;
    	$Verify->length   = 4;
    	$Verify->imageH  = 40;
    	$Verify->imageW  = 130;
      $Verify->codeSet = '0123456789';
      $Verify->useCurve = false;
    	$Verify->useNoise = false;
    	$Verify->entry();
    }

    public function check_verify($code)
    {
       $verify = new \Think\Verify(); 
       return $verify->check($code);

    }
  
    

    public function login()
    {
      $add = I();
      $User1 = D("Login"); 
      if (!$User1->create())$this->error($User1->getError());
       
              $code = A('Login');
              if($code->check_verify($add['verify_code']) == true){
                $data = array();
                $data['username'] =$add['username'];
                $data['password'] = md5($add['password']);
                $user=M('user_login')->where($data)->find();
                if($user){
                  if(!M('user_login')->where('status=1')->find())$this->error('账号已停止使用，请联系管理员');
                  session(null); 
                  session('adminname',$user['username']);
                  session(C('USER_AUTH_KEY'),$user['id']);
                  if($user['username'] ==C('RBAC_SUPERADMIN')){
                    session(C('ADMIN_AUTH_KEY'),true);
                  }
                  Rbac::saveAccessList();
                  alogs('Login',2,$user['username'].'登陆后台成功');
                 $this->success('登录成功，现在转向管理主页',U('Index/index'));
                }else{
                $this->error('填写正确用户名或密码');
                }
              }else{
                $this->error('验证码错误');
              }
        
      
    }








}