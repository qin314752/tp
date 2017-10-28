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

	<div style="font-size: 14px;font-weight: bold;color: #1e325c;margin:5px 0 0 20px;">调整余额</div>
<div style="width: 90%;margin-left: 5%;height: 500px">
	<div class="dashed " style="width: 100%;margin-top: 10px;" >
		<div style="-float: left;width: 560px;margin:5px auto;">
			<span style="float: left;">可用余额：</span>
			<input type="text" style="width:250px;float:left;height:20px;" name="user_money">&nbsp;
			<span class="c-orange">* 如果是减少余额,请填负数,如'-100'</span>
		</div>
	</div>
	<div class="dashed " style="width: 100%;margin-top: 10px;" >
		<div style="-float: left;width: 560px;margin: 5px auto;">
			<span style="float: left;">变动原因：</span>
			<input type="text" style="width:250px;float:left;height:20px;" name="money_cause">&nbsp;
			<span class="c-orange">*</span>
		</div>
	</div>

	<input type="hidden" name="id" value="<?php echo ($id); ?>">
	<div style="border: 1px solid #9cb8cc;"></div>
	<button -type="button"  onclick="bloa()" style="margin:15px 0px 0px 56px;width: 60px;height: 28px;line-height:28px;text-align: center ;background-color: #567ab4;color: #fff;">确定</button>
	<script type="text/javascript">
		function bloa(){
			var user_money = $('[name=user_money]').val();
			var money_cause = $('[name=money_cause]').val();
			var id = $('[name=id]').val();
			$.post('/index.php/admin/Members/user_upmoney',{id:id,user_money:user_money,money_cause:money_cause},function(data){
				if(data=='成功'){
					layer.open({title: false,closeBtn: 0,time: 4000,content: data});
					parent.location.reload(); // 父页面刷新
	                var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
	                parent.layer.close(index);
				}else{
					layer.open({title: false,closeBtn: 0,content: data});
				}
			});
		}
	</script>

</div>