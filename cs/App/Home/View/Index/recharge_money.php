<include file="Common:head" />
<button id="btn" onclick="callpay()" ></button>
<script type="text/javascript">
	
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>
			function(res){
				var msg = res.err_msg; 
			 if (msg == "get_brand_wcpay_request:ok") { 
	    	// alert("支付成功，跳转到订单详情页"); 
	    		location.href = "http://<?php echo $_SERVER['HTTP_HOST']?>/index.php/Home/Index/userlist";//设置接收微信支付异步通知回调地址
				 } else { 
	       	 	if (msg == "get_brand_wcpay_request:cancel") { 
	            var err_msg = "您取消了微信支付"; 
	        	location.href = "http://<?php echo $_SERVER['HTTP_HOST']?>/index.php/Home/Index/{$error}";//设置接收微信支付异步通知回调地址
	        	} else if (res.err_code == 3) { 
	            var err_msg = "您正在进行跨号支付正在为您转入扫码支付......"; 
	        	location.href = "http://<?php echo $_SERVER['HTTP_HOST']?>/index.php/Home/Index/{$error}";//设置接收微信支付异步通知回调地址
	        	} else if (msg == "get_brand_wcpay_request:fail") { 
	            var err_msg = "微信支付失败错误信息：" + res.err_desc; 
	        	location.href = "http://<?php echo $_SERVER['HTTP_HOST']?>/index.php/Home/Index/{$error}";//设置接收微信支付异步通知回调地址
	        	} else { 
	            var err_msg = msg + "" + res.err_desc; 
	        	location.href = "http://<?php echo $_SERVER['HTTP_HOST']?>/index.php/Home/Index/{$error}";//设置接收微信支付异步通知回调地址
	        	} 
			 	}	
		}
		);
	}

var i = 1;
$(function(){
	if(i==1){
		document.getElementById("btn").click()
		i=0;
	}else{
		location.href = "http://<?php echo $_SERVER['HTTP_HOST']?>/index.php/Home/Index/userlist";//设置接收微信支付异步通知回调地址
	}
});
function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
</script>