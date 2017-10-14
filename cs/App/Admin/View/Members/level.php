<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 会员管理 <span class="c-gray en">&gt;</span> 会员设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">

		<article class="cl pd-20">
		<div id='add_admin' style="display: none;">
		   <form action="__URL__/members" method="post">
			<div  style="color:#427FB8;font-size: 18px;margin-left: 30px;">添加会员<span id="admin_hide"> [ 隐藏 ]</span> </div>
				<p class="line" style="margin-top:0;"></p>
		<div class="filed fl div_table">
			<div class="div">
					<div style="float: left;margin-left: 10px;">
						<span >会员名称：</span><input style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name="members_name">
						<span >充值金额：</span><input style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name="members_money">
						<span >打折百分比：</span><input style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name="members_discount">
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
					<div class="tabBar cl"><span>会员配置</span></div>
					<button id="button"  >添加会员</button>
					<div class="tabCon">
						<div style="margin-left: 150px;margin-bottom: 5px;font-size: 18px;color: red">-----------------打折百分比值只能为整数-----------------</div>
						<div id="form_list" style="margin-bottom: 20px;" >
							<?php foreach ($data as $key => $value) {?>
							<form action="__URL__/upmembers" method="post" class="form form-horizontal" id="<?php if($value['id']!=5) echo $value['id']?>">
							<div style="float: left;margin-left: 150px;margin-bottom: 8px">
								<input type="hidden" name="id" value="<?php if($value['id']!=5) echo $value['id']?>">
								<span >会员名称：</span><input disabled="disabled" style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name='members_name' value="<?php echo $value['members_name'] ?>">
								<span >充值金额：</span><input disabled="disabled" style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name='members_money' value="<?php echo $value['members_money'] ?>">
								<span >打折百分比：</span><input disabled="disabled" style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name='members_discount' value="<?php echo $value['members_discount'] ?>">
								<?php if($value['id']==5){?>
								<a href="javascript:;">[ 禁止修改 ]</a>
								<?php }else{?>
								<a class="update" val='<?php echo $value['id']?>'>[ 修改 ]</a> |
								<a onclick="javascript:location.href='__URL__/members_del?id=<?php echo $value['id']?>&members_name=<?php echo $value['members_name'] ?>'" > [ 作废 ]</a>
								<?php }?>
							</div>
							</form>
						<?php }?>
						</div>
					</div>
				</div>
				<script type="text/javascript">
				$(function(){
					$('#form_list').find('input').attr('disabled','disabled');
					$('#form_list').find('select').attr('disabled','disabled');
				});
				$('.update').click(function(){
					var obj = $(this);
					obj.siblings('[disabled=disabled]').removeAttr('disabled');
					obj.text('[ 保存 ]');
					obj.attr('onclick','submit(this)');
				});
				function submit(obj){
					var obj = $(obj);
					var id = obj.attr('val');
					$('#'+id).submit();
				}
				</script>
				<!-- <div class="row cl">
					<div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-2">
						<button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
						<span>(所有方式修改提交一次即可)</span>
					</div>
				</div> -->
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
<script type="text/javascript">
	$('#button').click(function(){
		if($('#add_admin').css('display')=='none'){
		$('#add_admin').css('display','block');
		}
	});
	$('#admin_hide').click(function(){
		$('#add_admin').css('display','none');
	});
</script>