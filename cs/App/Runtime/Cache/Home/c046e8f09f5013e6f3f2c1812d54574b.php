<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN" style="font-size: 10px;">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<meta id="scale" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no,minimum-scale=1.0, maximum-scale=1.0">
	<title ><?php echo explode('#',FS('web_set/web')['wap_title'])[session('WeChat')-1]?></title>
	<script src="/Public/Home/js/jquery-3.2.1.min.js"></script>
	<link href="/Public/Home/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="/Public/Home/bootstrap/js/bootstrap.min.js"></script>

	<!-- layer弹框包 -->
	<script type="text/javascript" src="/Public/Admin/layer/layer.js"></script>


	<!-- 前台样式 -->
	<link rel="stylesheet" href="/Public/Home/css/home.css">
    <script src="/Public/Home/js/home.js"></script>
	<link rel="stylesheet" href="/Public/Home/css/money.css">

	<script src="/Public/Home/js/zepto.min.js"></script>
    <script src="/Public/Home/js/swiper-3.4.2.min.js"></script>
	<link rel="stylesheet" href="/Public/Home/css/swiper-3.4.2.min.css">

	<script src="/Public/time/laydate/laydate.js"></script>

 	<script type="text/javascript" charset="utf-8" src="/Public/Home/ditor/ueditor.config.js"></script>
 	<script type="text/javascript" charset="utf-8" src="/Public/Home/ditor/ueditor.all.js"> </script>
 	<script type="text/javascript" charset="utf-8" src="/Public/Home/ditor/lang/zh-cn/zh-cn.js"></script>
 	<!-- pay -->
	<link rel="stylesheet" href="/Public/pay/pay.css">
<script src="/Public/pay/jquery-validate.js" type="text/javascript"></script>


</head>
<body >


<form action="/index.php/Home/Index/find" method="post" id="seek_form">
 <div class="seek">
      <input type="text" name="prod_name" value=""><div onclick="sub()"></div>
  </div>
</form>

	<div class="swiper-container">
        <div class="swiper-wrapper">
        <?php foreach ($carousel as $key => $value) {?>
            <div class="swiper-slide"><a href="javascript:;" onclick="javascript:location.href='/index.php/Home/Index/particulars?id=<?php echo $value['prod_id']; ?>&lun=true'">
            <img src="/<?php  echo $value['carousel_img'];?>"></a></div>
           <?php }?>
        </div>
    <div class="swiper-pagination"></div>
  </div>
   <div class="brand_menu">
        <div><img  class="halving" src="/Public/Home/img/halving.png"><a href="/index.php/Home/Index/inquire?prod_kind=6"><img src="/Public/Home/img/youhui.png"></a></div>
        <div><img  class="halving" src="/Public/Home/img/halving.png"><a href="/index.php/Home/Index/inquire?prod_kind=1"><img src="/Public/Home/img/sparex.png"></a></div>
        <div><img  class="halving" src="/Public/Home/img/halving.png"><a href="/index.php/Home/Index/inquire?prod_kind=0"><img src="/Public/Home/img/spa.jpg"></a></div>
        <div><img  class="halving" src="/Public/Home/img/halving.png"><a href="/index.php/Home/Index/inquire?prod_kind=7"><img src="/Public/Home/img/group.png"></a></div>
        <!-- <div><img  class="halving" src="/Public/Home/img/halving.png"><a href="/index.php/Home/Index/inquire?prod_kind=4"><img src="/Public/Home/img/spa.png"></a></div> -->
        <!-- <div><img  class="halving" src="/Public/Home/img/halving.png"><a href="/index.php/Home/Index/inquire?prod_kind=5"><img src="/Public/Home/img/Medicine.png"></a></div> -->
   </div>

<div class="button_menu">
   		<div class="menu_list"  onclick="javascript:location.href='/index.php/Home/Index/index'">
	   			<div class="menu_img">
	   				<img src="/Public/Home/img/home_1<?php echo $home_img==1?'s':''; ?>.png">
	   			</div>
   		</div>
		<div class="menu_list"  onclick="javascript:location.href='/index.php/Home/Index/collect'">
	   			<div class="menu_img"">
	   				<img src="/Public/Home/img/home_2<?php echo $home_img==2?'s':''; ?>.png">
	   			</div>
   		</div>
		<div class="menu_list" onclick="javascript:location.href='/index.php/Home/Index/shopping'">
	   			<div class="menu_img">
	   				<img src="/Public/Home/img/home_3<?php echo $home_img==3?'s':''; ?>.png">
	   			</div>
   		</div>
		<div class="menu_list" onclick="javascript:location.href='/index.php/Home/Index/userlist'">
	   			<div class="menu_img">
	   				<img src="/Public/Home/img/home_4<?php echo $home_img==4?'s':''; ?>.png">
	   			</div>
   		</div>
</div>
</body>
</html>


<script>        
  var mySwiper = new Swiper ('.swiper-container', {
    direction: 'horizontal',
	  autoplay: 2000,
    loop: true,
    pagination: '.swiper-pagination',
  })  

function sub(){
  if($('[name=prod_name]').val()){
      $('#seek_form').submit();
  }
}      
</script>