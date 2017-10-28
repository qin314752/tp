<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/static/h-ui.admin/css/style.css" />
<title>天舒堂 v3.0</title>
<!-- 自定义样式  -->
<link rel="stylesheet" href="/Public/Admin/admin.css" type="text/css">
<script src="/Public/Home/js/jquery-3.2.1.min.js"></script>
<!-- 自定义样式 END -->
<!-- time -->
<!-- <link rel="stylesheet" href="/Public/Admin/time/time.css" type="text/css"> -->
<!-- <script type="text/javascript" src="/Public/Admin/time/time.js"></script>  -->
</head>
<body>


<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" onclick="location.href='/index.php/<?php echo MODULE_NAME;?>/Index/index'">天舒堂后台</a> 
			<span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.0</span> 
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<div class="logo navbar-logo f-l mr-10 hidden-xs" id="myclock" ></div>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">

					<li class="dropDown dropDown_hover">&nbsp; &nbsp;&nbsp;&nbsp;管理员-<span style="color:red"><?php echo session('adminname'); ?></span> &nbsp;
					<li><a href="javascript:;" onclick="location.href='/index.php/<?php echo MODULE_NAME;?>/Index/cache'">清除缓存</a></li>
					</li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" onclick="location.href='/index.php/<?php echo MODULE_NAME;?>/Index/out'"    class="dropDown_A" >退出</a>
						
			</li>
		</ul>
	</nav>
</div>
</div>
<audio style="display: none;" id="music" src="/Public/Admin/mp3.mp3" controls="controls"></audio>
</header>
<script type="text/javascript">
		setInterval("music()",30000); 
	function music(){
		$.get('/index.php/<?php echo MODULE_NAME;?>/Index/index',{id:"music"},function(data){
			if(data){
				document.getElementById("music").play();
			}
		})
	}
</script>
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">
	

<div class="menu_dropdown bk_2">
	
		<?php  foreach($menu_top as $v){ ?>
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> <?php echo $v[0] ?><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			
			<dd>
				<ul>
		<?php  foreach($v['low_title'] as $num){ ?>
					<li><a href="javascript:;" onclick="location.href='<?php echo $num[1] ?>'"><?php echo $num[0] ?></a></li>
		<?php }?>
				</ul>
			</dd>

		</dl>
		<?php }?>
				 
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!--/_menu 作为公共模版分离出去-->

<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		订单管理
		<span class="c-gray en">&gt;</span>
		订单列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>	
	<div class="Hui-article">
		<article class="cl pd-20">
			
			
			<div class="cl pd-5 bg-1 bk-gray mt-0">
					<form action="/index.php/admin/Indent/indent_list" method="post">
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
						<?php echo ($indent_num); ?>
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
						<th>赠券金额</th>
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
						<th width="100"><?php if($value['prod_give'])echo $value['prod_give'] ?>元</th>
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
						<a href="javascript:;" onclick="refund('<?php echo $value['id']?>','<?php echo $value['trade_type']?>','<?php echo $value['cash_fee']; ?>')"> [ 取消订单 ] </a>
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


<!--_footer 作为公共模版分离出去-->

<script type="text/javascript" src="/Public/Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/Admin/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本 -->
<script type="text/javascript" src="/Public/Admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/Public/Admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Public/Admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 

<!--请在下方写此页面业务相关的脚本 -->
<script type="text/javascript" src="/Public/Admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/Public/Admin/lib/laypage/1.2/laypage.js"></script>

<script type="text/javascript" src="/Public/Admin/static/h-ui/js/H-ui.min.js"></script> 
<!-- 时间 插件-->
<script src="/Public/time/laydate/laydate.js"></script>

<!-- 编辑器 插件 -->
<script type="text/javascript" charset="utf-8" src="/Public/Admin/editor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/editor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/Public/Admin/editor/lang/zh-cn/zh-cn.js"></script>

<!-- <script type="text/javascript" src="/Public/Upload/zyupload/zyupload.basic-1.0.0.min.js"></script> -->


<script type="text/javascript">

function admin_stop(id){
	layer.open({
	  type: 2,
	  title: '确认码比对',
	  shadeClose: true,
	  shade: 0.6, 
	  // area: ['100%', '100%'],
	  area: ['400px', '200px'],
	  content: ['/index.php/admin/Indent/nonce?id='+id,'no'],
	  
	}); 
}

function affirm(id){
	layer.confirm('确认要消费吗？',{icon: 3},function(index){
	$.post("/index.php/admin/Indent/affirm",{id:id},function(data){
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


function refund(id,static,money){
	layer.confirm('确认要取消订单吗？',function(index){
		if(money>0){
			$.post('/index.php/admin/Indent/refund_data',{id:id,trade_type:static},function(data){
				if(data=='成功'){
		    		layer.open({title: false,closeBtn: 0,time: 4000,content: '取消订单成功',}); 
		    		setTimeout('myrefresh()',1000);
				}else{
		    		layer.open({title: false,closeBtn: 0,content: data,}); 
				}
			});
		}else{
		    		layer.open({title: false,closeBtn: 0,content: '金额为0元的无法退单'}); 
		}
	});
}
</script>