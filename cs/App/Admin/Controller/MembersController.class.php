<?php
namespace Admin\Controller;
class MembersController extends CommonController {
  //会员等级管理
   public function level()
   {
   	$data = M('members')->select();
   	$this->assign('data',$data);
   	$this->display();
   }
  //会员等级管理-添加
   public function members()
   {
    $User = D('Members');
    if (!$User->create()) $this->error($User->getError());
    $data = I();
    // var_dump($data); 
    $str = M('members')->data($data)->filter('strip_tags')->add();
    // var_dump($str); 
    if($str){
       alogs('Members',7,'添加'.$data['members_name'].'会员成功');
    }else{
       alogs('Members',7,'添加'.$data['members_name'].'会员失败');
       $this->error('添加失败');
    }
    $this->redirect('level');
   }
  //会员等级管理-删除
   public function members_del()
   {
      $data = I();
        if($data['id']==5)$this->error('普通会员禁止删除');
      if(M('members')->where($data)->delete()){
         alogs('Members',7,'删除'.$data['members_name'].'会员成功');
      }else{
         alogs('Members',7,'删除'.$data['members_name'].'会员失败');
         $this->error('删除失败');
      }
      $this->redirect('level');
   }
  //会员等级管理-修改
  public function upmembers()
   {
	$User = D('Members');
    if (!$User->create()) $this->error($User->getError());

   	$data = I();
      if($data['id']==5)$this->error('普通会员禁止修改');
   	$str = M('members')->where('id='.$data['id'])->filter('strip_tags')->save($data);
   	if($str){
   		 alogs('Members',7,'修改'.$data['members_name'].'会员成功');
   	}else{
   		 alogs('Members',7,'修改'.$data['members_name'].'会员失败');
   		 $this->error('修改失败');
   	}
   	$this->redirect('level');
   }
   //会员列表
   public function user_list($pag=1)
   {
      $members =  M('members');
    if(I('post.user_phone')){
     $data[0] = M('consumer')->where('user_phone='.trim(I('post.user_phone')))->find();
        $data[0]['members_id'] = $members->where('id='.$data[0]['members_id'])->getField('members_name');
        $data[0]['user_coms_ip'] = ip2area($data[0]['user_coms_ip']);
        $data[0]['register_time'] = date('Y-m-d H:i:s',$data[0]['register_time']);
    }else{
      $data = paging('consumer','','id desc',$pag);
      $str = 'user_list?pag=';
      $num = pags('consumer','',$str,$pag);
      foreach ($data as $key => $value) {
        $data[$key]['members_id'] = $members->where('id='.$value['members_id'])->getField('members_name');
        $data[$key]['user_coms_ip'] = ip2area($value['user_coms_ip']);
        $data[$key]['register_time'] = date('Y-m-d H:i:s',$value['register_time']);
      }
      $this->assign('consumer_num',$num);
    }
      $this->assign('consumer',$data);
      $this->display();
   }
   public function user_money(){
    $this->assign('id',I('get.id'));
    $this->display();
   }
   //会员列表-资金变动
   public function user_upmoney(){
      $data = I();
      if(!$data['id']){echo 'ID数据丢失';die;}
      if(!$data['money_cause']){echo '变动原因未填写';die;}
      if(!$data['user_money']){echo '可用余额未填写';die;}
      $patterns = "/^([-]|[+]){1}[0-9]+(\.[0-9]{1,2}){0,1}$/";
      if(!preg_match($patterns,$data['user_money'])){echo '可用余额格式不对';die;}

      $consumer= M('consumer');
      $consumer->startTrans();
      $user_money = $consumer->where('id='.$data['id'])->find();
      $money = array();
      if(substr($data['user_money'], 0,1)=='+'){
        $money['user_money'] = $user_money['user_money']+substr($data['user_money'],1);
        $money['money_amount'] = $user_money['money_amount']+substr($data['user_money'],1);
      }else{
        if($user_money['user_money']-substr($data['user_money'],1)<0)$this->error('余额不足');
        if($user_money['money_amount']-substr($data['user_money'],1)<0)$this->error('总金额额不足');
        $money['user_money'] = $user_money['user_money']-substr($data['user_money'],1);
        $money['money_amount'] = $user_money['money_amount']-substr($data['user_money'],1);
      }
        $string =  alogs('user_upmoney',3,'调整'.$user_money['user_phone'].'用户金额'.$data['user_money'].'元，变动原因 '.$data['money_cause'],'','indent_dologs');
        $result=$consumer->where('id='.$data['id'])->data($money)->save();
      if($result&&$string){
          $consumer->commit();//成功则提交
          echo '成功';
      }else{
          $consumer->rollback();//不成功，则回滚
          echo '修改失败';
      }
   }
   //资金变动日志
   public function money_dos(){
    $url = 'money_dos?pag=';
    // $data = M('indent_dologs')->where('tid=2 or tid=3')->select();
    $data = pagings('indent_dologs','tid=2 or tid=3 ','id desc',$url);
    $this->assign('data',$data['data']);
    $this->assign('money_dos',$data['num']);
    $this->display();
   }





















}