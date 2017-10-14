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
</header>
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
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">

		<article class="cl pd-20">
		<div id='add_admin' style="display: none;">
		   <form action="/index.php/admin/Global/add_address" method="post">
			<div  style="color:#427FB8;font-size: 18px;margin-left: 30px;">添加地址<span id="admin_hide"> [ 隐藏 ]</span> </div>
				<p class="line" style="margin-top:0;"></p>
		<div class="filed fl div_table">
			<div class="div">
			<select style="float: left;margin-left: 30px;width:100px;" name="prod_brand" autocomplete="off">
				<option value="">---产品地址---</option>
				<option value="1">天舒产品地址</option>
				<option value="2">康韵产品地址</option>
			</select>
					<div style="float: left;margin-left: 10px;">
						<span >店面名称</span><input style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name="address_name">
						<span >客服电话</span><input style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name="address_phone">
						<span >地址</span><input style="border:1px solid #ddd;width:300px;height: 20px;margin:auto 10px" type="text" name="address">
					</div>
					<br>
			</div>
		</div>
		<p  style="margin-top:0;margin-top: 10px;"></p>
			<button class="submit_advertising">提交</button>
		<p style="margin-top:0;margin-top: 10px;"></p>
		</form>
     </div>
				<div id="tab-system">
					<div class="tabBar cl"><span>地址配置</span></div>
					<button id="button"  >添加地址</button>
					<div class="tabCon">
						

						<div id="form_list" style="margin-bottom: 20px;" >
						<?php foreach ($address as $key => $value) {?>
					<form action="/index.php/admin/Global/save_address" method="post" class="form form-horizontal" id="<?php echo $value['id']?>">
						
							<div style="float: left;margin-left: 150px;margin-bottom: 5px">
								<input type="hidden" name="id" value="<?php echo $value['id']?>">
								<select style="width:100px;" name="prod_brand" disabled="disabled" autocomplete="off">
							    	<option value="1" <?php echo $value['prod_brand']==1?'selected':''?>>天舒产品地址</option>
							    	<option value="2" <?php echo $value['prod_brand']==2?'selected':''?>>康韵产品地址</option>
							    </select>
								<span >店面名称</span><input disabled="disabled" style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name='address_name' value="<?php echo $value['address_name'] ?>">
								<span >客服电话</span><input disabled="disabled" style="border:1px solid #ddd;height: 20px;margin:auto 10px" type="text" name='address_phone' value="<?php echo $value['address_phone'] ?>">
								<span >地址</span><input disabled="disabled" style="border:1px solid #ddd;width:300px;height: 20px;margin:auto 10px" type="text" name='address' value="<?php echo $value['address'] ?>">
								<a href="javascript:;" class="update" val='<?php echo $value['id']?>'>[ 修改 ]</a> |
								<a href="javascript:;" onclick="javascript:location.href='/index.php/admin/Global/carousel_del?id=<?php echo $value['id']?>&address_static=0&address_name=<?php echo $value['address_name']?>' " > [ 作废 ]</a>
							</div>
							</form>
						<?php }?>
						</div>
					</div>
				</div>
			</form>
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

<script>
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
	$('#form_list').find('input').attr('disabled','disabled');
	$('#form_list').find('select').attr('disabled','disabled');
});
$('#button').click(function(){
	if($('#add_admin').css('display')=='none'){
	$('#add_admin').css('display','block');
	}
});
$('#admin_hide').click(function(){
	$('#add_admin').css('display','none');
});
$('.update').click(function(){
	var obj = $(this);
	obj.siblings('[disabled=disabled]').removeAttr('disabled');
	obj.text('[ 保存 ]');
	var id = obj.attr('val');
	obj.attr('onclick','submits('+id+')');
});
function submits(id){
	$('#'+id).submit();
}
</script>