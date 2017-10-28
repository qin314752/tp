<?php if (!defined('THINK_PATH')) exit();?>

<!--_meta 作为公共模版分离出去-->
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
		产品列表
		<span class="c-gray en">&gt;</span>
		产品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			

			<div class="cl pd-5 bg-1 bk-gray mt-0">
					<form action="/index.php/admin/Product/product_list" method="post">
				<span class="l">
					<input type="hidden" name="kind" value="kind">
				    <select style="width:100px;" name="prod_brand" autocomplete="off">
				    	<option value="">全部产品</option>
				    	<option value="1" <?php echo ($kind['prod_brand']==1?selected:''); ?>>天舒产品</option>
				    	<option value="2" <?php echo ($kind['prod_brand']==2?selected:''); ?>>康韵产品</option>
				    </select> 
				    <select style="width:100px;" name="prod_kind" autocomplete="off">
							<option value="">---请选择---</option>
		 					<option value="1" <?php echo ($kind['prod_kind']==1?selected:''); ?>>汗蒸</option>
		 					<option value="2" <?php echo ($kind['prod_kind']==2?selected:''); ?>>推拿spa-足浴</option>
		 					<option value="3" <?php echo ($kind['prod_kind']==3?selected:''); ?>>推拿spa-推拿</option>
		 					<option value="4" <?php echo ($kind['prod_kind']==4?selected:''); ?>>推拿spa-养生</option>
		 					<option value="5" <?php echo ($kind['prod_kind']==5?selected:''); ?>>推拿spa-中医</option>
		 					<option value="6" <?php echo ($kind['prod_kind']==6?selected:''); ?>>最新优惠</option>
		 					<option value="7" <?php echo ($kind['prod_kind']==7?selected:''); ?>>团购</option>
					</select>
					<select style="width:100px" name="prod_grade" autocomplete="off">
						<option value="">---请选择---</option>
	 					<option value="1" <?php echo ($kind['prod_grade']==1?selected:''); ?>>推荐</option>
	 					<option value="2" <?php echo ($kind['prod_grade']==2?selected:''); ?>>新款</option>
	 					<option value="3" <?php echo ($kind['prod_grade']==3?selected:''); ?>>普通</option>
					</select>
				    <select style="width:100px;" name="prod_stastic" autocomplete="off">
						<option value="">---请选择---</option>
				    	<option value="1" <?php echo ($kind['prod_stastic']==1?selected:''); ?>>上线产品</option>
				    	<option value="0" <?php echo ($kind['prod_stastic']=='0'?selected:''); ?>>下线产品</option>
				    </select>
				    <select style="width:100px;" name="prod_activity" autocomplete="off">
						<option value="">---请选择---</option>
				    	<option value="1" <?php echo ($kind['prod_activity']==1?selected:''); ?>>活动产品</option>
				    	<option value="0" <?php echo ($kind['prod_activity']=='0'?selected:''); ?>>非活动产品</option>
				    </select>

				    <button>查询</button>

				</span>
				</form>
				<span class="r" style="margin-right: 40px">
					<strong>
					
						<?php echo ($product_pag); ?>
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
						<th style="width:50px;height: 50px;">上钟时间</th>
						<th style="width:50px;height: 50px;">活动产品</th>
						<th style="width:70px;height: 50px;">结束时间</th>
						<th style="width:50px;height: 50px;">是否上线</th>
						<th style="width:100px;height: 50px;">针对部位</th>
						<th style="width:40px;height: 50px;">已购买人数</th>
						<th style="width:100px;height: 50px;">服务内容</th>
						<th style="width:100px;height: 50px;">适用范围</th>
						<th style="width:100px;height: 50px;">禁忌提示</th>
						<th style="width:100px;height: 50px;">产品图片</th>
						<th style="width:70px;height: 50px;">添加时间</th>
						<th style="width:50px;height: 50px;">赠券金额</th>
						<th style="width:50px;height: 50px;">操作</th>

					</tr>
				</thead>
				<tbody id="all" >
				<?php foreach ($product_list as $value) {?>
					<tr class="text-c">
						<td><?php echo $value['id'] ?></td>
						<td style="color:red;"><?php echo $value['prod_brand']==1?'天舒':'康韵' ?></td>
						<td><?php echo $value['prod_name'] ?></td>
						<td><?php echo $value['prod_money'] ?></td>
						<td><?php echo $value['prod_money_bid'] ?></td>
						<td><?php echo prod_kind($value['prod_kind']); ?></td>
						<td><?php echo prod_grade($value['prod_grade']); ?></td>
						<td><?php echo $value['prod_product_time']; ?>分钟</td>
						<td style="color:<?php echo $value['prod_activity']==0?'':'red';?>"><?php echo $value['prod_activity']==1?'活动':'普通'; ?></td>
						<td><?php if($value['prod_time_end'])echo date('Y-m-d H:i:s',$value['prod_time_end']); ?></td>
						<td>
						<?php if($value['prod_stastic'] == 1): ?><span class="label label-success radius">上线</span>
						<?php else: ?>
						<span class="label radius">下线</span><?php endif; ?>
						</td>
						<td><?php echo prod_part($value['prod_part']); ?></td>
						<td><?php echo $value['prod_number'] ?></td>
						<td><div style="width:100%;height:50px; overflow-y :scroll;overflow:auto"><?php echo $value['prod_service'] ?></div></td>
						<td><div style="width:100%;height:50px; overflow-y :scroll;overflow:auto"><?php echo $value['prod_range'] ?></div></td>
						<td><div style="width:100%;height:50px; overflow-y :scroll;overflow:auto"><?php echo $value['prod_taboo'] ?></div></td>
						<td><img style="width:100px;height:50px;" src="/<?php echo $value['prod_img']; ?>"></td>
						
						<td><?php echo date('Y-m-d H:i:s',$value['prod_time']); ?></td>
						<td><?php echo $value['prod_give']; ?>元</td>
						<td class="td-manage">
						<a title="编辑" href="/index.php/admin/Product/update?id=<?php echo $value['id'] ?>"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
						<?php  if($value['prod_stastic']){?>
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
function fresh_page(){
window.location.reload();
} 
function admin_del(obj,id,stastic,s){
	layer.confirm('确认要'+s+'此产品吗？',function(index){
		var id1 = id;
		var stastic1 = stastic;
		$.post("/index.php/admin/Product/stastic",{id:id1,stastic:stastic1},function(data){
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