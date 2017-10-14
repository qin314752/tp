<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<include  file="Common:_footer" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> 
	</nav>
	<div class="admin_list">
			<div class="manage">
				<a href="javascript:;" onclick="location.href='__ROOT__/index.php/<?php echo MODULE_NAME;?>/Members/user_list'"><div class="manage_h">会员列表</div><a>
				<a href="javascript:;" onclick="location.href='__ROOT__/index.php/<?php echo MODULE_NAME;?>/Indent/indent_list'"><div class="manage_d">订单列表</div><a>
				<a href="javascript:;" onclick="location.href='__ROOT__/index.php/<?php echo MODULE_NAME;?>/Index/capital'"><div class="manage_z">资金统计</div><a>
				<a href="javascript:;" onclick="location.href='__ROOT__/index.php/<?php echo MODULE_NAME;?>/Index/opinion'"><div class="manage_t">意见反馈</div> <a>
				<a href="javascript:;" onclick="location.href='__ROOT__/index.php/<?php echo MODULE_NAME;?>/Index/inform'"><div class="manage_x">系统通知 ( <span><?php if($str<500){echo 1;}else{echo 0;}?></span> )</div> <a>
			</div>		
		<div class="admin_center">
			<div class="center_title">个人信息</div>
			<div class="title_div">
				<div>您好：<?php echo  session('adminname');?></div>
				<div>所属角色：<?php echo $name;?></div>
				<div>登录IP：<?php echo ip2area(get_client_ip());?></div>
			</div>

		</div>
		<div class="admin_center">
			<div class="center_title">系统信息</div>
			<div class="title_div">
				<div>操作系统：<?php echo php_uname();?></div>
				<div>服务器协议：<?php echo $_SERVER['SERVER_PROTOCOL'];?></div>
				<div>运行环境：<?php echo $_SERVER['SERVER_SOFTWARE'];?></div>
				<div>PHP版本：<?php echo PHP_VERSION;?></div>
				<div>MySQL版本：<?php mysql_connect(C('DB_HOST'),C('DB_USER'),C('DB_PWD')); echo mysql_get_server_info();?></div>
			</div>
		</div>
	</div>
</section>

