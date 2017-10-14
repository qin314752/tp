<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="__URL__/wappay_data" method="post" class="form form-horizontal" id="form-article-add">
				<div id="tab-system" class="HuiTab">
					<div class="tabBar cl"><span>微信配置</span></div>
				
					<div class="tabCon">
						<div class="row cl">
							<!-- <div style="margin-left: 90px">当前正在使用的天舒支付：<span class="c-orange">&nbsp;{$wx_pay['provider'] == 1? 天舒 : 康韵}</span></div> -->
							
						</div>
						<div class="row cl" >
							<div style="margin-left: 185px">短信提供商：&nbsp;&nbsp;
								<input type="radio"  class="sn" name="provider" value="1" {$wx_pay['provider']==1? checked :''}>&nbsp;天舒微信支付&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio"  class="cdkey" name="provider" value="2" {$wx_pay['provider']==2? checked :''}>&nbsp;康韵微信支付&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
						</div>
						<div id="sn" {$wx_pay['provider']!=1? "style='display:none'" : ''}>
							<div class="row cl">
								<label class="form-label col-xs-3 col-sm-2">APPID</label>
								<div class="formControls col-xs-8 col-sm-3">
									<input name="APPIDT"  type="text"  value="{$wx_pay['APPIDT']}" class="input-text">
								</div>
							</div>
							<div class="row cl">
								<label class="form-label col-xs-3 col-sm-2">MCHID: </label>
								<div class="formControls col-xs-8 col-sm-3">
									<input name="MCHIDT"  type="password"  value="{$wx_pay['MCHIDT']}" class="input-text">
								</div>
							</div>
							<div class="row cl">
								<label class="form-label col-xs-3 col-sm-2">KEY</label>
								<div class="formControls col-xs-8 col-sm-3">
									<input name="KEYT"  type="password"  value="{$wx_pay['KEYT']}" class="input-text">
								</div>
							</div>
							<div class="row cl">
								<label class="form-label col-xs-3 col-sm-2">APPSECRET: </label>
								<div class="formControls col-xs-8 col-sm-3">
									<input name="APPSECRETT"  type="password"  value="{$wx_pay['APPSECRETT']}" class="input-text">
								</div>
							</div>

						</div>
						<div id="cdkey" {$wx_pay['provider']!=2? "style='display:none'" : ''}>
							
							<div class="row cl">
								<label class="form-label col-xs-3 col-sm-2">APPID</label>
								<div class="formControls col-xs-8 col-sm-3">
									<input name="APPIDK"  type="text"  value="{$wx_pay['APPIDK']}" class="input-text">
								</div>
							</div>
							<div class="row cl">
								<label class="form-label col-xs-3 col-sm-2">MCHID: </label>
								<div class="formControls col-xs-8 col-sm-3">
									<input name="MCHIDK"  type="password"  value="{$wx_pay['MCHIDK']}" class="input-text">
								</div>
							</div>
							<div class="row cl">
								<label class="form-label col-xs-3 col-sm-2">KEY</label>
								<div class="formControls col-xs-8 col-sm-3">
									<input name="KEYK"  type="password"  value="{$wx_pay['KEYK']}" class="input-text">
								</div>
							</div>
							<div class="row cl">
								<label class="form-label col-xs-3 col-sm-2">APPSECRET: </label>
								<div class="formControls col-xs-8 col-sm-3">
									<input name="APPSECRETK"  type="password"  value="{$wx_pay['APPSECRETK']}" class="input-text">
								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
							$('.sn').click(function(){
								$('#sn').css('display','block');
								$('#cdkey').css('display','none');
							});
							$('.cdkey').click(function(){
								$('#cdkey').css('display','block');
								$('#sn').css('display','none');
							});
					</script>
					
				<div class="row cl">
					<div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-2">
						<button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
						<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
						<span>(所有方式修改提交一次即可)</span>
					</div>
				</div>
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