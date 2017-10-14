<include file="Common:_meta" />
<article class="cl pd-20">
	<form action="" method="post" class="form form-horizontal" id="form-admin-role-add">
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="name" name="name" datatype="*4-16" nullmsg="用户账户不能为空">
			</div>
		</div>
			<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>是否启用：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="status" type="radio" id="sex-1" value="1"  checked>
					<label for="sex-1">启用</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2"  value="0" name="status">
					<label for="sex-2">禁用</label>
				</div>
			</div>
		</div>
	<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">网站角色：</label>
			
			<div class="formControls col-xs-8 col-sm-9">
				<!-- 第一层 -->
				<foreach name="node" item="node_list">
					<dl class="permission-list">
						<dt>
							<label>
								<input type="checkbox" value="{$node_list.id}_1" name="access[]" id="user-Character-1">{$node_list.title} </label>
								
						</dt>
					<!-- 第二层 -->
					<foreach name="node_list['child']" item="controller">
						<dd>
							<dl class="cl permission-list2">
								<dt>
									<label class="">
										<input type="checkbox" value="{$controller.id}_2" name="access[]" id="user-Character-1-0">{$controller.title}
									</label>
										
								</dt>
								
								<dd>
							<!-- 第三层 -->
							<foreach name="controller['child']" item="method">
									
									<label class=""><input type="checkbox" value="{$method.id}_3" name="access[]" id="user-Character-1-0-0">{$method.title}</label>
							</foreach>
								</dd>
							</dl>
						</dd>
					</foreach>
					</dl>
				</foreach>
			</div>

		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button type="submit" class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
	</form>
</article>
<include file="Common:_footer" />

<script type="text/javascript">
$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});

	$("#form-admin-role-add").validate({
		rules:{
			name:{
				required:true,
				
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
			type: "post",
			url: "__URL__/add_role",
			success: function (data) {
				if(data == 1){
					window.parent.location.reload();
					window.close()
					
				} else {
					alert('添加失败，请求联系管理员');
				}
			}
			});
			}
	});




});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>