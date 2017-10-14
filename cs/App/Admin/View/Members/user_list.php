<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		角色管理
		<span class="c-gray en">&gt;</span>
		角色列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>	
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l"> 
				<form action="__URL__/user_list" method="post">
					手机号：<input type="text" name="user_phone" value="">
					<input type="submit" value="查找">
				</form> 
				 </span>
			<span class="r" style="margin-right: 40px">
					<strong>
						{$consumer_num}
					</strong>
			</span>
			</div>
			
			<table class="table table-border table-bordered table-bg">
				<thead>
					
					<tr class="text-c">
						<th>ID</th>
						<th>用户名</th>
						<th>会员等级</th>
						<th>余额</th>
						<th>累计金额</th>
						<th>注册时间</th>
						<th>IP地址</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					
				<?php  foreach ($consumer as $key => $value) {?>
					<tr class="text-c">
						<th width="150"><?php echo $value['id']?></th>
						<th width="150"><?php echo $value['user_phone'] ?></th>
						<th width="150"><?php echo $value['members_id'] ?></th>
						<th width="150"><?php echo $value['user_money'] ?></th>
						<th width="150"><?php echo $value['money_amount'] ?></th>
						<th width="150"> <?php echo $value['register_time'] ?></th>
						<th width="150"><?php echo $value['user_coms_ip'] ?></th>
						<th width="150">
						<a href="javascript:;" onclick="admin_stop('<?php echo $value['id']?>')" class="ml-1" >[ 修改余额 ]</a>
						</th>
					</tr>
					<?php }?>

					
				</tbody>
			</table>
		</article>
	</div>
</section>


<include file="Common:_footer" />

<script type="text/javascript">

function admin_stop(id){
	layer.open({
	  type: 2,
	  title: '调整余额',
	  shadeClose: true,
	  shade: [0.5, '#393D49'],
	  // area: ['100%', '100%'],
	  area: ['560px', '220px'],
	  content: ['__URL__/user_money?id='+id,'no'] //iframe的url
	}); 
	

}

/*管理员-角色-编辑*/
function admin_role_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

</script> 
<!--/请在上方写此页面业务相关的脚本-->
