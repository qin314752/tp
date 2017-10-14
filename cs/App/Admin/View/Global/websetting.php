<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="__URL__/websetting" method="post" class="form form-horizontal" id="form-article-add">
				<div id="tab-system" class="HuiTab">
					<div class="tabBar cl"><span>网站配置</span></div>
					<div class="tabCon">
						<div class="row cl">
							<label class="form-label col-xs-3 col-sm-2">网站域名：</label>
							<div class="formControls col-xs-8 col-sm-3">
								<input name="wap_domain"  type="text"  value="{$note['wap_domain']}" class="input-text">
							</div>
						</div>
						<div class="row cl">
							<label class="form-label col-xs-3 col-sm-2">网站名称：</label>
							<div class="formControls col-xs-8 col-sm-3">
								<input name="wap_title"  type="text"  value="{$note['wap_title']}" class="input-text">
							</div>
							
						</div>
					<!-- 	<div class="row cl">
							<label class="form-label col-xs-3 col-sm-2">网站关键词：</label>
							<div class="formControls col-xs-8 col-sm-3">
								<input name="wap_antistop"  type="text"  value="{$note['wap_antistop']}" class="input-text">
							</div>
							<span class="c-orange"></span>
						</div>
						<div class="row cl">
							<label class="form-label col-xs-3 col-sm-2">网站描述：</label>
							<div class="formControls col-xs-8 col-sm-3">
								<input name="wap_describe"  type="text"   value="{$note['wap_describe']}" class="input-text">
							</div>
							<span class="c-orange"></span>
						</div>
						<div class="row cl">
							<label class="form-label col-xs-3 col-sm-2">网站底部：</label>
							<div class="formControls col-xs-8 col-sm-3">
								<input name="wap_bottom"  type="text"  value="{$note['wap_bottom']}" class="input-text">
							</div>
							<span class="c-orange"></span>
						</div> -->
						<div class="row cl">
							<label class="form-label col-xs-3 col-sm-2">后台入口：</label>
							<div class="formControls col-xs-8 col-sm-3">
								<input name="wap_admin"  type="text"  value="{$note['wap_admin']}" class="input-text">
							</div>
							<span class="c-orange">可修改后台登陆路径,格式为任意字母组合。访问路径即为：【http://www.您的域名/index.php/后台入口/login 】</span>
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