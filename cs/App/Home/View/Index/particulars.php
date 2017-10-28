<include file="Common:head" />
<div class="product_banne"><img src="/{$particulars.prod_img}"></div>
<div class="enshrine" onclick="enshrine(this)">
	<div>
		<span>收藏</span>
		<?php if($collect){?>
		<img id="img" src="__PUBLIC__/Home/img/collect.png">
		<?php }else{?>
		<img id="img" src="__PUBLIC__/Home/img/nocollect.png">
		<?php }?>
	</div>
</div>
<div class="details_list">
	<div class="details_title">{$particulars.prod_name}</div>
	<div class="details_num">已有{$particulars.prod_number}人购买</div>
</div>
<div class="details_time"><p>{$particulars.prod_product_time}分钟</p></div>
<div class="blank"></div>
<div class="details_all">
	<div class="details_service">服务内容
		<textarea id="editor1" type="text/plain" >{$particulars.prod_service}</textarea>
	</div>	
	<div class="details_service">适用范围
		<textarea id="editor2" >{$particulars.prod_range}</textarea>
	</div>
	<div class="details_img">针对部位
	<div>
		{$particulars.prod_part}
	</div>
	</div>
	<div class="details_service " >禁忌提示
	<textarea id="editor" type="text/plain" style="width: 100%">{$particulars.prod_taboo}</textarea>
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
	     		<div onclick="abc(this)" val="<?php echo $value['id'];?>"><?php echo $value['address_name'];?><img src="__PUBLIC__/Home/img/select.png"></div>
	     		<?php }?>
	     	</div> 

	      </div>
	    
	    </div>
	  </div>
	</div>
	<div class="details_bottom">
		<div class="details_money_list">
			<div class="details_money"><p>{$particulars.prod_money}</p></div>
			<div class="details_moneybid">门市价:￥<p>{$particulars.prod_money_bid}</p></div>
		</div>
		<button class="details_payment" onclick="alter()">立即购买</button>
		
	</div>
</div>
<form id="jsApi" action="__URL__/product" method="get">
	<input type="hidden" name="prod_brand" value="{$prod_brand}">
	<input type="hidden" name="address_id" value="">
	<input type="hidden" name="product_id" value="{$particulars.id}">
	<input type="hidden" name="reserve_time" value="">
</form>
<include file="Common:foot" />
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
		 $.post("__URL__/collect",{product_id:id,ststic:1},function(data){
		 	if(data=='成功'){
		 	$('#img').attr('src','/Public/Home/img/collect.png');
		 		layer.msg('添加收藏',{icon: 1});
		 	}
		 });
	}else{
		 $.post("__URL__/collect",{product_id:id,ststic:0},function(data){
		 	if(data=='成功'){
			$('#img').attr('src','/Public/Home/img/nocollect.png');
		 		layer.msg('取消收藏', {icon: 1});
		 	}
		 });
	}
}

</script>
