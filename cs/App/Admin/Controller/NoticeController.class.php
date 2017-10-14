<?php
namespace Admin\Controller;
use Org\Util\Mail;
class NoticeController extends CommonController {
  //短信
    public function index(){
      if(I()){
        $arr = I();
        FS('note',$arr,'Dynamic/');
      }
       $note = FS('Dynamic/note');
       $mandao  = residue();
       // $yimei = getBalance();
       $yimei = '0'; //亿美软通短信提供商 暂无数据   
       $this->assign('note',$note);
       $this->assign('mandao',$mandao);
       $this->assign('yimei',$yimei);
       $this->display();
    }
    //短信模板    
    public function template()
    {
       $emailtxt = FS('Dynamic/emailtxt');
      $smstxt = FS('Dynamic/smstxt');
      $this->assign('emailtxt',$emailtxt);
      $this->assign('smstxt',$smstxt);
      $this->display();
    }
 //短信模板-修改
    public function template_data()
    {
      $add = I();
      $email = array('email_regsuccess'=>$add['email_regsuccess'],'email_safecode'=>$add['email_safecode'],'email_changephone'=>$add['email_changephone'],'email_getpass'=>$add['email_getpass'],'email_getpaypass'=>$add['email_getpaypass'],);
      unset($add['email_regsuccess'],$add['email_safecode'],$add['email_changephone'],$add['email_getpass'],$add['email_getpaypass']);
      FS('emailtxt',$email,'Dynamic/');
      FS('smstxt',$add,'Dynamic/');
      $this->redirect('template');
    }
    //微信支付配置
    public function wappay(){
      $data = FS('Dynamic/wappay');
      $this->assign('wx_pay',$data);
      $this->display();
    }

    //微信支付配置-修改
    public function wappay_data(){
      $arr = I();
      $data =  FS('wappay',$arr,'Dynamic/');
      $this->redirect('wappay');
    }
     //短信-发送记录
    public function phone($pag=1){
      $str = 'phone?pag=';
      $data = paging('indent_dologs','tid=1 or tid=2 or tid=5','id desc',$pag);
      $num = pags('indent_dologs','tid=1 or tid=2 or tid=5',$str,$pag);
      $this->assign('data',$data);
      $this->assign('phone_num',$num);
      $this->display();
    }




















}


?>
