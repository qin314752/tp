<include file="Common:head" />
    <script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				var msg = res.err_msg; 
				if (msg == "get_brand_wcpay_request:ok") { 
	    			location.href = "http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php/Home/Index/orderquery";//设置接收微信支付异步通知回调地址
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
	<div class="recharge_list">
		<div align="center" style="font-size: 1.8rem;border-bottom: 1px solid #CBCBCB;padding:0.5rem 0rem;" >支付选择</div>
		<div align="center" class="pay_money">￥<span id="money">{$money}</span></div>
		<div class="pay_money_user" style="color:#000;">支付账号 <span style="color:#000;"><?php echo session('user_phone')?></span></div>
		<div class="pay_money_user" style="color:#000;" onclick="give_data()">优惠券 <i style="font-size: 1.2rem;">(不能和会员折扣公用)</i> <span id="give_text" style="color:#000;">使用></span></div>
		<div class="pay_money_user">余额支付 <div class="pay_color" ><div class="pay_color_w" onclick="pay_money(this,'pay_y')"  -id="pay_y" style="background-color: #50B34B;"></div></div></div>
		<div class="pay_money_user">微信支付 <div class="pay_color" ><div class="pay_color_w" onclick="pay_money(this,'pay_w')"  -id="pay_w" ></div></div></div>
		<button type="button" id='dispose'  onclick='dispose()'>下一步</button>
		<form id="give_data" action="__URL__/recharge_money" method="get">
		<input type="hidden" id="give_id" name="give_id" value="" />
		<input type="hidden" name="pay_data" value="{$pay_y}">
		</form>
	</div>

		<div class="succ_click" style="display:none">
		<div class="fades"></div>
        <div class="succ-pop">
        	<div class="succ_title"><div id="succ_click">X</div><?php if($pay_password){echo '请输入支付密码';}else{echo '请设置支付密码';}?></div>
        	<div class="succ_money " id="form_paypsw">
					<div id="payPassword_container" class="alieditContainer clearfix" data-busy="0">
						<div class="i-block" data-error="i_error">
								<input autofocus="autofocus" class="i-text sixDigitPassword" id="payPassword_rsainput" type="password" autocomplete="off" required="required" value="" name="payPassword_rsainput" data-role="sixDigitPassword" tabindex="" maxlength="6" minlength="6" aria-required="true">
								<div tabindex="0" class="sixDigitPassword-box" style="">
									<i style=" border-color: transparent;" class=""><b></b></i>
									<i><b></b></i>
									<i><b></b></i>
									<i><b></b></i>
									<i><b></b></i>
									<i><b></b></i>
								</div>
						</div>
					</div>
					<?php if($pay_password){?>
					<button type="button"  onclick="payment('pay')">支付</button>
					<?php }else{?>
					<button type="button"  onclick="payment()">确定</button>
					<?php }?>
        	</div>

        </div>
        </div>
<input type="hidden" name="product" value="{$id}">
<input type="hidden" name="product_money" value="{$money}">
<script type="text/javascript">

function fresh_page(obj){
	if(obj){
		window.location.reload();
	}else{
		location.href = 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php/Home/Index/shopping';
	}
} 
function msgs(data,o,s){
layer.open({title: false,closeBtn:0,btn:0,time:2000,icon:s,content:data});
setTimeout('fresh_page('+o+')',1000);
}
function payment(obj){
	if(obj){
		 var string = $('#payPassword_rsainput').val();
		$.post('__URL__/pay_password',{pay_password:string},function(str){
			if(str==1){
				var datas = $('[name=pay_data]').val();
				var give_id = $('#give_id').val();
				$.post('__URL__/payment',{data:datas+'@give_id='+give_id},function(data){
					if(data=='余额额不足'){
						msgs('余额额不足','1',0);
					}else if(data == '成功'){
						msgs('支付成功','',1);
					}else if(data == '失败'){
						msgs('支付失败',1,2);
					}else{
						msgs('密码错误',1,2);
					}
				});
			}else if(str==0) {
				msgs('密码错误','1',2);
				
			}else{
				msgs('系统故障','1',0);
			}
		});
	}else{
		 var string = $('#payPassword_rsainput').val();
		$.get('__URL__/pay_password?pay_password='+string,function(str){
			if(str==1){
				var datas = $('[name=pay_data]').val();
				var give_id = $('#give_id').val();
				$.post('__URL__/payment',{data:datas+'@give_id='+give_id},function(data){
					if(data=='余额额不足'){
						msgs('余额额不足','1',0);
					}else if(data == '成功'){
						msgs('支付成功','',1);
					}else if(data == '失败'){
						msgs('支付失败',1,2);
					}else{
						msgs('密码错误',1,2);
					}
				})
			}else if(str == 0){
				msgs('设置失败',1,2);
			}else{
				msgs('系统故障',1,0);
			}
		});
	}

}
function dispose(){
	$('.succ_click').css('display','block');
}
function pay_money(obj,id='pay_y'){
	var obj = $(obj);
	$('.pay_color_w').css('background-color','');
	obj.css('background-color','#50B34B');
	if(id=='pay_y'){
		$('#dispose').attr('onclick','dispose()');
	}else{
		$('#dispose').attr('onclick','pay()');
	}
}
function pay(){
	var money = $('#money').text();
	if(money==0){
		dispose();
	}else{
		var give_id = $('#give_id').val();
		if(give_id){
			$('#give_data').submit();
		}else{
			setTimeout("callpay()",500);
		}
	}

}
$('#succ_click').click(function(){
	$('.succ_click').css('display','none');
});
function give_data(){
	var id = $('[name=product]').val();
	var money = $('[name=product_money]').val();
		layer.open({
		  type: 2,
		  title: false,
		  closeBtn: 0, 
		  shade: [0],
		  scrollbar:true,
		  area: ['100%', '100%'],
		  anim: 0,
		  content: ['__URL__/give_data?id='+id+'&money='+money],
		});   
	
}

</script>

<script src="__PUBLIC__/pay/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/pay/jquery-validate.js" type="text/javascript"></script>
<script type="text/javascript">
var payPassword = $("#payPassword_container"),
    _this = payPassword.find('i'),	
	k=0,j=0,
	password = '' ,
	_cardwrap = $('#cardwrap');
	//点击隐藏的input密码框,在6个显示的密码框的第一个框显示光标
	payPassword.on('focus',"input[name='payPassword_rsainput']",function(){
	
		var _this = payPassword.find('i');
		if(payPassword.attr('data-busy') === '0'){ 
		//在第一个密码框中添加光标样式
		   _this.eq(k).addClass("active");
		   _cardwrap.css('visibility','visible');
		   payPassword.attr('data-busy','1');
		}
		
	});	
	//change时去除输入框的高亮，用户再次输入密码时需再次点击
	payPassword.on('change',"input[name='payPassword_rsainput']",function(){
		_cardwrap.css('visibility','hidden');
		_this.eq(k).removeClass("active");
		payPassword.attr('data-busy','0');
	}).on('blur',"input[name='payPassword_rsainput']",function(){
		
		_cardwrap.css('visibility','hidden');
		_this.eq(k).removeClass("active");					
		payPassword.attr('data-busy','0');
		
	});
	
	//使用keyup事件，绑定键盘上的数字按键和backspace按键
	payPassword.on('keyup',"input[name='payPassword_rsainput']",function(e){
	
	var  e = (e) ? e : window.event;
	
	//键盘上的数字键按下才可以输入
	if(e.keyCode == 8 || (e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)){
			k = this.value.length;//输入框里面的密码长度
			l = _this.size();//6
			
			for(;l--;){
			
			//输入到第几个密码框，第几个密码框就显示高亮和光标（在输入框内有2个数字密码，第三个密码框要显示高亮和光标，之前的显示黑点后面的显示空白，输入和删除都一样）
				if(l === k){
					_this.eq(l).addClass("active");
					_this.eq(l).find('b').css('visibility','hidden');
					
				}else{
					_this.eq(l).removeClass("active");
					_this.eq(l).find('b').css('visibility', l < k ? 'visible' : 'hidden');
					
				}				
			
			if(k === 6){
				j = 5;
			}else{
				j = k;
			}
			$('#cardwrap').css('left',j*16.55899999999+'%');
		
			}
		}else{
		//输入其他字符，直接清空
			var _val = this.value;
			this.value = _val.replace(/\D/g,'');
		}
	});	
	
</script>
    
