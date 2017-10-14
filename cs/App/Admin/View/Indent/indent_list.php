<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		订单管理
		<span class="c-gray en">&gt;</span>
		订单列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>	
	<div class="Hui-article">
		<article class="cl pd-20">
			
			
			<div class="cl pd-5 bg-1 bk-gray mt-0">
					<form action="__URL__/indent_list" method="post">
				<span class="l">
					<input type="hidden" name="kind" value="kind">
					<select style="width:100px;" name="address_id" autocomplete="off">
							<option value="">---地址---</option>
							<?php  foreach ($address as $key => $value) {?>
		 					<option value="<?php echo $value['id']?>"  <?php echo $kind['address_id']==$value['id']?'selected':''; ?> >---<?php  echo $value['address_name']?>---</option>
		 					<?php }?>
					</select> 
					<select style="width:100px;" name="indent_static" autocomplete="off">
						<option value="">--是否消费--</option>
		 					<option value="1" <?php echo $kind['indent_static']==1?'selected':''?> >---未消费---</option>
		 					<option value="2" <?php echo $kind['indent_static']==2?'selected':''?> >---已消费---</option>
		 					<option value="3" <?php echo $kind['indent_static']==3?'selected':''?> >---已过期---</option>
		 					<option value="4" <?php echo $kind['indent_static']==4?'selected':''?> >---已退单---</option>
					</select>
				    <select style="width:100px;" name="reserve_type" autocomplete="off">
						<option value="">--是否预定--</option>
		 					<option value="0" <?php echo $kind['reserve_type']==='0'?'selected':''?> >---未预定---</option>
		 					<option value="1" <?php echo $kind['reserve_type']==1?'selected':''?> >---预定---</option>
					</select>
					&nbsp;手机号码：<input type="text" name="user_id" autocomplete="off" value="<?php echo $kind['user_id']?>">&nbsp;
				    <button> 查询</button>

				</span>
				</form>
				<span class="r" style="margin-right: 40px">
					<strong>
						{$indent_num}
					</strong>
				 </span>
			</div>
				
			<table class="table table-border table-bordered table-bg">
				<thead>
					
					<tr class="text-c">
						<th>ID</th>
						<th>商户号</th>
						<th>店铺地址</th>
						<th>产品名称</th>
						<th>交易类型</th>
						<th>用户id</th>
						<th>现金支付金额</th>
						<th>是否为预定</th>
						<th>订单状态</th>
						<th>支付完成时间</th>
						<th>有效时间</th>
						<th>消费时间</th>
						<th>退单时间</th>
						<th>商户订单号</th>
						<th>微信订单号</th>
						<th>用户标识</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
				<?php  foreach ($indent as $key => $value) {?>
					<tr class="text-c">
						<th width="50"><?php echo $value['id']?></th>
						<th width="50"><?php echo $value['mch_id']==FS('Dynamic/wappay')['MCHIDT']?'天舒':'康韵'; ?></th>
						<th width="150"><?php echo inquire_name('address','id='.$value['address_id'],'address_name');?></th>
						<th width="150"><?php echo inquire_name('product','id='.$value['product_id'],'prod_name'); ?></th>
						<th width="80"><?php echo $value['trade_type']=='JSAPI'?'微信支付':'余额支付'; ?></th>
						<th width="110"><?php echo inquire_name('consumer','id='.$value['user_id'],'user_phone');?></th>
						<th width="100"><?php echo $value['cash_fee'] ?>元</th>
						<th width="50" style="color:<?php echo $value['reserve_type']==1?'red':'#0864C0';?>"><?php echo $value['reserve_type']==1?'预定':'普通'; ?></th>
						<th width="80" style="<?php if($value['indent_static']==1){echo 'color:red';}else if($value['indent_static']==2){echo 'color:#0864C0';}else{echo 'color:#909090';}?>">
							
						<?php if($value['indent_static']==1){echo '未消费';}else if($value['indent_static']==2){echo '已消费';}else if($value['indent_static']==3){echo '已过期';}else if($value['indent_static']==4){echo '已取消订单';} ?>
								
						</th>
						<th width="100"><?php echo date('Y-m-d H:i:s',$value['time_end']); ?></th>
						<th width="100"><?php if($value['reserve_time'])echo date('Y-m-d H:i:s',$value['reserve_time']); ?></th>
						<th width="100"><?php  if($value['consume_time']){echo date('Y-m-d H:i:s',$value['consume_time']);} ?></th>
						<th width="100"><?php if($value['refund_time'])echo date('Y-m-d H:i:s',$value['refund_time']); ?></th>
						<th width="150"><?php echo $value['out_trade_no'] ?></th>
						<th width="150"><?php echo $value['transaction_id'] ?></th>
						<th width="150"><?php echo $value['openid'] ?></th>
						<th width="110">
						<?php if($value['indent_static']==1){ ?>
						<a href="javascript:;" onclick="admin_stop('<?php echo $value['id']?>')"> [ 确认码比对 ] </a><br>
						<a href="javascript:;" onclick="affirm('<?php echo $value['id']?>')"> [ 确认消费 ] </a><br>
						<a href="javascript:;" onclick="refund('<?php echo $value['id']?>','<?php echo $value['trade_type']?>')"> [ 取消订单 ] </a>
						<?php }else if($value['indent_static']==2){?>
						<a href="javascript:;"> [ 已消费 ]</a>
						<?php }elseif($value['indent_static']==3){?>
						<a href="javascript:;"> [ 已过期 ]</a>
						<?php }elseif($value['indent_static']==4){?>
						<a href="javascript:;"> [ 已取消 ]</a>
						<?php }?>
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
	  title: '确认码比对',
	  shadeClose: true,
	  shade: 0.6, 
	  // area: ['100%', '100%'],
	  area: ['400px', '200px'],
	  content: ['__URL__/nonce?id='+id,'no'],
	  
	}); 
}

function affirm(id){
	layer.confirm('确认要消费吗？',{icon: 3},function(index){
	$.post("__URL__/affirm",{id:id},function(data){
	    if(data=='成功'){
	    	layer.open({title: false,closeBtn: 0,time: 4000,content: '确认消费成功',}); 
	    	setTimeout('myrefresh()',1000);
	    }else{
	    	layer.open({title: false,closeBtn: 0,content: data,}); 
	    }
	  });
	});
}
function myrefresh()
{
   window.location.reload();
}


function refund(id,static){
	layer.confirm('确认要取消订单吗？',function(index){
		$.post('__URL__/refund_data',{id:id,trade_type:static},function(data){
			if(data=='成功'){
	    		layer.open({title: false,closeBtn: 0,time: 4000,content: '取消订单成功',}); 
	    		setTimeout('myrefresh()',1000);
			}else{
	    		layer.open({title: false,closeBtn: 0,content: data,}); 
			}
		});
	});
}
</script> 

