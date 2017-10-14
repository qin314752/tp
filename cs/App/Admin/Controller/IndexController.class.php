<?php
namespace Admin\Controller;
class IndexController extends CommonController {
    public function index(){
       $sql = "select name from zc_user_login as l left join zc_role_user as u on l.id=u.user_id and l.username='".session('adminname')."' left join zc_role as r on u.role_id=r.id;";
        $Model = M();
        $data = $Model->query($sql);
        foreach ($data as $key => $value) {
         if($value['name']){
             $arr = array_filter($value); 
         }
        }
     $str = residue();
    $this->assign('name',$arr['name']);
    $this->assign('str',$str);
    $this->display();
    }
  //清空缓存 
	public function cache(){
		$dirname = C('WEB_ROOT').'App/Runtime';
    dir_del($dirname);
    $this->success('已清除缓存');
  }

 //退出后台
	public function out()
	{
		if(!session(null)){
      $str = C('WAP_DOMAIN').'/index.php/'.MODULE_NAME.'/login';
      header("Location: http://$str");
      die;
		}

	}
  //意见反馈
  public function opinion()
  {
    if(I('get.opinion_static')){
     $str = M('opinion')->where('id='.I('get.id'))->setField('opinion_static','2');
    }
    $opinion = M();
    $data =$opinion->query(" select o.id,c.user_phone,o.opinion_centents,o.opinion_static,o.opinion_time from zc_opinion as o,zc_consumer as c where o.user_id=c.id order by opinion_static,id desc;)");
    $this->assign('opinion',$data);
    $this->display();
  }
  //系统通知
  public function inform(){
    $str = residue();
    if($str<500&&$str>200){
      $this->assign('contents','漫道短息条数小于500条，尽快充值');
    }else if($str<=200){
      $this->assign('contents','漫道短息条数小于200条，尽快充值');
    }else if($str>500){
      $this->assign('contents','暂无数据');
    }
    $this->display();
  }
  //资金统计
  public function capital(){
    if(I('post.kind')){
      $arr = I();
      unset($arr['kind']);
      $begin = strtotime($arr['time']);
      $end = strtotime($arr['time_end']);
      $indent_static = array('未消费'=>1,'已消费'=>2,'已过期'=>3,'已退单'=>4);
      foreach ($indent_static as $name => $static){
        if($static==1){
          $str = ' and reserve_time between '.$begin.' and '.$end;
         }else if($static==2){
          $str = ' and consume_time between '.$begin.' and '.$end;
         }else if($static==3){
          $str = ' and past_time between '.$begin.' and '.$end;
         }else if($static==4){
          $str = ' and refund_time between '.$begin.' and '.$end;
         }
           $data[$name] = $this->moneys($static,$str);
         }

    }else{
      $indent_static = array('未消费'=>1,'已消费'=>2,'已过期'=>3,'已退单'=>4);
      foreach ($indent_static as $name => $static) {
           $data[$name] = $this->moneys($static);
      }
    }
      $this->assign('data',$data);
      $this->assign('arr',$arr);
      $this->display();
  }
  public function moneys($static,$str){
    $address =  M('address')->where('address_static=1')->getField('id,address_name');
      $indent = M('indent');
      $money = array();
      foreach ($address  as $id => $name) {
          $data = $indent->where('address_id='.$id.' and indent_static='.$static.$str)->getField('cash_fee',true);
        if(!$data){
          $money[$name]=0;
        }else{
          if(is_array($data)){
              $str = 0;
              foreach ($data as $moneys) {
                $str+=$moneys; 
              }
            $money[$name]=$str;
          }
        }
        
      }
      return $money;
  }



}
