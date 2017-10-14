<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品有效期 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="__URL__/period" method="post" class="form form-horizontal" id="form-article-add">
				<div id="tab-system" class="HuiTab">
					<div class="tabBar cl"><span>周期配置</span></div>
					<div class="tabCon" style="margin-top: 20px;">
						<div class="row cl">
							<label class="form-label col-xs-3 col-sm-2">天舒：</label>
							<div class="formControls col-xs-8 col-sm-3">
								<input name="tianshu"  type="text"  value="{$period['tianshu']}" class="input-text">
							</div>
							<span class="c-orange">*周期为天数(只能为整数。例如：1,2,3,4)</span>
						</div>
						<input type="hidden" name="id" value="{$period['id']}">
						<div class="row cl">
							<label class="form-label col-xs-3 col-sm-2">康韵：</label>
							<div class="formControls col-xs-8 col-sm-3">
								<input name="kangyun"  type="text"  value="{$period['kangyun']}" class="input-text">
							</div>
							<span class="c-orange">*周期为天数(只能为整数。例如：1,2,3,4)</span>
						</div>
					</div>
				</div>
				<div class="row cl">
					<div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-2">
						<button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
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