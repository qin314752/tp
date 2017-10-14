<?php
namespace Admin\Controller;
class ProductController extends CommonController {
  //产品添加
    public function index(){
        $this->display();
    }
   //添加数据处理
   public function data()
   {
    $User = D('Product');
    if (!$User->create())$this->error($User->getError());
        $data = I();
        $data['prod_time'] = time();
        $data['prod_name'] = trim($data['prod_name']);
      if(isset($data['prod_name']{36}))$this->error('产品名称文字太长小于12字');
          if (time()<strtotime($data['prod_time_end'])&&$data['prod_activity']==1){
            $data['prod_time_end'] = strtotime($data['prod_time_end']);
          }else{
              if($data['prod_brand']==1){$name=C('NAME_T');}else{$name=C('NAME_K');}
           $period= M('period')->getField($name);
           $data['prod_time_end']=$time=$period*86400+time();
          }
          if(img_errors('prod_img')===true){
            if(img_type('prod_img')){
               $data['prod_img'] = str_replace(C('WEB_ROOT'),'',upload_img('prod_img','Product'))[0];
            }else{
             $this->error('上传格式不对 只支持pjpeg jpeg gif png 格式');
            }
          }else{
            $this->error(img_errors('prod_img'));
          }
          if(!$data['prod_part'])$this->error('针对部位 不能为空');
          $data['prod_part'] = implode('@',$data['prod_part']);
          if(M('product')->add($data)){
            alogs('Product',1,'添加'.$data['prod_name'].'产品成功');
            $this->success('添加'.$data['prod_name'].'产品成功',U('product_list'));
          }else{
             alogs('Product/data',1,'添加'.$data['prod_name'].'产品失败');
            $this->error('添加'.$data['prod_name'].'产品失败',U('product_list'));
          }
        
   }
   //产品列表
   public function product_list($pag=1)
   {
    $arr = I();
    if($arr['kind']=='kind'){
       $str = 'product_list?';
       if($arr['pag']){
       $pag = $arr['pag'];
        unset($arr['pag']);
       }
        foreach ($arr as $key => $value) {
        if($value||$value==='0'){
        $str .=$key.'='.$value.'&';
        }
        if($value==''){
          if($value==='0')continue;
          unset($arr[$key]);
        }
      }
      unset($arr['kind']);
      $str .='pag=';
      $data =paging('product',$arr,'id desc',$pag);
      $num = pags('product',$arr,$str,$pag);
      $this->assign('kind',$arr);
    }else{
      $str = 'product_list?pag=';
      $num = pags('product','',$str,$pag);
      $data = paging('product','','id desc',$pag);
    }
      $this->assign('product_pag',$num);
      $this->assign('product_list',$data);
      $this->display();
   }
   //产品修改
   public function update()
   {
    $data = M('product')->where('id='.I('id'))->select()[0];
    $data['prod_part'] = explode('@', $data['prod_part']);
    if($data['prod_time_end']){$data['prod_time_end']=date('Y-m-d H:i:s',$data['prod_time_end']);}else{unset($data['prod_time_end']);}
    $this->assign('prod_update',$data);
    $this->display();
   }
   //产品修改数据处理
   public function update_data(){
     $User = D('Product');
    if (!$User->create()){ 
        $this->error($User->getError());
      }else{     
          $data = I();
          if(!$data['prod_activity'])unset($data['prod_time_end']);
          if(img_errors('prod_img')===true){
            if(img_type('prod_img')){
               $data['prod_img'] = str_replace(C('WEB_ROOT'),'',upload_img('prod_img','Product'))[0];
            }else{
             $this->error('上传格式不对 只支持pjpeg jpeg gif png 格式');
            }
          }else{
            $this->error(img_errors('prod_img'));
          }
          upload_del($data['prod_img_old']);
          unset($data['prod_img_old']);
          $data['prod_time_end'] = strtotime($data['prod_time_end']);
          $data['prod_time'] = time();
          if(!$data['prod_part'])$this->error('针对部位 不能为空');
          $data['prod_part'] = implode('@',$data['prod_part']);
          if(M('product')->where('id='.$data['id'])->save($data)){
              alogs('Product',1,'修改'.$data['prod_name'].'产品成功');
              $this->success('修改'.$data['prod_name'].'产品成功',U('product_list'));
          }else{
             alogs('Product/data',1,'修改'.$data['prod_name'].'产品失败');
            $this->error('修改'.$data['prod_name'].'产品失败');
          }
    }
  }
   //产品修改上下线
  public function stastic(){
    $data['id']=I('post.id');
    I('post.stastic')==1? $data['prod_stastic']=0:$data['prod_stastic']=1;
    $sre= M('product')->save($data);
    $prod_name = M('product')->where('id='.$data['id'])->getField('prod_name');
      if($sre){
        alogs('Product',1,'下架'.$prod_name.'产品成功');
        echo true;
      }else{
        alogs('Product',1,'下架'.$prod_name.'产品失败');
        echo false;
      }
  }


 


  


}