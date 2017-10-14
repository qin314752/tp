

<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		资金统计<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="cl pd-5 bg-1 bk-gray mt-0">
				<form action="__URL__/capital" method="post">
					<input type="hidden" name="kind" value="kind">
					&nbsp;&nbsp;&nbsp;开始时间&nbsp;&nbsp;<input id="startTime" placeholder="请输入开始时间" name="time" value="<?php echo $arr['time']?>" class="laydate-icon" onClick="laydate({elem: '#startTime', istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"> 
					&nbsp;&nbsp;&nbsp;结束时间&nbsp;&nbsp;<input id="endTime" placeholder="请输入结束时间" name="time_end" value="<?php echo $arr['time_end']?>" class="laydate-icon" onClick="laydate({elem: '#endTime', istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
				    <button>查询</button>
				</form>
			</div>	

			<div class="cl pd-5 bg-1 bk-gray mt-0">
			<div class="capital">
				<?php foreach ($data as $name => $value) {?>
				<div class="capital_title">
					<div style="text-align: center;"><?php echo $name;?></div>
					<?php foreach ($value as $address => $money) {?>
					<div class="capital_money">&nbsp;&nbsp;&nbsp;<?php echo $address.'总金额'.$money; ?>元</div>
					<?php }?>
				</div>
				<?php }?>
			</div>
		</article>
	</div>
</section>

<include file="Common:_footer" />

