<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="__URL__/data" method="post" class="form form-horizontal" id="form-article-add">
				<div id="tab-system" class="HuiTab">
					<div class="tabBar cl"><span>添加项目</span></div>
		<span class="c-orange "  style="margin-left: 300px;">/****&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;所有选项都需要填写数据&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;****/</span>
			 <div class="tabCon" >
				<div class="row cl dashed" >
					<label class="form-label col-xs-3 col-sm-2">项目名称:</label>
					<span class="formControls col-xs-3 col-sm-3" >
						<input style="height: 25px" type="text" name="prod_name" value="" class="input-text">
					</span>
					<span class="c-orange">*</span>
				</div>
				
				<div class="row cl dashed" >
					<label class="form-label col-xs-3 col-sm-2">团购金额:</label>
					<span class="formControls col-xs-3 col-sm-1" >
						<input style="height: 25px" name="prod_money" type="text" value="" class="input-text"></span>
					<label class="form-label col-xs-3 col-sm-1">门店价金额:</label>
					<span class="formControls col-xs-3 col-sm-1" >
						<input style="height: 25px" name="prod_money_bid" type="text" value="" class="input-text"></span>
					<span class="c-orange">*例如 200.00元</span>
				</div>

				<div class="row cl dashed" >
					<label class="form-label col-xs-3 col-sm-2">上线:</label>
					<span class="formControls col-xs-3 col-sm-3" >
						<div class="formControls skin-minimal">
						<div class="radio-box">
							<input name="prod_stastic" type="radio"  value="1"  checked>
							<label for="sex-1">有效</label>
						</div>
						<div class="radio-box">
							<input type="radio" value="0" name="prod_stastic">
							<label for="sex-2">无效</label>
						</div>
						<div class="radio-box ">
							时间：&nbsp;<input class="input-text" style="width:100px;height:25px" type="text" value="" name="prod_item_time">
							<label for="sex-2">分钟</label>
						</div>
						</div>
					</span>
				</div>
				<div class="row cl dashed" >
					<label class="form-label col-xs-3 col-sm-2">项目等级:</label>
					<span class="formControls col-xs-3 col-sm-1" >
						<select class="select" name="prod_grade" >
		 					<option value="">---请选择---</option>
		 					<option value="1">推荐</option>
		 					<option value="2">新款</option>
		 					<option value="3">普通</option>
						</select>
					</span>
					<label class="form-label col-xs-3 col-sm-1">项目品牌:</label>
					<span class="formControls col-xs-3 col-sm-1" >
						<select class="select" name="prod_address" >
		 					<option value="">---请选择---</option>
		 					<option value="0">天舒</option>
		 					<option value="1">康韵</option>
						</select>
					</span>

					<span class="c-orange">*</span>
				</div>
			
				<div class="row cl dashed" >
					<label class="form-label col-xs-3 col-sm-2">项目图片:</label>

					<span class="formControls col-xs-3 col-sm-4" >
						 <div id="zyupload" class="zyupload"></div>  
					  </span>
					<span class="c-orange" style="margin-left: 100px;">*文件的类型(小于2M) .jpg .JPG .png .PNG .JPEG .jpeg 格式</span>
				</div>
			 	<div class="row cl dashed" >
					<label class="form-label col-xs-3 col-sm-2">结束时间:</label>
					<span class="formControls col-xs-3 col-sm-2" >
						
						<input placeholder="请输入日期" name="prod_time_end" class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
						<script>
						!function(){
						laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
						laydate({elem: '#demo'});//绑定元素
						}();
						</script>
					</span>
					<span class="c-orange">*</span>
				</div>

				
				<div class="row cl dashed" >
					<label class="form-label col-xs-3 col-sm-2">项目简介:</label>
					<span class="formControls col-xs-3 col-sm-5" >
						<script id="editor" type="text/plain" name="prod_prese" style="width:100%;height:150px;"></script></span>
					</span>
					<span class="c-orange " ></span>
				</div>
				
			
			</div>

		</div>
		<div class="row cl ">
			<div class="col-xs-3 col-sm-3 col-xs-offset-3 col-sm-offset-2">
				<button   class="btn btn-primary radius " type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
			</div>
		</div>
	</form>

<include file="Common:_footer" />
 
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


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
<script type="text/javascript">
$(function(){
				// 初始化插件
				$("#zyupload").zyUpload({
					width            :   "505px",                 // 高度
					height           :   "200px",                 // 宽度
					itemWidth        :   "140px",                 // 文件项的宽度
					itemHeight       :   "115px",                 // 文件项的高度
					url              :  '__URL__/upload',              // 上传文件的路径
					fileType         :   ["jpg","JPG","png","PNG","JPEG","jpeg"],// 上传文件的类型
					fileSize         :   51200000,                // 上传文件的大小
					multiple         :   true,                    // 是否可以多个文件上传
					dragDrop         :   false,                   // 是否可以拖动上传文件
					tailor           :   false,                   // 是否可以裁剪图片
					del              :   true,                    // 是否可以删除文件
					finishDel        :   false,  				  // 是否在上传文件完成后删除预览
					/* 外部获得的回调接口 */
					onSelect: function(selectFiles, allFiles){    // 选择文件的回调方法  selectFile:当前选中的文件  allFiles:还没上传的全部文件
						console.info("当前选择了以下文件：");
						console.info(selectFiles);
					},
					onDelete: function(file, files){              // 删除一个文件的回调方法 file:当前删除的文件  files:删除之后的文件
						console.info("当前删除了此文件：");
						console.info(file.name);
					},
					onSuccess: function(file, response){          // 文件上传成功的回调方法
						console.info("此文件上传成功：");
						console.info(file.name);
						console.info("此文件上传到服务器地址：");
						console.info(response);
						$("#uploadInf").append("<p>上传成功，文件地址是：" + response + "</p>");
					},
					onFailure: function(file, response){          // 文件上传失败的回调方法
						console.info("此文件上传失败：");
						console.info(file.name);
					},
					onComplete: function(response){           	  // 上传完成的回调方法
						console.info("文件上传完成");
						console.info(response);
					}
				});
				
			});
</script>
