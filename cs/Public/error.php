<!DOCTYPE html>
<html style="font-size: 10px">
<head>
	<style type="text/css">
.home_error{
	width: auto;
	height:auto;
}
#home_error_img{
	width: auto;
	height: 800px;
	background-image: url('/Public/error.jpg');
	background-repeat: no-repeat;
    background-position:50%;
}
	</style>
</head>
<body>

</body>
</html>
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