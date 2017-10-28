
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	a:link { text-decoration:none;} /*//未访问：蓝色、无下划线*/   
a:visited {text-decoration:none;} /*//已访问：purple、无下划线*/   
a:active:{text-decoration:none; } /*//激活：红色*/   
a:hover { text-decoration:none;} /*//鼠标移近：红色、下划线*/
.home_error{
	width: auto;
	height:auto;
}
#home_error_img{
	width: auto;
	height: 800px;
	background-image: url('/Public/404.jpg');
	background-repeat: no-repeat;
    background-position:50%;
}
	</style>
</head>
<body>
<div class="home_error">
<div id="home_error_img"></div>
</div>
</body>
</html>
<script type="text/javascript" src="/Public/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript">
	$(function(){
		setTimeout('myrefresh()',3000);
	});
function myrefresh()
{
	window.history.go(-1);
}
</script>