<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		短信发送记录
		</nav>	
	<div class="Hui-article">
		<div class="page-container">
				<div class="cl pd-5 bg-1 bk-gray mt-0">
					<form action="__URL__/refund_list" method="post">
				<span class="l">
		<span style="color: #3B5999;font-size: 15px;">短信发送记录</span>

				</span>
				</form>
				<span class="r" style="margin-right: 40px">
					<strong>
						{$phone_num}
					</strong>
				 </span>
			</div>
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr class="text-c">
						<th>序号</th>
						<th>位置</th>
						<th>操作者</th>
						<th>操作内容</th>
						<th>IP地址</th>
						<th>操作时间</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($data as $key => $value) {?>
					<tr class="text-c">
						<td><?php  echo $value['id']; ?></td>
						<td><?php  echo $value['type']; ?></td>
						<td><?php  echo $value['deal_user']; ?></td>
						<td><?php  echo $value['deal_info']; ?></td>
						<td><?php  echo ip2area($value['deal_ip']); ?></td>
						<td><?php  echo date('Y-m-d H:i:s',$value['deal_time']);?></td>
					</tr>
				<?php }?>
				</tbody>
			</table>
			
		</div>
	</div>
</section>


<include file="Common:_footer" />

<script type="text/javascript">
	function admin_role_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

</script>
</body>
</html>