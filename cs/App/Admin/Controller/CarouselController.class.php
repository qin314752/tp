<?php
namespace Admin\Controller;
class CarouselController extends CommonController {
    //轮播 广告
    public function advertising()
    {
    	$data = M('product')->where('prod_stastic=1')->getField('id,prod_name,prod_brand');
        $this->assign('data',$data);
        $datas = M('carousel');
        $carousel =$datas->where('carousel_ststic=1')->select();
    	$advertising =$datas->where('carousel_ststic=2')->select();
        $this->assign('carousel',$carousel);
    	$this->assign('advertising',$advertising);
        $this->display();
    }
    //添加
    public function add_advertising()
    {
        if(img_errors('advertising')===true){
            if(img_type('advertising')){
               $Carousel = str_replace(C('WEB_ROOT'),'',upload_img('advertising','Product'))[0];
            }else{
             $this->error('上传格式不对 只支持pjpeg jpg jpeg gif png 格式');
            }
        }else{
            $this->error(img_errors('advertising'));
        }
        if(I()['carousel_ststic']==1){
            if(!I('post.prod_id'))$this->error('产品未选择');
            $arr = explode('#', I('post.prod_id'));
        	$data['prod_id'] = $arr[0];
            $data['carousel_name'] = $arr[1];
        	$data['prod_brand'] = $arr[2];
        	$data['carousel_img']=$Carousel;
            $data['carousel_time']=time();
        	$data['carousel_ststic']=1;
        	$data['carousel_ip'] = get_client_ip();
        	if(!M('carousel')->add($data)){
        		alogs('Carousel',4,'添加ID'.$data['prod_brand'].'号轮播产品失败');
        		$this->error('数据添加失败');
        	}else{
        		alogs('Carousel',4,'添加ID'.$data['prod_brand'].'号轮播产品成功');
        		$this->redirect('Carousel/advertising');
            }
        }else if(I()['carousel_ststic']==2){
            if(!I('post.prod_brand'))$this->error('产品未选择');
            $data['prod_id'] = 00;
            $data['carousel_name'] = 00;
            $data['prod_brand'] = I()['prod_brand'];
            $data['carousel_img']=$Carousel;
            $data['carousel_time']=time();
            $data['carousel_ststic']=2;
            $data['carousel_ip'] = get_client_ip();
            $carousel = M('carousel');  
            $arr = array('carousel_show'=>0);
            $carousel->where('carousel_ststic=2')->save($arr); 
            if(!$carousel->add($data)){
                alogs('Carousel',4,'添加广告图片失败');
                $this->error('数据添加失败');
            }else{
                alogs('Carousel',4,'添加广告图片成功');
                $this->redirect('Carousel/advertising');
            }
            
        }else{
            $this->error('非法参数');
        }

    }
    //删除
    public function carousel_del()
    {
        $data = M('carousel')->where('id='.I('get.id'))->find();
        if($data['carousel_ststic']==2&&$data['carousel_show']==1)$this->error('显示的广告 不能删除');
    	if(!M('carousel')->where('id='.I('get.id'))->delete()){
    		alogs('Carousel',4,'删除ID'.I('get.id').'号广告产品失败');
    		$this->error('删除失败');
    	}
    		upload_del(I('get.img'));
    		alogs('Carousel',4,'删除ID'.I('get.id').'号广告产品失败');
    		$this->redirect('Carousel/advertising');
    }
    //显示/隐藏
    public function carousel_ststic(){
        $data = I();
        if($data['carousel_ststic']==1){
            if(!M('carousel')->save($data)){echo '失败。联系编程人员';die;}
        }else if($data['carousel_ststic']==2){
            $arr = array('carousel_show'=>0);
            $carousel_show = array('carousel_show'=>1);
           if(!M('carousel')->where('carousel_ststic=2')->save($arr)){echo '失败。联系编程人员';die;}
           if(!M('carousel')->where('id='.$data['id'])->save($carousel_show)){echo '失败。联系编程人员';die;}
        }else{
            echo '失败。联系编程人员修补bug';
            die;
        }
        echo '成功';
    }






}
