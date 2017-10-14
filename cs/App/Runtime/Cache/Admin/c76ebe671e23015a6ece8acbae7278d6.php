<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link href="/Public/Admin/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<!-- <link href="/Public/Admin/static/h-ui/css/H-ui.login.css" rel="stylesheet" type="text/css" /> -->
<link href="/Public/Admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/admin.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Admin/static/h-ui/js/H-ui.js"></script>
<title>后台登录 	</title>
</head>
<body >
<div class="loginWraper" >
	<div id="loginform" class="loginBox">
		<form class="form form-horizontal" action="/index.php/admin/Login/login" method="post">
				<div id="admin_login_title">Copyright 天舒堂&nbsp;v3.0</div>
			<div id="admin_login"  >
				<div >账户&nbsp;&nbsp;&nbsp;
					<input name="username" type="text" placeholder="账户" class="input-text size-L radius"><br>
				</div>
				<div>密码&nbsp;&nbsp;&nbsp;
					<input   name="password" type="password" placeholder="密码" class="input-text size-L radius"><br>
				</div>
				<div >验证码
					<input class="input-text size-L radius" type="text" placeholder="验证码" style="width:150px;" name="verify_code">
					<img  src="/index.php/admin/Login/verify_code"  >
					<a class="btn btn-success radius "  href="javascript:location.replace(location.href);" title="刷新" >换一张</a>
				</div>
				<input class="btn btn-success radius "  id="admin_login_submit" type="submit" value="确定">
			</div>
		</form>
	</div>
</div><br>
<div class="footer">Copyright 天舒堂 </div>


</body>
</html>