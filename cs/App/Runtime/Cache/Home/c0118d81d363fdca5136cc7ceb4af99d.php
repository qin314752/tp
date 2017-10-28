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


<div class="shopping">
	<div class="shopping_top">
		<div id="all" style="color:#FF4401;border-bottom:2px solid #FF4401" onclick="nav(this)">全部 <span></span></div>
		<div id="nconsume" onclick="nav(this)">未消费 <span></span></div>
		<div id="yconsume" onclick="nav(this)">已消费 <span></span></div>
		<div id="past" onclick="nav(this)">已过期</div>
    </div>
    <?php if(!$data){?> <div class="product_more"><img src="/Public/Home/img/order.jpg"></div><?php }else{?>
	<div class="shopping_list">
	<?php foreach ($data as $key => $value) { ?>
		<?php if($value['indent_static']<=3){?>
		<div class="aa all">
		<div class="shopping_div" style="background-image: url('/Public/Home/img/<?php if($value['indent_static']==2){echo 'spent.jpg';}else if($value['indent_static']==3){echo 'past_img.jpg';}?>')">
			<div class='shopping_title'><?php echo $value['out_trade_no']?> <span><?php echo $value['address_phone']?></span></div>
			<div class="shopping_border">
				<div class='shopping_left'>
					<div class="shopping_name"><?php echo $value['prod_name'];?></div>
					<div class="shopping_time"><?php echo$value['prod_product_time'].'分钟 | '.prod_part($value['prod_part']);?></div>
					<div class="end_time"><p>有效期 <?php echo date('Y/m/d H:i:s',$value['reserve_time']);?></p></div>
				</div>
				<div class='shopping_right'>
					<div  class="shopping_img"><span><?php echo $value['cash_fee']?></span><div></div></div>
					<div class="shopping_endimg"><?php echo $value['nonce_str']?></div>
				</div>
		    </div>
			<div class="shopping_address"><p>地址：<?php echo $value['address']?></p></div>
		</div>
		</div>
		<?php }?>
		<div <?php if($value['indent_static']==1){echo 'class="aa nconsume"';}elseif($value['indent_static']==2){echo 'class="aa yconsume"';}elseif($value['indent_static']==3){echo 'class="aa past"';} ?> style="display: none;">
		<div class="shopping_div" style="background-image: url('/Public/Home/img/<?php if($value['indent_static']==2){echo 'spent.jpg';}else if($value['indent_static']==3){echo 'past_img.jpg';}?>')">
			<div class='shopping_title'><?php echo $value['out_trade_no']?> <span><?php echo $value['address_phone']?></span></div>
			<div class="shopping_border">
				<div class='shopping_left'>
					<div class="shopping_name"><?php echo $value['prod_name'];?></div>
					<div class="shopping_time"><?php echo$value['prod_product_time'].'分钟 | '.prod_part($value['prod_part']);?></div>
					<div class="end_time"><p>有效期 <?php echo date('Y/m/d H:i:s',$value['reserve_time']);?></p></div>
				</div>
				<div class='shopping_right'>
					<div  class="shopping_img"><span><?php echo $value['cash_fee']?></span><div></div></div>
					<div class="shopping_endimg"><?php echo $value['nonce_str']?></div>
				</div>
		    </div>
			<div class="shopping_address"><p>地址：<?php echo $value['address']?></p></div>
		</div>
		</div>

	<?php }?>
</div>
</div>
<script type="text/javascript">
	function nav(obj){
		var obj = $(obj);
		var id = obj.attr('id');
		$('.aa').css('display','none');
		$('.'+id).css('display','block');
		$('.shopping_top div').css('border-bottom','1px solid #E8E8E8');
		$('#'+id).css('border-bottom','2px solid #FF4401');
		$('.shopping_top div').css('color','');
		$('#'+id).css('color','#FF4401');
	}
</script>
<?php }?>

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