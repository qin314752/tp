<include file="Common:head" />
<div class="home_information" >
	<div class="home_user_list">
		<div class="home_user_img"><img src="__PUBLIC__/Home/img/user-img.jpg"></div>
		<div class="user_information">
			<div>账号 {$data.user_phone}</div>
			<div>等级 {$members_name}</div>
		</div>
	</div>
	<div class="home_user_money">
		<div class="user_money">
			<div class="money" ><div>余额&nbsp;{$data.user_money} 元</div></div>
			<div class="renminbi"><div></div></div>
		</div>
		<div class="user_recharge" onclick="javascript:location.href='__URL__/recharge'">
			<div>会员充值</div>
		</div>
	</div>
	<div class="home_list">
		<div class="consume" onclick="javascript:location.href='__URL__/consume_list'"  ><img src="__PUBLIC__/Home/img/consume.png">充值记录<div></div></div>
		<div class="consume" onclick="opinion()" ><img src="__PUBLIC__/Home/img/opinion.png">意见反馈 <div></div></div>
	</div>
</div>
	<div id="opinion" style="display: none" >
			<textarea placeholder="请书写您的意见" name="opinion_centents"></textarea>
			<button type="submit">提交</button>
	</div>

<include file="Common:foot" />
<script type="text/javascript">
	$('#opinion button').click(function(){
			var centents = $('[name=opinion_centents]').val();
			if(centents){
				$.post('__URL__/opinion',{opinion_centents:centents},function(data){
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