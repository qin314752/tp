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


<div class="recharge" >
	<form action="/index.php/Home/Index/recharge_money" method="get">
		<div class="recharge_money">
			<div>充值金额</div>
			<div class="money_img"><div>￥</div><input type="text" name="money" value=""><hr></div>
			<button>充&nbsp;&nbsp;&nbsp;值</button>
		</div>	
	</form>
		<div class="recharge_explain">
				<div>说明：</div>
				<?php foreach ($members as $key => $value) {if($value['id']!=5){?>
				<div><?php echo $key?>.一次充值满<?php echo $value['members_money']?>元，即可成为<?php echo $value['members_name']?>享受<?php echo ($value['members_discount'])/10;?>折优惠</div>
				<?php }}?>

		</div>
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