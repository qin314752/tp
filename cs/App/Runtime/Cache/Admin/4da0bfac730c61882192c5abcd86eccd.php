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

<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="/index.php/admin/Product/update_data" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
				<div id="tab-system" class="HuiTab">
					<div class="tabBar cl">
					<span>产品修改</span>
					</div>
					<div class="tabCon">
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">产品名称：</label>
								<div style="float:left" class="form-label"><input type="text" style="height: 20px;width:400px" value="<?php echo ($prod_update['prod_name']); ?>" name="prod_name"></div>
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">团购金额：</label>
								<div style="float:left" class="form-label"><input class="prod_input" type="text" value="<?php echo ($prod_update['prod_money']); ?>" name="prod_money"><span>元</span></div>
								<div class="form-label " style="float:left;margin-left:20px;">门店价金额：<input class="prod_input" type="text" value="<?php echo ($prod_update['prod_money_bid']); ?>"  name="prod_money_bid"><span>元</span></div>
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">产品品牌：</label>
								<div style="float:left" class="form-label">
								<select style="width:100px;" name="prod_brand" autocomplete="off">
										<option value="">---请选择---</option>
					 					<option value="1" <?php echo ($prod_update['prod_brand']==1?selected:''); ?>>天舒</option>
					 					<option value="2" <?php echo ($prod_update['prod_brand']==2?selected:''); ?>>康韵</option>
								</select>
								</div>

								<div style="float:left;margin-left: 20px" class="form-label">产品种类：
								<select style="width:100px;" name="prod_kind" autocomplete="off">
										<option value="">---请选择---</option>
					 					<option value="1" <?php echo ($prod_update['prod_kind']==1?selected:''); ?>>汗蒸</option>
					 					<option value="2" <?php echo ($prod_update['prod_kind']==2?selected:''); ?>>足浴</option>
					 					<option value="3" <?php echo ($prod_update['prod_kind']==3?selected:''); ?>>推拿</option>
					 					<option value="4" <?php echo ($prod_update['prod_kind']==4?selected:''); ?>>spa养生</option>
					 					<option value="5" <?php echo ($prod_update['prod_kind']==5?selected:''); ?>>中医调理</option>
					 					<option value="6" <?php echo ($prod_update['prod_kind']==6?selected:''); ?>>最新优惠</option>
					 					<option value="7" <?php echo ($prod_update['prod_kind']==7?selected:''); ?>>团购</option>
								</select>
								</div>								

								<div style="float:left;margin-left: 20px" class="form-label">产品等级：
								<select style="width:100px" name="prod_grade" autocomplete="off">
									<option value="">---请选择---</option>
				 					<option value="1" <?php echo ($prod_update['prod_grade']==1?selected:''); ?>>推荐</option>
				 					<option value="2" <?php echo ($prod_update['prod_grade']==2?selected:''); ?>>新款</option>
				 					<option value="3" <?php echo ($prod_update['prod_grade']==3?selected:''); ?>>普通</option>
								</select>
								</div>
						</div>
							<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">上钟时间：</label>
								<div style="float:left" class="form-label"><input class="prod_input"  type="text" value="<?php echo ($prod_update['prod_product_time']); ?>" name="prod_product_time"><span>分钟</span></div>

								<div class="form-label" style="float:left;margin-left:20px;">活动产品：<input type="checkbox" id="prod_activity" onclick="checkit(this.checked)"   name="prod_activity" autocomplete="off" value="<?php echo ($prod_update['prod_activity']); ?>"   ></div>

								<div id="prod_time_end" class="form-label" style="float:left;margin-left:20px;display:none">结束时间：
									<input placeholder="请输入日期"  name="prod_time_end" value="<?php echo ($prod_update['prod_time_end']); ?>" class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
								</div>
								<script type="text/javascript">
								$(function(){
									var value = $('#prod_activity').val();
									if(value==1){
										$('#prod_activity').attr('checked','checked');
										$('#prod_time_end').css('display','');
									}
								});
									function checkit(isChecked){
									 if(isChecked){
										$('#prod_time_end').css('display','');
										$('#prod_activity').val('1');
									 }else{
										$('#prod_time_end').css('display','none');
										$('#prod_activity').val('0');
										}
									}
								</script>
								<div class="form-label" style="float:left;margin-left:20px;">是否赠券：
									<input type="checkbox" onclick="give(this.checked)" id="prod_give_v"  autocomplete="off" value="<?php echo ($prod_update['prod_give']); ?>">
								</div>
									<div id="prod_give" style="display:none">&nbsp;<input type="text" class="prod_input" autocomplete="off" name="prod_give"  value="<?php echo ($prod_update['prod_give']); ?>">元</div>
								<script type="text/javascript">
									$(function(){
									var value = $('#prod_give_v').val();
									if(value){
										$('#prod_give_v').attr('checked','checked');
										$('#prod_give').css('display','');
									}
								});
									function give(isChecked){
									 if(isChecked)
										$('#prod_give').css('display','');
									 else
										$('#prod_give').css('display','none');
									}
								</script>
						</div>

						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">上/下线：</label>
								<div class="form-label " style="float:left;"><input name="prod_stastic" type="radio"  value="1"  <?php echo ($prod_update['prod_stastic']==1?checked:''); ?>><span>有效</span></div>
								<div class="form-label " style="float:left;margin-left:20px;"><input name="prod_stastic" type="radio"  value="0" <?php echo ($prod_update['prod_stastic']==0?checked:''); ?>><span>无效</span></div>
						</div>
						
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">针对部位：</label>
								<div style="float:left" class="form-label  checkbox_input">
								<input type="checkbox" name="prod_part[]" value="1" <?php echo in_array(1,$prod_update['prod_part'])==true?'checked':'' ?>><span>全身</span>
								<input type="checkbox" name="prod_part[]" value="2" <?php echo in_array(2,$prod_update['prod_part'])==true?'checked':'' ?>><span>颈肩</span>
								<input type="checkbox" name="prod_part[]" value="3" <?php echo in_array(3,$prod_update['prod_part'])==true?'checked':'' ?>><span>腿部</span>
								<input type="checkbox" name="prod_part[]" value="4" <?php echo in_array(4,$prod_update['prod_part'])==true?'checked':'' ?>><span>足部</span>
								<input type="checkbox" name="prod_part[]" value="5" <?php echo in_array(5,$prod_update['prod_part'])==true?'checked':'' ?>><span>背部</span>
								<input type="checkbox" name="prod_part[]" value="6" <?php echo in_array(6,$prod_update['prod_part'])==true?'checked':'' ?>><span>脏腑</span>
								<input type="checkbox" name="prod_part[]" value="7" <?php echo in_array(7,$prod_update['prod_part'])==true?'checked':'' ?>><span>经络</span>
								</div>
						</div>
						
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">已购买人数：</label>
								<div style="float:left" class="form-label"><input class="prod_input"   type="text" name="prod_number" value="<?php echo ($prod_update['prod_number']); ?>"><span>人</span></div>
						</div>
						

						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">原有图片：</label>
								<div style="float:left;width:580px;height: 100px;overflow-y :scroll;overflow:auto" class="form-label">
								<img style="width:140px;height:100px;float: left;" src="/<?php echo ($prod_update['prod_img']); ?>">
								</div>
						</div>
						<input type="hidden" name="prod_img_old" value="<?php echo ($prod_update['prod_img']); ?>">
						<input type="hidden" name="id" value="<?php echo ($prod_update['id']); ?>">
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">产品图片：</label>
								<input type="file" name="prod_img" >
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">服务内容：</label>
								<div style="float:left" class="form-label"><textarea id="editor0" type="text/plain" name="prod_service" style="width:550px;height:150px;"><?php echo ($prod_update['prod_service']); ?></textarea></div>
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">适用范围：</label>
								<div style="float:left" class="form-label"><textarea id="editor1" type="text/plain" name="prod_range" style="width:550px;height:100px;"><?php echo ($prod_update['prod_range']); ?></textarea></div>
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">禁忌提示：</label>
								<div style="float:left" class="form-label"><textarea id="editor2" type="text/plain" name="prod_taboo" style="width:550px;height:100px;"><?php echo ($prod_update['prod_taboo']); ?></textarea></div>
						</div>
							
				</div>
				<div class="row cl">
					<div class=" col-sm-3 col-xs-offset-3 col-sm-offset-2">
						<button  class="btn btn-primary radius" type="prod_time_end"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
					</div>
				</div>
			</form>
		</article>
	</div>
</section>
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


<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor0');
    var ue = UE.getEditor('editor1');
    var ue = UE.getEditor('editor2');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e);
         alert(UE.dom.domUtils.preventDefault(e));
    }
      function getPlainTxt() {
        var arr = [];
        // arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        // arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        	$('#prod_prese').val(arr.join("\n"));
        // alert(arr.join('\n'))

    }
  function hasContent() {
        var arr = [];
        // arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        // arr.push("判断结果为：");
        var sre = arr.push(UE.getEditor('editor').hasContents());
        if(arr.join("\n")){
        	getPlainTxt()
        }else{
        	$('#prod_prese').val('空');

        }
        // alert(arr.join("\n"));
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
  
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        // arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        // arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
  
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>
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