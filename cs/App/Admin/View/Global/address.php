<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">

		<article class="cl pd-20">
		<div id='add_admin' style="display: none;">
		   <form action="__URL__/add_address" method="post">
			<div  style="color:#427FB8;font-size: 18px;margin-left: 30px;">添加地址<span id="admin_hide"> [ 隐藏 ]</span> </div>
				<p class="line" style="margin-top:0;"></p>
		<div class="filed fl div_table">
			<div class="div">
			<select style="float: left;margin-left: 30px;width:100px;" name="prod_brand" autocomplete="off">
				<option value="">---产品地址---</option>
				<option value="1">天舒产品地址</option>
				<option value="2">康韵产品地址</option>
			</select>
					<div style="float: left;margin-left: 10px;">
						<span >店面名称</span><input style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name="address_name">
						<span >客服电话</span><input style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name="address_phone">
						<span >地址</span><input style="border:1px solid #ddd;width:300px;height: 20px;margin:auto 10px" type="text" name="address">
					</div>
					<br>
			</div>
		</div>
		<p  style="margin-top:0;margin-top: 10px;"></p>
			<button class="submit_advertising">提交</button>
		<p style="margin-top:0;margin-top: 10px;"></p>
		</form>
     </div>
				<div id="tab-system">
					<div class="tabBar cl"><span>地址配置</span></div>
					<button id="button"  >添加地址</button>
					<div class="tabCon">
						

						<div id="form_list" style="margin-bottom: 20px;" >
						<?php foreach ($address as $key => $value) {?>
					<form action="__URL__/save_address" method="post" class="form form-horizontal" id="<?php echo $value['id']?>">
						
							<div style="float: left;margin-left: 150px;margin-bottom: 5px">
								<input type="hidden" name="id" value="<?php echo $value['id']?>">
								<select style="width:100px;" name="prod_brand" disabled="disabled" autocomplete="off">
							    	<option value="1" <?php echo $value['prod_brand']==1?'selected':''?>>天舒产品地址</option>
							    	<option value="2" <?php echo $value['prod_brand']==2?'selected':''?>>康韵产品地址</option>
							    </select>
								<span >店面名称</span><input disabled="disabled" style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name='address_name' value="<?php echo $value['address_name'] ?>">
								<span >客服电话</span><input disabled="disabled" style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name='address_phone' value="<?php echo $value['address_phone'] ?>">
								<span >地址</span><input disabled="disabled" style="border:1px solid #ddd;width:300px;height: 20px;margin:auto 10px" type="text" name='address' value="<?php echo $value['address'] ?>">
								<a href="javascript:;" class="update" val='<?php echo $value['id']?>'>[ 修改 ]</a> |
								<a href="javascript:;" onclick="javascript:location.href='__URL__/carousel_del?id=<?php echo $value['id']?>&address_static=0&address_name=<?php echo $value['address_name']?>' " > [ 作废 ]</a>
							</div>
							</form>
						<?php }?>
						</div>
					</div>
				</div>
			</form>
		</article>
	</div>
</section>
<include file="Common:_footer" />
<script>
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
	$('#form_list').find('input').attr('disabled','disabled');
	$('#form_list').find('select').attr('disabled','disabled');
});
$('#button').click(function(){
	if($('#add_admin').css('display')=='none'){
	$('#add_admin').css('display','block');
	}
});
$('#admin_hide').click(function(){
	$('#add_admin').css('display','none');
});
$('.update').click(function(){
	var obj = $(this);
	obj.siblings('[disabled=disabled]').removeAttr('disabled');
	obj.text('[ 保存 ]');
	var id = obj.attr('val');
	obj.attr('onclick','submits('+id+')');
});
function submits(id){
	$('#'+id).submit();
}
</script>