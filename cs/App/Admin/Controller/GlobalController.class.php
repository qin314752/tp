<?php
namespace Admin\Controller;
class GlobalController extends CommonController {
    //网站基本设置
    public function websetting(){
        if(I()){
            FS('web',I(),'web_set/');
            if(!mapping('App/Common/Conf/','1')){
                $this->error('修改失败');
                alogs('Global',5,'修改 网站配置 信息失败');
            }
            alogs('Global',5,'修改 网站配置 信息成功');
        }
            $data = FS('web_set/web');
            $this->assign('note',$data);
            $this->display();
    }
    //地址列表
    public function address(){
        $data = M('address')->where('address_static=1')->select();
        $this-> assign('address',$data);
        $this->display();
    }
    //地址-添加
    public function add_address(){
    	$arr = array(
                array("prod_brand","require","产品地址不能为空",0),
                array("address_name","require","店面名称不能为空",0),
                array('address_name','','店面名称已经存在！',0,'unique',1),
                array("address_phone","require","客服电话不能为空",0),
                array("address","require","地址不能为空",0),
            );
    	$address = D('Project');
        if(!$address->validate($arr)->create()){
        	$this->error($address->getError());

        }
        $data = I();
        // var_dump($data);
        if(!M('address')->add($data)){
        	alogs('Global',5,'添加 '.$data['address_name'].' 地址信息失败');
        	$this->error('数据添加失败');
		}
        	alogs('Global',5,'添加 '.$data['address_name'].' 地址信息成功');
        $this->redirect('Global/address');
    }

    //地址-作废
    public function carousel_del(){
        $data = I();
       if(!M('address')->save($data)){
            alogs('Global',5,'作废 '.$data['address_name'].' 地址信息失败');
            $this->error('数据作废失败');
        }
            alogs('Global',5,'作废 '.$data['address_name'].' 地址信息成功');
        $this->redirect('Global/address');
    }
    //地址-修改
    public function save_address()
    {
    	$data = I();
        $arr = array(
                array("address_name","require","店面名称不能为空",0),
                array("prod_brand","require","产品地址不能为空",0),
                array("address_phone","require","客服电话不能为空",0),
                array("address","require","地址不能为空",0),
            );
        $address = D('Project');
        if(!$address->validate($arr)->create()){
            $this->error($address->getError());

        }
    	if(!M('address')->save($data)){
    	   alogs('Global',5,'修改 '.$data['address_name'].' 地址信息失败');
            $this->error('数据修改失败');
        }
        alogs('Global',5,'修改 '.$data['address_name'].' 地址信息成功');
        $this->redirect('Global/address');
    }
    //管理员操作日志
    public function adminlog($pag=1){
        $str = 'adminlog?pag=';
        $data = pagings('auser_dologs','','id desc',$str,$pag);
        $this->assign('admin_log',$data['data']);
    	$this->assign('adminlog_num',$data['num']);
    	$this->display();
    }

   
    //产品有效期
    public function period(){
        if(I()){
            $data = I();
            $pattern = "/^[0-9]+$/";
            // var_dump($data);
            if(preg_match($pattern,$data['tianshu'])&&preg_match($pattern,$data['kangyun'])){
                $string = inquire_name('period','',$data,'save');
                if(!$string)$this->error('数据添加失败');
                $this->redirect('period');
            }else{
                $this->error('填入数据必须为整数');
            }
        }else{
            $period = inquire_name('period','','','select')[0];
            $this->assign('period',$period);
            $this->display();
        }
    }


}