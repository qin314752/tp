<?php
namespace Admin\Controller;

/**
 * EmptyController
 * 空控制器
 */
use Think\Controller;

class EmptyController extends Controller 
{
    public function index()
    {
        echo '空的控制器';
    }
     public function _empty(){ 
     // 定义空操作（_empty）方法
      echo '<script type="text/javascript" src="http://www.qq.com/404/search_children.js" charset="utf-8" homePageUrl="你自己的主页" homePageName="回到我的主页"></script>'; // 这里使用腾讯公益的一个js做404页面
	}
}
?>