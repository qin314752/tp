<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<include file="Common:_footer" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		轮播图
	</nav>
	<div class="Hui-article">
	  <article class="cl pd-20">
	   
	    <div id='add_admin' class="adver" style="display: none;" >
	      <form action="__URL__/add_advertising" method="post" enctype="multipart/form-data">
	        <div style="font-size: 18px;margin-left: 30px;">添加轮播图
	          <span onclick="admin_hide('add_admin')">[ 隐藏 ]</span></div>
	        <p class="line" style="margin-top:0;"></p>
	        <div class="filed fl div_table">
	          <div class="div">
	          	<input type="hidden" name="carousel_ststic" value="1">
	            <select style="float: left;margin-left: 30px;width:150px;" name="prod_id" autocomplete="off">
	                <option value="">---产品选着---</option>
	              <?php foreach ($data as $key=>$value) {?>
	                <option value="<?php echo $value['id'].'#'.$value['prod_name'].'#'.$value['prod_brand']?>"><?php echo $value['prod_name'];?></option>
	              <?php }?>
	              </select>
	            <div class="advertising" >
	            <input  type="file" name="advertising"> <span>*[ pjpeg ] [ jpg ] [ gif ] [ png ]格式图片小于1M</span>
	            </div>
	            <br></div>
	        </div>
	        <p style="margin-top:0;margin-top: 10px;"></p>
	        <button  class="submit_advertising" >提交</button>
	        <p style="margin-top:0;margin-top: 10px;"></p>
	      </form>
	    </div>

 		<div id='add_advers' class="adver" style="display: none;" >
	      <form action="__URL__/add_advertising" method="post" enctype="multipart/form-data">
	        <div style="font-size: 18px;margin-left: 30px;">添加广告图
	          <span onclick="admin_hide('add_advers')">[ 隐藏 ]</span></div>
	        <p class="line" style="margin-top:0;"></p>
	        <div class="filed fl div_table">
	          <div class="div">
	            <select style="float: left;margin-left: 30px;width:100px;" name="prod_brand" autocomplete="off">
	                <option value="">---品牌选择---</option>
	                <option value="1">---天舒---</option>
	                <option value="2">---康韵---</option>
	              </select>
	          	<input type="hidden" name="carousel_ststic" value="2">

	            <div class="advertising" >
	            <input  type="file" name="advertising"> <span>*[ pjpeg ] [ jpg ] [ gif ] [ png ]格式图片小于1M</span>
	            </div>
	            <br></div>
	        </div>
	        <p style="margin-top:0;margin-top: 10px;"></p>
	        <button  class="submit_advertising" >提交</button>
	        <p style="margin-top:0;margin-top: 10px;"></p>
	      </form>
	    </div>





	    <div id="tab-system">
	      <div class="tabBar cl">
	        <span onclick="adver_click(this,'button')">轮播图配置</span>
	        <span onclick="adver_click(this,'advers')">广告配置</span>
	      </div>
	      <button class="adver" id="button" onclick="advers(this,'button','add_admin')" >添加</button>
	      <button class="adver" id="advers" onclick="advers(this,'advers','add_advers')" style="display: none;">添加</button>
			<div class="page-container button">
				<table class="table table-border table-bordered table-bg">
					<thead>
						<tr class="text-c">
							<th>序号</th>
							<th>品牌</th>
							<th>产品ID</th>
							<th>状态</th>
							<th>产品名称</th>
							<th>轮播图</th>
							<th>IP地址</th>
							<th>操作时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php  foreach ($carousel as $key => $value) {?>
						<tr class="text-c">
							<td><?php  echo $value['id']; ?></td>
							<td><?php  echo $value['prod_brand']==1?'天舒':'康韵'; ?></td>
							<td style="color:<?php echo $value['carousel_show']==1?'blue':'red';?>"><?php echo $value['carousel_show']==1?'显示':'隐藏'; ?></td>	
							<td><?php  echo $value['prod_id']; ?></td>
							<td><?php  echo $value['carousel_name']; ?></td>
							<td><img style="height: 50px;width:200px" src="/<?php  echo $value['carousel_img'];?>"></td>
							<td><?php  echo ip2area($value['carousel_ip']); ?></td>
							<td><?php  echo date('Y-m-d H:i:s',$value['carousel_time']); ?></td>
							<td>
								<a href="javascript:;" onclick="javascript:location.href='__URL__/carousel_del?id=<?php echo $value['id']; ?>&img=<?php  echo $value['carousel_img'];?>'">删除</a><br>
								<?php if($value['carousel_show']==1){?>
								<a  href="javascript:;" onclick="state('<?php  echo $value['id'];?>','0','1')"> [ 隐藏 ] </a>
								<?php  }else if($value['carousel_show']==0){?>
								<a  href="javascript:;" onclick="state('<?php  echo $value['id'];?>','1','1')"> [ 显示 ] </a>
								<?php  }?>

							</td>

						</tr>
						<?php }?>
					</tbody>
				</table>
				
			</div>
			<div class="page-container advers" style="display: none;">
						<table class="table table-border table-bordered table-bg">
					<thead>
						<tr class="text-c">
							<th>序号</th>
							<th>品牌</th>
							<th>状态</th>
							<th>广告图</th>
							<th>IP地址</th>
							<th>操作时间</th>
							<th width="100">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php  foreach ($advertising as $key => $value) {?>
						<tr class="text-c">
							<td><?php  echo $value['id']; ?></td>
							<td><?php  echo $value['prod_brand']==1?'天舒':'康韵'; ?></td>
							<td style="color:<?php echo $value['carousel_show']==1?'blue':'red';?>"><?php echo $value['carousel_show']==1?'显示':'隐藏'; ?></td>
							<td><img style="height: 50px;width:200px" src="/<?php  echo $value['carousel_img'];?>"></td>
							<td><?php  echo ip2area($value['carousel_ip']); ?></td>
							<td><?php  echo date('Y-m-d H:i:s',$value['carousel_time']); ?></td>
							<td>
								<?php  if($value['carousel_show']==0){?>
								<a href="javascript:;" onclick="javascript:location.href='__URL__/carousel_del?id=<?php echo $value['id']; ?>&img=<?php  echo $value['carousel_img'];?>'"> [ 删除 ] </a><br>
								<?php }else{?>
									<a href="javascript:;"> [ 禁止删除 ] </a>
								<?php } if($value['carousel_show']==0){?>
								<a  href="javascript:;" onclick="state('<?php  echo $value['id'];?>','1','2')"> [ 显示 ] </a>
								<?php }?>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
	</div>
	    </div>
	  </article>
  </div>
<script type="text/javascript">
	function advers(obj,id,add){
			if($('#'+add).css('display')=='none'){
			$('#'+add).css('display','block');
			}
	}
	function admin_hide(obj){
		$('#'+obj).css('display','none');
	}

	$(function(){
		$('.skin-minimal input').iCheck({
			checkboxClass: 'icheckbox-blue',
			radioClass: 'iradio-blue',
			increaseArea: '20%'
		});
		$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
	});
	function adver_click(obj,id){
		var obj = $(obj);
		$('.adver').css('display','none');
		$('.page-container').css('display','none');
		$('#'+id).css('display','block');
		$('.'+id).css('display','block');
	}
	function state(id,show,ststic){
		if(ststic==1){
			if(show==0){
				var　carou_show = '隐藏此轮播';
			}else{
				var　carou_show = '显示此轮播';
			}
		}else if(ststic==2){
				var　carou_show = '显示此广告';
		}else{
				layer.msg('非法参数!',{time:3000},{icon:0});
		}
		layer.confirm('确认'+carou_show+'吗？',function(index){
			$.get("__URL__/carousel_ststic",{id:id,carousel_show:show,carousel_ststic:ststic},function(data){
			if(data=='成功'){
				layer.msg(data,{time:3000},{icon:1});
				setTimeout('fresh_page()',1000);  
			}else{
				layer.msg(data,{time:3000},{icon:0});
			}
		});
		
	});
}
function fresh_page(){
window.location.reload();
} 

</script>