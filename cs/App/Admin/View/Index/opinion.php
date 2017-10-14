<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		意见反馈<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>	
	<div class="Hui-article">
		<div class="page-container">
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th colspan="9" scope="col">信息统计</th>
					</tr>
					<tr class="text-c">
						<th style="width:40px;">序号</th>
						<th style="width:100px;">用户</th>
						<th style="width:40px">状态</th>
						<th style="width:70px">提交时间</th>
						<th style="">内容</th>
						<th style="width:80px">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($opinion as $key => $value) {?>
					<tr class="text-c">
						<td><?php echo $key;?></td>
						<td><?php echo $value['user_phone'];?></td>
						<td style="color:<?php echo $value['opinion_static']==1?'red':'blue'?>"><?php echo $value['opinion_static']==1?'未处理':'已处理';?></td>
						<td><?php echo date('Y-m-d H:i:s',$value['opinion_time']);?></td>
						<td><?php echo $value['opinion_centents'];?></td>
						<td>
							<?php if($value['opinion_static']==1){?>
						<a href="javascript:;" onclick="location.href='__ROOT__/index.php/<?php echo MODULE_NAME;?>/Index/opinion?opinion_static=2&id=<?php echo $value['id'];?>'"> [ 未处理 ] </a>
						<?php }else{?>
						
						<a href="javascript:;"> [ 已处理 ] </a>
						<?php }?>
						</td>
					</tr>
				<?php }?>
				</tbody>
			</table>
			
		</div>
	</div>
</section>


<include file="Common:_footer" />

<script type="text/javascript">


</script>
