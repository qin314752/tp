<script type="text/javascript" src="__PUBLIC__/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<!-- <script type="text/javascript" src="__PUBLIC__/Admin/lib/layer/2.4/layer.js"></script> -->
<script type="text/javascript" src="__PUBLIC__/Admin/layer/layer.js"></script>
<?php if(isset($message)) {?>

<p style="display: none;" class="success"><?php echo($message); ?></p>
<?php }else{?>

<p style="display: none;" class="error"><?php echo($error); ?></p>
<?php }?>

<a id="href" href="<?php echo($jumpUrl); ?>"></a><b style="display: none;" id="wait"><?php echo($waitSecond); ?></b>

</div>
<script type="text/javascript">
	$(function(){
		var error = $('.error').text();
		var success = $('.success').text();
			
			
		if(error){
			if(error=='没有权限'){
				var	icon = 0;
			}else{
				var	icon = 2;
			}
			
   			var index=layer.msg('<span style="font-size: 20px;">'+error+'</span>', {time: 3000, icon:icon});
		}else if(success){
   			var index=layer.msg(success, {time: 3000, icon:1});
		}else{
   			var index=layer.msg('错误', {time: 3000, icon:3});
		}
			layer.style(index, {
			'color':"#0864C0",
			'width':'100%',
			'left':'38%',
			'top':'28%',

			});
		var wait = document.getElementById('wait'),href = document.getElementById('href').href;
		var interval = setInterval(function(){
			var time = --wait.innerHTML;
			if(time <= 0) {
				location.href = href;
				clearInterval(interval);
			};
		}, 1000);
	});
</script>
