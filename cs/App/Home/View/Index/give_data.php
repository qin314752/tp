<include file="Common:head" />
<div class="give_color">
<div class="give_data">不使用红包  <div class="pay_color" ><div class="pay_color_w"  onclick="give_data(this,'','<?php echo $moneys;?>')"></div></div></div>
<span style="margin-left: 2%;font-size: 1rem;">有{$num}个红包可以使用</span>	
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