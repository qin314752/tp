<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="__URL__/template_data" method="post" class="form form-horizontal" id="form-article-add">
				<div id="tab-system" class="HuiTab">
				<div style="color:#1E325C;font-size: 16px">通知信息模板管理---(#UserName#表示接受信息用户的用户名，是一个动态参数，包含#号整体,表示用户名)</div>
					<div class="tabBar cl">
					<!-- <span>邮件设置</span> -->
					<span>短信模板</span>
					</div>
				<!-- 	<div class="tabCon">
						<div class="row cl dashed" >
							<label class="form-label col-xs-3 col-sm-2">用户注册成功:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="email_regsuccess" class="textarea_color" >{$emailtxt['email_regsuccess']}</textarea> 
							</div>
							<span class="c-orange">#LINK#表示激活链接，只在此邮件下有用</span>
						</div>
						<div class="row cl dashed" >
							<label class="form-label col-xs-3 col-sm-2">安全中心更改安全问题:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="email_safecode"  class="textarea_color" >{$emailtxt['email_safecode']}</textarea> 
							</div>
							<span class="c-orange">#CODE#表示验证码</span>
						</div>
						<div class="row cl dashed" >
							<label class="form-label col-xs-3 col-sm-2">安全中心新手机安全码:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="email_changephone"  class="textarea_color" >{$emailtxt['email_changephone']}</textarea> 
							</div>
							<span class="c-orange">#CODE#表示验证码</span>
						</div>
						<div class="row cl dashed" >
							<label class="form-label col-xs-3 col-sm-2">密码找回提示:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="email_getpass"  class="textarea_color" >{$emailtxt['email_getpass']}</textarea> 
							</div>
							<span class="c-orange">#LINK#表示密码找回链接，只在此邮件下有用</span>
						</div>
						<div class="row cl dashed" >
							<label class="form-label col-xs-3 col-sm-2">支付密码找回提示:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="email_getpaypass"  class="textarea_color" >{$emailtxt['email_getpaypass']}</textarea> 
							</div>
							<span class="c-orange">#LINK#表示支付密码找回链接，只在此邮件下有用</span>
						</div>
					</div> -->

					<div class="tabCon">
					<span class="c-orange" style="margin-left: 170px;">【注】：模板内容不要太长，不要包含违法关键字，内容结尾请加网站签名，网站签名格式为：【网站名称】，这样可加快邮件接收速度！</span>
						<div class="row cl dashed">
							<label class="form-label col-xs-3 col-sm-2">用户注册成功:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="regsuccess"  class="textarea_color" >{$smstxt['regsuccess']}</textarea> 
							</div>
						</div>
						<div class="row cl dashed" name="payonline">
							<label class="form-label col-xs-3 col-sm-2">线上充值成功:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="payonline"  class="textarea_color" >{$smstxt['payonline']}</textarea> 
							</div>
							<span class="c-orange">#USERANEM#表示用户名,#DATE#表示充值日期,#MONEY#表示充值金额</span>
						</div>

						<div class="row cl dashed" name="withdraw">
							<label class="form-label col-xs-3 col-sm-2">产品购买通知:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="withdraw"  class="textarea_color" >{$smstxt['withdraw']}</textarea> 
							</div>
							<span class="c-orange">#USERANEM#表示用户名,#DATE#表示提现日期，#MONEY#表示提现金额</span>
						</div>
	
					</div>
				</div>
				<div class="row cl">
					<div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-2">
						<button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
						<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
						<span>(所有方式修改提交一次即可)</span>
					</div>
				</div>
				<div style="color:#1E325C;font-size: 16px">#UserName#表示接受信息用户的用户名，是一个动态参数,如" #UserName#你好，恭喜您注册成功",那么用户'test'收到的信息就是 "test你好，恭喜您注册成功"</div>
			</form>
		</article>
	</div>
</section>
<include file="Common:_footer" />
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
});
</script> 