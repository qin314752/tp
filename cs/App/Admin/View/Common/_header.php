<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" onclick="location.href='__ROOT__/index.php/<?php echo MODULE_NAME;?>/Index/index'">天舒堂后台</a> 
			<span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.0</span> 
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<div class="logo navbar-logo f-l mr-10 hidden-xs" id="myclock" ></div>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">

					<li class="dropDown dropDown_hover">&nbsp; &nbsp;&nbsp;&nbsp;管理员-<span style="color:red"><?php echo session('adminname'); ?></span> &nbsp;
					<li><a href="javascript:;" onclick="location.href='__ROOT__/index.php/<?php echo MODULE_NAME;?>/Index/cache'">清除缓存</a></li>
					</li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" onclick="location.href='__ROOT__/index.php/<?php echo MODULE_NAME;?>/Index/out'"    class="dropDown_A" >退出</a>
						
			</li>
		</ul>
	</nav>
</div>
</div>
<audio style="display: none;" id="music" src="__PUBLIC__/Admin/mp3.mp3" controls="controls"></audio>
</header>
<script type="text/javascript">
		setInterval("music()",30000); 
	function music(){
		$.get('__ROOT__/index.php/<?php echo MODULE_NAME;?>/Index/index',{id:"music"},function(data){
			if(data){
				document.getElementById("music").play();
			}
		})
	}
</script>
<!--/_header 作为公共模版分离出去-->
