<include file="Common:_meta" />
<include file="Common:_header" />
<include file="Common:_menu" />
<include file="Common:_footer" />
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<form action="__URL__/data" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
				<div id="tab-system" class="HuiTab">
					<div class="tabBar cl">
					<span>产品添加</span>
					</div>
					<div class="tabCon">
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">产品名称：</label>
								<div style="float:left" class="form-label"><input type="text" style="height: 20px;width:400px" name="prod_name"></div>
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">团购金额：</label>
								<div style="float:left" class="form-label"><input class="prod_input" type="text" name="prod_money"><span>元</span></div>
								<div class="form-label " style="float:left;margin-left:20px;">门店价金额：<input class="prod_input" type="text" name="prod_money_bid"><span>元</span></div>
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">产品品牌：</label>
								<div style="float:left" class="form-label">
								<select style="width:100px;" name="prod_brand">
										<option value="">---请选择---</option>
					 					<option value="1">天舒</option>
					 					<option value="2">康韵</option>
								</select>
								</div>

								<div style="float:left;margin-left: 20px" class="form-label">产品种类：
								<select style="width:100px;" name="prod_kind">
										<option value="">---请选择---</option>
					 					<option value="1">汗蒸</option>
					 					<option value="2">推拿spa--足浴</option>
					 					<option value="3">推拿spa--推拿</option>
					 					<option value="4">推拿spa--养生</option>
					 					<option value="5">推拿spa--中医</option>
					 					<option value="6">最新优惠</option>
					 					<option value="7">团购</option>
								</select>
								</div>								

								<div style="float:left;margin-left: 20px" class="form-label">产品等级：
								<select style="width:100px" name="prod_grade">
									<option value="">---请选择---</option>
				 					<option value="1">推荐</option>
				 					<option value="2">新款</option>
				 					<option value="3">普通</option>
								</select>
								</div>
						</div>
							<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">上钟时间：</label>
								<div style="float:left" class="form-label"><input class="prod_input"  type="text" name="prod_product_time"><span>分钟</span></div>

								<div class="form-label" style="float:left;margin-left:20px;">活动产品：
									<input type="checkbox" onclick="checkit(this.checked)" name="prod_activity" autocomplete="off" value="1"></div>

								<div id="prod_time_end" class="form-label" style="float:left;margin-left:20px;display:none">结束时间：
									<input placeholder="请输入日期" name="prod_time_end" class="laydate-icon" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
								</div>
								<script type="text/javascript">
									function checkit(isChecked){
									 if(isChecked)
										$('#prod_time_end').css('display','');
									 else
										$('#prod_time_end').css('display','none');
									}
								</script>
								<div class="form-label" style="float:left;margin-left:20px;">是否赠券：
									<input type="checkbox" onclick="give(this.checked)"  autocomplete="off" value="1">
								</div>
									<div id="prod_give" style="display:none">&nbsp;<input type="text" class="prod_input" autocomplete="off" name="prod_give"  value="">元</div>
								<script type="text/javascript">
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
								<div class="form-label " style="float:left;"><input name="prod_stastic" type="radio"  value="1" checked ><span>上线</span></div>
								<div class="form-label " style="float:left;margin-left:20px;"><input name="prod_stastic" type="radio"  value="0" ><span>下线</span></div>
						</div>
						
						
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">针对部位：</label>
								<div style="float:left" class="form-label  checkbox_input">
						<input type="checkbox" name="prod_part[]" value="1" checked><span>全身</span>
								<input type="checkbox" name="prod_part[]" value="2"><span>颈肩</span>
								<input type="checkbox" name="prod_part[]" value="3"><span>腿部</span>
								<input type="checkbox" name="prod_part[]" value="4"><span>足部</span>
								<input type="checkbox" name="prod_part[]" value="5"><span>背部</span>
								<input type="checkbox" name="prod_part[]" value="6"><span>脏腑</span>
								<input type="checkbox" name="prod_part[]" value="7"><span>经络</span>
								</div>
						</div>
						
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">已购买人数：</label>
								<div style="float:left" class="form-label"><input class="prod_input"   type="text" name="prod_number" value="0"><span>人</span></div>
						</div>

						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">产品图片：</label>
								<input type="file" name="prod_img">
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">服务内容：</label>
								<div style="float:left" class="form-label"><script id="editor0" type="text/plain" name="prod_service" style="width:550px;height:150px;"></script></div>
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">适用范围：</label>
								<div style="float:left" class="form-label"><script id="editor1" type="text/plain" name="prod_range" style="width:550px;height:100px;"></script></div>
						</div>
						<div class="row cl dashed "  >
								<label class="form-label  col-sm-2">禁忌提示：</label>
								<div style="float:left" class="form-label"><script id="editor2" type="text/plain" name="prod_taboo" style="width:550px;height:100px;"></script></div>
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
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor0');
    var ue = UE.getEditor('editor1');
    var ue = UE.getEditor('editor2');
</script>
