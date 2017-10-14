

<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		产品列表
		<span class="c-gray en">&gt;</span>
		产品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			

			<div class="cl pd-5 bg-1 bk-gray mt-0">
					<form action="__URL__/product_list" method="post">
				<span class="l">
					<input type="hidden" name="kind" value="kind">
				    <select style="width:100px;" name="prod_brand" autocomplete="off">
				    	<option value="">全部产品</option>
				    	<option value="1" {$kind['prod_brand']==1?selected:''}>天舒产品</option>
				    	<option value="2" {$kind['prod_brand']==2?selected:''}>康韵产品</option>
				    </select> 
				    <select style="width:100px;" name="prod_kind" autocomplete="off">
							<option value="">---请选择---</option>
		 					<option value="1" {$kind['prod_kind']==1?selected:''}>汗蒸</option>
		 					<option value="2" {$kind['prod_kind']==2?selected:''}>足浴</option>
		 					<option value="3" {$kind['prod_kind']==3?selected:''}>推拿</option>
		 					<option value="4" {$kind['prod_kind']==4?selected:''}>spa养生</option>
		 					<option value="5" {$kind['prod_kind']==5?selected:''}>中医调理</option>
		 					<option value="6" {$kind['prod_kind']==6?selected:''}>最新优惠</option>
					</select>
					<select style="width:100px" name="prod_grade" autocomplete="off">
						<option value="">---请选择---</option>
	 					<option value="1" {$kind['prod_grade']==1?selected:''}>推荐</option>
	 					<option value="2" {$kind['prod_grade']==2?selected:''}>新款</option>
	 					<option value="3" {$kind['prod_grade']==3?selected:''}>普通</option>
					</select>
				    <select style="width:100px;" name="prod_stastic" autocomplete="off">
						<option value="">---请选择---</option>
				    	<option value="1" {$kind['prod_stastic']==1?selected:''}>上线产品</option>
				    	<option value="0" {$kind['prod_stastic']=='0'?selected:''}>下线产品</option>
				    </select>
				    <select style="width:100px;" name="prod_activity" autocomplete="off">
						<option value="">---请选择---</option>
				    	<option value="1" {$kind['prod_activity']==1?selected:''}>活动产品</option>
				    	<option value="0" {$kind['prod_activity']=='0'?selected:''}>非活动产品</option>
				    </select>

				    <button>查询</button>

				</span>
				</form>
				<span class="r" style="margin-right: 40px">
					<strong>
					
						{$product_pag}
					</strong>
				 </span>
			</div>
			<table class="table table-border table-bordered table-bg">
				<thead>
					
					<tr class="text-c">
						<th style="width:30px;height: 50px;">序号</th>
						<th style="width:50px;height: 50px;">产品品牌</th>
						<th style="width:150px;height: 50px;">产品名称</th>
						<th style="width:50px;height: 50px;">团购价</th>
						<th style="width:50px;height: 50px;">门市价</th>
						<th style="width:50px;height: 50px;">产品种类</th>
						<th style="width:50px;height: 50px;">产品等级</th>
						<th style="width:70px;height: 50px;">上钟时间</th>
						<th style="width:50px;height: 50px;">活动产品</th>
						<th style="width:70px;height: 50px;">结束时间</th>
						<th style="width:50px;height: 50px;">是否上线</th>
						<th style="width:100px;height: 50px;">针对部位</th>
						<th style="width:50px;height: 50px;">已购买人数</th>
						<th style="width:100px;height: 50px;">服务内容</th>
						<th style="width:100px;height: 50px;">适用范围</th>
						<th style="width:100px;height: 50px;">禁忌提示</th>
						<th style="width:100px;height: 50px;">产品图片</th>
						<th style="width:70px;height: 50px;">添加时间</th>
						<th style="width:50px;height: 50px;">操作</th>

					</tr>
				</thead>
				<tbody id="all" >
				<?php foreach ($product_list as  $value) {?>
					<tr class="text-c">
						<td><?php echo $value['id'] ?></td>
						<td style="color:red;"><?php echo $value['prod_brand']==1?'天舒':'康韵' ?></td>
						<td><?php echo $value['prod_name'] ?></td>
						<td><?php echo $value['prod_money'] ?></td>
						<td><?php echo $value['prod_money_bid'] ?></td>
						<td><?php echo prod_kind($value['prod_kind']); ?></td>
						<td><?php echo prod_grade($value['prod_grade']); ?></td>
						<td><?php echo $value['prod_product_time']; ?>分钟</td>
						<td><?php echo $value['prod_activity'] ?></td>
						<td><?php echo date('Y-m-d H:i:s',$value['prod_time_end']); ?></td>
						<td>
						<if condition="$value['prod_stastic'] eq 1">
						<span class="label label-success radius">上线</span>
						<else />
						<span class="label radius">下线</span>
						</if>
						</td>
						<td><?php echo prod_part($value['prod_part']); ?></td>
						<td><?php echo $value['prod_number'] ?></td>
						<td><div style="width:100%;height:50px; overflow-y :scroll;overflow:auto"><?php echo $value['prod_service'] ?></div></td>
						<td><div style="width:100%;height:50px; overflow-y :scroll;overflow:auto"><?php echo $value['prod_range'] ?></div></td>
						<td><div style="width:100%;height:50px; overflow-y :scroll;overflow:auto"><?php echo $value['prod_taboo'] ?></div></td>
						<td><img style="width:100px;height:50px;" src="/<?php echo $value['prod_img']; ?>"></td>
						
						<td><?php echo date('Y-m-d H:i:s',$value['prod_time']); ?></td>
						<td class="td-manage">
						<a title="编辑" href="__URL__/update?id=<?php echo $value['id'] ?>"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
						<?php   if($value['prod_stastic']){?>
						<a title="下架" href="javascript:;" onclick="admin_del(this,'<?php echo $value['id'] ?>' ,'<?php echo $value['prod_stastic'] ?>','下架')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
						<?php }else{?>
						<a title="上线" href="javascript:;" onclick="admin_del(this,'<?php echo $value['id'] ?>','<?php echo $value['prod_stastic'] ?>','上线')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
						<?php }?>
						
						</td>
					</tr>
				<?php }?>			
				</tbody>



			</table>
		</article>
	</div>
</section>

<include file="Common:_footer" />

<script type="text/javascript"> 
function fresh_page(){
window.location.reload();
} 
function admin_del(obj,id,stastic,s){
	layer.confirm('确认要'+s+'此产品吗？',function(index){
		var id1 = id;
		var stastic1 = stastic;
		$.post("__URL__/stastic",{id:id1,stastic:stastic1},function(data){
			if(data){
				layer.msg('已'+s+'!',{time:2000},{icon:1});
				setTimeout('fresh_page()',1000);  
			}else{
				layer.msg(s+'失败请联系管理员!',{time:2000},{icon:0});
			}
		});
		
	});
}
</script> 
