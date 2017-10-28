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



	<div id="consume_list">
		<div class="consume_title">
		 <div id="con_left"  class="color" onclick="con_click(this)">充值&nbsp;&nbsp;<div></div></div>
		 <div id="con_right" class="color" onclick="con_click(this)">&nbsp;&nbsp;消费</div> 
		</div>
<div class="displays con_left" >

<?php if(!$recharge){?> <div class="product_more con_left"><img src="/Public/Home/img/recharge.jpg"></div><?php }else{foreach ($recharge as $key => $value) {?>

		<div class="consume_money"  >
			<div class="consume_left">
				<div class="consume_top">充值</div>
				<div class="consume_time"><?php echo date('Y/m/d H:i:s',$value['time_end']);?></div>
			</div>
			<div class="consume_but">+<?php echo $value['cash_fee'];?>元</div>
		</div>
<?php }}?>
</div>
<div class="displays con_right" style="display: none">
<?php if(!$indent){?> <div class="product_more "><img src="/Public/Home/img/indent.jpg"></div><?php }else{ foreach ($indent as $key => $value) {?>
		<div -class="consume_money" >
			<div class="consume_left">
				<div class="consume_top">消费</div>
				<div class="consume_time"><?php echo date('Y/m/d H:i:s',$value['time_end']);?></div>
			</div>
			<div class="consume_but">-<?php echo $value['cash_fee'];?>元</div>
		</div>
		
<?php }}?>
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
	$(function(){
		$('#con_left').css('color','#CE1D3E');
		$('#con_left').css('border-bottom','1px solid #CE1D3E');
	});
		function con_click(obj){
		var obj = $(obj);
		var id = obj.attr('id');
		$('.displays').css('display','none');
		$('.'+id).css('display','block');
		$('.color').css('color','');
		$('.color').css('border-bottom','');
		$('#'+id).css('color','#CE1D3E');
		$('#'+id).css('border-bottom','1px solid #CE1D3E');
	}
</script>