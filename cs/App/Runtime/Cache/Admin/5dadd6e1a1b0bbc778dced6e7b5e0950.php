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
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="/index.php/admin/Notice/template_data" method="post" class="form form-horizontal" id="form-article-add">
				<div id="tab-system" class="HuiTab">
				<div style="color:#1E325C;font-size: 16px">通知信息模板管理---(#UserName#表示接受信息用户的用户名，是一个动态参数，包含#号整体,表示用户名)</div>
					<div class="tabBar cl">
					<!-- <span>邮件设置</span> -->
					<span>短信模板</span>
					</div>
				<!-- 	<div class="tabCon">
						<div class="row cl dashed" >
							<label class="form-label col-xs-3 col-sm-2">用户注册成功:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="email_regsuccess" class="textarea_color" ><?php echo ($emailtxt['email_regsuccess']); ?></textarea> 
							</div>
							<span class="c-orange">#LINK#表示激活链接，只在此邮件下有用</span>
						</div>
						<div class="row cl dashed" >
							<label class="form-label col-xs-3 col-sm-2">安全中心更改安全问题:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="email_safecode"  class="textarea_color" ><?php echo ($emailtxt['email_safecode']); ?></textarea> 
							</div>
							<span class="c-orange">#CODE#表示验证码</span>
						</div>
						<div class="row cl dashed" >
							<label class="form-label col-xs-3 col-sm-2">安全中心新手机安全码:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="email_changephone"  class="textarea_color" ><?php echo ($emailtxt['email_changephone']); ?></textarea> 
							</div>
							<span class="c-orange">#CODE#表示验证码</span>
						</div>
						<div class="row cl dashed" >
							<label class="form-label col-xs-3 col-sm-2">密码找回提示:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="email_getpass"  class="textarea_color" ><?php echo ($emailtxt['email_getpass']); ?></textarea> 
							</div>
							<span class="c-orange">#LINK#表示密码找回链接，只在此邮件下有用</span>
						</div>
						<div class="row cl dashed" >
							<label class="form-label col-xs-3 col-sm-2">支付密码找回提示:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="email_getpaypass"  class="textarea_color" ><?php echo ($emailtxt['email_getpaypass']); ?></textarea> 
							</div>
							<span class="c-orange">#LINK#表示支付密码找回链接，只在此邮件下有用</span>
						</div>
					</div> -->

					<div class="tabCon">
					<span class="c-orange" style="margin-left: 170px;">【注】：模板内容不要太长，不要包含违法关键字，内容结尾请加网站签名，网站签名格式为：【网站名称】，这样可加快邮件接收速度！</span>
						<div class="row cl dashed">
							<label class="form-label col-xs-3 col-sm-2">用户注册成功:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="regsuccess"  class="textarea_color" ><?php echo ($smstxt['regsuccess']); ?></textarea> 
							</div>
						</div>
						<div class="row cl dashed" name="payonline">
							<label class="form-label col-xs-3 col-sm-2">线上充值成功:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="payonline"  class="textarea_color" ><?php echo ($smstxt['payonline']); ?></textarea> 
							</div>
							<span class="c-orange">#USERANEM#表示用户名,#DATE#表示充值日期,#MONEY#表示充值金额</span>
						</div>

						<div class="row cl dashed" name="withdraw">
							<label class="form-label col-xs-3 col-sm-2">产品购买通知:</label>
							<div class="formControls col-xs-8 col-sm-3">
								<textarea name="withdraw"  class="textarea_color" ><?php echo ($smstxt['withdraw']); ?></textarea> 
							</div>
							<span class="c-orange">#USERANEM#表示用户名,#DATE#表示提现日期，#MONEY#表示金额</span>
						</div>
	
					</div>
				</div>
				<div class="row cl">
					<div class="col-xs-8 col-sm-3 col-xs-offset-3 col-sm-offset-2">
						<button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
						<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
						<span>(所有方式修改提交一次即可)</span>
					</div>
				</div>
				<div style="color:#1E325C;font-size: 16px">#UserName#表示接受信息用户的用户名，是一个动态参数,如" #UserName#你好，恭喜您注册成功",那么用户'test'收到的信息就是 "test你好，恭喜您注册成功"</div>
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

<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
});
</script>