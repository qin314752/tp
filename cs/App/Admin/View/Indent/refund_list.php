<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		订单管理
		<span class="c-gray en">&gt;</span>
		退款列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>	
	<div class="Hui-article">
		<article class="cl pd-20">
			
			
			<div class="cl pd-5 bg-1 bk-gray mt-0">
					<form action="__URL__/refund_list" method="post">
				<span class="l">
					&nbsp;商户订单号 <input type="text" style="width: 200px;"  name="OrderQuery" autocomplete="off" value="<?php echo $out_trade_no?>">&nbsp;
				    <button> 查询</button>

				</span>
				</form>
				<span class="r" style="margin-right: 40px">
					<strong>
						{$refundquery_num}
					</strong>
				 </span>
			</div>
				
			<table class="table table-border table-bordered table-bg">
				<thead>
					
					<tr class="text-c">
						<th>ID</th>
						<th>商户号</th>
						<th>现金支付金额</th>
						<th>商户订单号</th>
						<th>退款资金来源</th>
						<th>退款渠道</th>
						<th>退款笔数</th>
						<th>退款入账账户</th>
						<th>退款状态</th>
						<th>退款成功时间</th>
						<th>业务结果</th>
						<th>订单金额</th>
						<th>微信退款单号</th>
						<th>微信订单号</th>
						
					</tr>
				</thead>
				<tbody>
				<?php  foreach ($data as $key => $value) {?>
					<tr class="text-c">
						<th width="50"><?php echo $value['id']?></th>
						<th width="50"><?php echo $value['mch_id']==FS('Dynamic/wappay')['MCHIDT']?'天舒':'康韵'; ?></th>
						<th width="100"><?php echo $value['cash_fee']/100; ?></th>
						<th width="100"><?php echo $value['out_trade_no']; ?></th>
						<th width="100"><?php echo $value['refund_account_0']; ?></th>
						<th width="100"><?php echo $value['refund_channel_0']; ?></th>
						<th width="50"><?php echo $value['refund_count']; ?></th>
						<th width="130"><?php echo $value['refund_recv_accout_0']; ?></th>
						<th width="100"><?php echo $value['refund_status_0']; ?></th>
						<th width="60"><?php echo $value['refund_success_time_0']; ?></th>
						<th width="80"><?php echo $value['result_code']; ?></th>
						<th width="100"><?php echo $value['total_fee']/100; ?>元</th>
						<th width="100"><?php echo $value['refund_id_0']; ?></th>
						<th width="100"><?php echo $value['transaction_id']; ?></th>
					<?php }?>
				</tbody>
			</table>
		</article>
	</div>
</section>


<include file="Common:_footer" />
