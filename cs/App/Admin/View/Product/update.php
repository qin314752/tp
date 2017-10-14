<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<include file="Common:_footer" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="__URL__/update_data" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
				<div id="tab-system" class="HuiTab">
					<div class="tabBar cl">
					<span>产品修改</span>
					</div>
					<div class="tabCon">
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">产品名称：</label>
								<div style="float:left" class="form-label"><input type="text" style="height: 20px;width:400px" value="{$prod_update['prod_name']}" name="prod_name"></div>
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">团购金额：</label>
								<div style="float:left" class="form-label"><input class="prod_input" type="text" value="{$prod_update['prod_money']}" name="prod_money"><span>元</span></div>
								<div class="form-label " style="float:left;margin-left:20px;">门店价金额：<input class="prod_input" type="text" value="{$prod_update['prod_money_bid']}"  name="prod_money_bid"><span>元</span></div>
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">产品品牌：</label>
								<div style="float:left" class="form-label">
								<select style="width:100px;" name="prod_brand" autocomplete="off">
										<option value="">---请选择---</option>
					 					<option value="1" {$prod_update['prod_brand']==1?selected:''}>天舒</option>
					 					<option value="2" {$prod_update['prod_brand']==2?selected:''}>康韵</option>
								</select>
								</div>

								<div style="float:left;margin-left: 20px" class="form-label">产品种类：
								<select style="width:100px;" name="prod_kind" autocomplete="off">
										<option value="">---请选择---</option>
					 					<option value="1" {$prod_update['prod_kind']==1?selected:''}>汗蒸</option>
					 					<option value="2" {$prod_update['prod_kind']==2?selected:''}>足浴</option>
					 					<option value="3" {$prod_update['prod_kind']==3?selected:''}>推拿</option>
					 					<option value="4" {$prod_update['prod_kind']==4?selected:''}>spa养生</option>
					 					<option value="5" {$prod_update['prod_kind']==5?selected:''}>中医调理</option>
					 					<option value="6" {$prod_update['prod_kind']==6?selected:''}>最新优惠</option>
								</select>
								</div>								

								<div style="float:left;margin-left: 20px" class="form-label">产品等级：
								<select style="width:100px" name="prod_grade" autocomplete="off">
									<option value="">---请选择---</option>
				 					<option value="1" {$prod_update['prod_grade']==1?selected:''}>推荐</option>
				 					<option value="2" {$prod_update['prod_grade']==2?selected:''}>新款</option>
				 					<option value="3" {$prod_update['prod_grade']==3?selected:''}>普通</option>
								</select>
								</div>
						</div>
							<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">上钟时间：</label>
								<div style="float:left" class="form-label"><input class="prod_input"  type="text" value="{$prod_update['prod_product_time']}" name="prod_product_time"><span>分钟</span></div>

								<div class="form-label" style="float:left;margin-left:20px;">活动产品：<input type="checkbox" id="prod_activity" onclick="checkit(this.checked)"   name="prod_activity" autocomplete="off" value="{$prod_update['prod_activity']}"   ></div>

								<div id="prod_time_end" class="form-label" style="float:left;margin-left:20px;display:none">结束时间：
									<input placeholder="请输入日期"  name="prod_time_end" value="{$prod_update['prod_time_end']}" class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
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
						</div>

						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">上/下线：</label>
								<div class="form-label " style="float:left;"><input name="prod_stastic" type="radio"  value="1"  {$prod_update['prod_stastic']==1?checked:''}><span>有效</span></div>
								<div class="form-label " style="float:left;margin-left:20px;"><input name="prod_stastic" type="radio"  value="0" {$prod_update['prod_stastic']==0?checked:''}><span>无效</span></div>
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
								<div style="float:left" class="form-label"><input class="prod_input"   type="text" name="prod_number" value="{$prod_update['prod_number']}"><span>人</span></div>
						</div>
						

						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">原有图片：</label>
								<div style="float:left;width:580px;height: 100px;overflow-y :scroll;overflow:auto" class="form-label">
								<img style="width:140px;height:100px;float: left;" src="__ROOT__/{$prod_update['prod_img']}">
								</div>
						</div>
						<input type="hidden" name="prod_img_old" value="{$prod_update['prod_img']}">
						<input type="hidden" name="id" value="{$prod_update['id']}">
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">产品图片：</label>
								<input type="file" name="prod_img" >
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">服务内容：</label>
								<div style="float:left" class="form-label"><textarea id="editor0" type="text/plain" name="prod_service" style="width:550px;height:150px;">{$prod_update['prod_service']}</textarea></div>
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">适用范围：</label>
								<div style="float:left" class="form-label"><textarea id="editor1" type="text/plain" name="prod_range" style="width:550px;height:100px;">{$prod_update['prod_range']}</textarea></div>
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">禁忌提示：</label>
								<div style="float:left" class="form-label"><textarea id="editor2" type="text/plain" name="prod_taboo" style="width:550px;height:100px;">{$prod_update['prod_taboo']}</textarea></div>
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