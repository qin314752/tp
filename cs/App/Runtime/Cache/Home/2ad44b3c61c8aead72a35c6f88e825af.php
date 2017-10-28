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


<div class="give_color">
<div class="give_data">不使用红包  <div class="pay_color" ><div class="pay_color_w"  onclick="give_data(this,'','<?php echo $moneys;?>')"></div></div></div>
<span style="margin-left: 2%;font-size: 1rem;">有<?php echo ($num); ?>个红包可以使用</span>	
<?php  foreach ($give_data as $key => $value) {?>
<input type="hidden" name="give_id" value="<?php echo $value['id']?>">
			<div class='give_list' onclick="give_data(this,'<?php echo $value['id']?>','<?php echo $value['prod_give_money']?>','<?php if($money>=$value['prod_give_money']){echo $money-$value['prod_give_money'];}else{echo 0;}?>')">
				<div class="give_money">
					<div class="give_m">$<?php echo $value['prod_give_money']?></div>
					<div class="give_n">满任意金额可用</div>
				</div>
				<div class="give_name">&nbsp;&nbsp;&nbsp;会员专享</div>
				<div class="pay_color " style="margin-top: 2rem;" ><div class="pay_color_w"  ></div></div>
			</div>
<?php } ?>
</div>
<script type="text/javascript">
function give_data(obj,id,money,aggregate='',moneys=''){
	if(aggregate==''){
		var obj = $(obj);
		$('.pay_color_w').css('background-color','');
		obj.css('background-color','#50B34B');
		parent.document.getElementById("give_id").value = '';
		parent.document.getElementById("give_text").innerHTML='使用>';
		parent.document.getElementById("money").innerHTML=money;
	}else{
		var obj = $(obj);
		$('.pay_color_w').css('background-color','');
		obj.css('background-color','#50B34B');
		parent.document.getElementById("give_id").value = id;
		parent.document.getElementById("give_text").innerHTML='￥'+money+'>';
		parent.document.getElementById("money").innerHTML=aggregate;

	}
	var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
	parent.layer.close(index); //再执行关闭 
	
}
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