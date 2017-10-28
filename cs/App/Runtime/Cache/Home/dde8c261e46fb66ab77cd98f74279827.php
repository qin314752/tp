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


<div class="product_banne"><img src="/<?php echo ($particulars["prod_img"]); ?>"></div>
<div class="enshrine" onclick="enshrine(this)">
	<div>
		<span>收藏</span>
		<?php if($collect){?>
		<img id="img" src="/Public/Home/img/collect.png">
		<?php }else{?>
		<img id="img" src="/Public/Home/img/nocollect.png">
		<?php }?>
	</div>
</div>
<div class="details_list">
	<div class="details_title"><?php echo ($particulars["prod_name"]); ?></div>
	<div class="details_num">已有<?php echo ($particulars["prod_number"]); ?>人购买</div>
</div>
<div class="details_time"><p><?php echo ($particulars["prod_product_time"]); ?>分钟</p></div>
<div class="blank"></div>
<div class="details_all">
	<div class="details_service">服务内容
		<textarea id="editor1" type="text/plain" ><?php echo ($particulars["prod_service"]); ?></textarea>
	</div>	
	<div class="details_service">适用范围
		<textarea id="editor2" ><?php echo ($particulars["prod_range"]); ?></textarea>
	</div>
	<div class="details_img">针对部位
	<div>
		<?php echo ($particulars["prod_part"]); ?>
	</div>
	</div>
	<div class="details_service " >禁忌提示
	<textarea id="editor" type="text/plain" style="width: 100%"><?php echo ($particulars["prod_taboo"]); ?></textarea>
	</div>
	<div class="modal fade " id="myModal" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" -style="display: none;" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
	        <button onclick="checkit();" style="border:1px solid red;border-radius: 0.3rem;background-color: #DC1540;color:#fff;width: 4rem;float: left;font-size: 1.6rem;" >预定</button>
	    	<div class="addres" >请选择消费门店 </div>
	     	<div class="address">
	     		<span class="laydate-icon" id='clickme' style="display:none;width: 100%;margin-top: 0.2rem;" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" ></span>
	     	</div>
	     	<div class="address" >
	    		 <?php  foreach ($address as $key => $value) {?>
	     		<div onclick="abc(this)" val="<?php echo $value['id'];?>"><?php echo $value['address_name'];?><img src="/Public/Home/img/select.png"></div>
	     		<?php }?>
	     	</div> 

	      </div>
	    
	    </div>
	  </div>
	</div>
	<div class="details_bottom">
		<div class="details_money_list">
			<div class="details_money"><p><?php echo ($particulars["prod_money"]); ?></p></div>
			<div class="details_moneybid">门市价:￥<p><?php echo ($particulars["prod_money_bid"]); ?></p></div>
		</div>
		<button class="details_payment" onclick="alter()">立即购买</button>
		
	</div>
</div>
<form id="jsApi" action="/index.php/Home/Index/product" method="get">
	<input type="hidden" name="prod_brand" value="<?php echo ($prod_brand); ?>">
	<input type="hidden" name="address_id" value="">
	<input type="hidden" name="product_id" value="<?php echo ($particulars["id"]); ?>">
	<input type="hidden" name="reserve_time" value="">
</form>

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
	function submit(){
	if($('#clickme').text())$('[name=reserve_time]').val($('#clickme').text());
	$('#jsApi').submit();

}
    UE.getEditor('editor');
    UE.getEditor('editor1');
    UE.getEditor('editor2');
    function checkit(){
	var str =1;
	var obj = $('.laydate-icon');
 if(str){
	obj.css('display','block');
	document.getElementById("clickme").click();
	str = 0;
 }
}
// 收藏
function enshrine(){
	var srcs = $('#img').attr('src');
	var id = $('[name=product_id]').val();
	if(srcs == '/Public/Home/img/nocollect.png'){
		 $.post("/index.php/Home/Index/collect",{product_id:id,ststic:1},function(data){
		 	if(data=='成功'){
		 	$('#img').attr('src','/Public/Home/img/collect.png');
		 		layer.msg('添加收藏',{icon: 1});
		 	}
		 });
	}else{
		 $.post("/index.php/Home/Index/collect",{product_id:id,ststic:0},function(data){
		 	if(data=='成功'){
			$('#img').attr('src','/Public/Home/img/nocollect.png');
		 		layer.msg('取消收藏', {icon: 1});
		 	}
		 });
	}
}

</script>