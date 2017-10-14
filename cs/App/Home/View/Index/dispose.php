<!DOCTYPE html>
<html lang="zh-CN" style="font-size: 10px;">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<meta http-equiv="content-type" content="txt/html; charset=utf-8" />
	<meta id="scale" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no,minimum-scale=1.0, maximum-scale=1.0">
</head>
<body>
<div style="display: none" id="dispose" onclick="callpay()"></div>
</body>
</html>
    <script type="text/javascript">
    document.getElementById("dispose").click();
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				var msg = res.err_msg; 
			 if (msg == "get_brand_wcpay_request:ok") { 
        	// alert("支付成功，跳转到订单详情页"); 
        	location.href = "http://qinzhongyuan.top/index.php/Home/Index/userlist";//设置接收微信支付异步通知回调地址
   			 } else { 
       	 	if (msg == "get_brand_wcpay_request:cancel") { 
            var err_msg = "您取消了微信支付"; 
        	} else if (res.err_code == 3) { 
            var err_msg = "您正在进行跨号支付正在为您转入扫码支付......"; 
        	} else if (msg == "get_brand_wcpay_request:fail") { 
            var err_msg = "微信支付失败错误信息：" + res.err_desc; 
        	} else { 
            var err_msg = msg + "" + res.err_desc; 
        	} 
        		alert(err_msg); 
        	location.href = "http://qinzhongyuan.top/index.php/Home/Index/userlist";//设置接收微信支付异步通知回调地址
   		 	}	
		}
		);
	}

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
