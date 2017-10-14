<include file="Common:_meta" />
<include file="Common:_footer" />
	<div style="font-size: 14px;font-weight: bold;color: #1e325c;margin:5px 0 0 20px;">调整余额</div>
<div style="width: 90%;margin-left: 5%;height: 500px">
	<div class="dashed " style="width: 100%;margin-top: 10px;" >
		<div style="-float: left;width: 560px;margin:5px auto;">
			<span style="float: left;">可用余额：</span>
			<input type="text" style="width:250px;float:left;height:20px;" name="user_money">&nbsp;
			<span class="c-orange">* 如果是减少余额,请填负数,如'-100'</span>
		</div>
	</div>
	<div class="dashed " style="width: 100%;margin-top: 10px;" >
		<div style="-float: left;width: 560px;margin: 5px auto;">
			<span style="float: left;">变动原因：</span>
			<input type="text" style="width:250px;float:left;height:20px;" name="money_cause">&nbsp;
			<span class="c-orange">*</span>
		</div>
	</div>

	<input type="hidden" name="id" value="{$id}">
	<div style="border: 1px solid #9cb8cc;"></div>
	<button -type="button"  onclick="bloa()" style="margin:15px 0px 0px 56px;width: 60px;height: 28px;line-height:28px;text-align: center ;background-color: #567ab4;color: #fff;">确定</button>
	<script type="text/javascript">
		function bloa(){
			var user_money = $('[name=user_money]').val();
			var money_cause = $('[name=money_cause]').val();
			var id = $('[name=id]').val();
			$.post('__URL__/user_upmoney',{id:id,user_money:user_money,money_cause:money_cause},function(data){
				if(data=='成功'){
					layer.open({title: false,closeBtn: 0,time: 4000,content: data});
					parent.location.reload(); // 父页面刷新
	                var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
	                parent.layer.close(index);
				}else{
					layer.open({title: false,closeBtn: 0,content: data});
				}
			});
		}
	</script>

</div>	
	

				

