<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <title>微信支付样例-支付</title>
    <script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				alert(res.err_code+res.err_desc+res.err_msg);
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
	<script type="text/javascript">
	//获取共享地址
	function editAddress()
	{
		WeixinJSBridge.invoke(
			'editAddress',
			<?php echo $editAddress; ?>,
			function(res){
				var value1 = res.proviceFirstStageName;
				var value2 = res.addressCitySecondStageName;
				var value3 = res.addressCountiesThirdStageName;
				var value4 = res.addressDetailInfo;
				var tel = res.telNumber;
				
				alert(value1 + value2 + value3 + value4 + ":" + tel);
			}
		);
	}
	
	window.onload = function(){
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', editAddress, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', editAddress); 
		        document.attachEvent('onWeixinJSBridgeReady', editAddress);
		    }
		}else{
			editAddress();
		}
	};
	
	</script>
</head>
<body>
    <br/>
    <font color="#9ACD32"><b>该笔订单支付金额为<span style="color:#f00;font-size:50px">1分</span>钱</b></font><br/><br/>
	<div align="center">
		<button style="width:210px; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onclick="callpay()" >立即支付</button>
	</div>
</body>
</html>
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
	    		location.href = "http://<?php echo $_SERVER['HTTP_HOST']?>/index.php/Home/Index/shopping";//设置接收微信支付异步通知回调地址
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