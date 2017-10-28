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


<div class="home_information" >
	<div class="home_user_list">
		<div class="home_user_img"><img src="/Public/Home/img/user-img.jpg"></div>
		<div class="user_information">
			<div>账号 <?php echo ($data["user_phone"]); ?></div>
			<div>等级 <?php echo ($members_name); ?></div>
		</div>
	</div>
	<div class="home_user_money">
		<div class="user_money">
			<div class="money" ><div>余额&nbsp;<?php echo ($data["user_money"]); ?> 元</div></div>
			<div class="renminbi"><div></div></div>
		</div>
		<div class="user_recharge" onclick="javascript:location.href='/index.php/Home/Index/recharge'">
			<div>会员充值</div>
		</div>
	</div>
	<div class="home_list">
		<div class="consume" onclick="javascript:location.href='/index.php/Home/Index/consume_list'"  ><img src="/Public/Home/img/consume.png">充值记录<div></div></div>
		<div class="consume" onclick="opinion()" ><img src="/Public/Home/img/opinion.png">意见反馈 <div></div></div>
	</div>
</div>
	<div id="opinion" style="display: none" >
			<textarea placeholder="请书写您的意见" name="opinion_centents"></textarea>
			<button type="submit">提交</button>
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


<script type="text/javascript">
	$('#opinion button').click(function(){
			var centents = $('[name=opinion_centents]').val();
			if(centents){
				$.post('/index.php/Home/Index/opinion',{opinion_centents:centents},function(data){
				 	if(data=='成功'){
				 		$('[name=opinion_centents]').attr('readonly','readonly');
				 		layer.msg('提交成功',{icon: 1});
				   		$('[name=opinion_centents]').val('');
				 	}
				});
			}
	});

</script>
<script type="text/javascript">
$(function() {
　　if (window.history && window.history.pushState) {
　　$(window).on('popstate', function () {
　　window.history.pushState('forward', null, '#');
　　window.history.forward(1);
　　});
　　}
　　window.history.pushState('forward', null, '#'); //在IE中必须得有这两行
　　window.history.forward(1);
　　})
</script>