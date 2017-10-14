<include file="Common:_meta" />
<include file="Common:_footer" />
	<div style="font-size: 14px;font-weight: bold;color: #1e325c;margin:5px 0 0 20px;">确认码比对</div>
<div style="width: 90%;margin-left: 5%;height: 500px">
	<form id='form' action="__URL__/nonce" method="post"> 

	<div class="dashed " style="width: 100%;margin-top: 10px;-margin-bottom: 10px;padding-bottom:14px;" >
		<div style="-float: left;width: 560px;margin:5px auto;">
			<span style="float: left;">确认码：</span>
			<input type="text"  placeholder="请输入8位数确认码" style="width:250px;float:left;height:20px;" name="nonce_str">&nbsp;
			<span class="c-orange">*</span>
		</div>
	</div>
	

	<input type="hidden" name="id" value="{$id}">
	<div style="border: 1px solid #9cb8cc;"></div>
	<div id = 'submit'  style="margin:15px 0px 0px 56px;width: 60px;height: 28px;background-color: #567ab4;color: #fff;-border:1px solid red;text-align: center;line-height: 28px;border-radius: 4px;">确定</div>
</form>

</div>	
<script type="text/javascript">
$("#submit").click(function(){  
    var tourl = $("#form").attr("action"); 
    $.post(tourl,$("form").serialize(),function(data){
    	if (data =='确认码正确') {
            layer.msg('确认码正确',{time:3000},{icon:6});
        }else{
            layer.msg('确认码不正确',{time:3000},{icon:2});
        }
    });
});
</script>

			

