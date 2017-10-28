<include file="Common:head" />
<script type="text/javascript">
function jsApiCall()
{
	WeixinJSBridge.invoke(
		'getBrandWCPayRequest',
		<?php echo $jsApiParameters; ?>,
		function(res){
			var msg = res.err_msg; 
			if (msg == "get_brand_wcpay_request:ok") { 
    			location.href = "http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php/Home/Index/orderquery";//设置接收微信支付异步通知回调地址
			 } else { 
				window.history.back();
		 	}

		}
	);
}
$(function()
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
});
</script>
