<include file="Common:head" />
<div class="recharge" >
	<form action="__URL__/recharge_money" method="get">
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
<include file="Common:foot" />
