<include file="Common:head" />

	<div id="consume_list">
		<div class="consume_title">
		 <div id="con_left"  class="color" onclick="con_click(this)">充值&nbsp;&nbsp;<div></div></div>
		 <div id="con_right" class="color" onclick="con_click(this)">&nbsp;&nbsp;消费</div> 
		</div>
		
<?php if(!$recharge){?> <div class="product_more"><img src="__PUBLIC__/Home/img/recharge.jpg"></div><?php }else{foreach ($recharge as $key => $value) {?>

		<div class="consume_money con_left "  >
			<div class="consume_left">
				<div class="consume_top">充值</div>
				<div class="consume_time"><?php echo date('Y/m/d H:i:s',$value['time_end']);?></div>
			</div>
			<div class="consume_but">+<?php echo $value['cash_fee'];?>元</div>
		</div>
<?php }} if(!$indent){?> <div class="product_more"><img src="__PUBLIC__/Home/img/indent.jpg"></div><?php }else{ foreach ($indent as $key => $value) {?>
		<div class="consume_money con_right " style="display: none">
			<div class="consume_left">
				<div class="consume_top">消费</div>
				<div class="consume_time"><?php echo date('Y/m/d H:i:s',$value['time_end']);?></div>
			</div>
			<div class="consume_but">-<?php echo $value['cash_fee'];?>元</div>
		</div>
		
<?php }}?>
		
<include file="Common:foot" />
<script type="text/javascript">
	$(function(){
		$('#con_left').css('color','#CE1D3E');
		$('#con_left').css('border-bottom','1px solid #CE1D3E');
	});
		function con_click(obj){
		var obj = $(obj);
		var id = obj.attr('id');
		$('.consume_money').css('display','none');
		$('.'+id).css('display','block');
		$('.color').css('color','');
		$('.color').css('border-bottom','');
		$('#'+id).css('color','#CE1D3E');
		$('#'+id).css('border-bottom','1px solid #CE1D3E');
	}
</script>