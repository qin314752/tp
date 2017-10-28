<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN" style="font-size: 10px;">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<meta id="scale" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no,minimum-scale=1.0, maximum-scale=1.0">
	<title ><?php echo explode('#',FS('web_set/web')['wap_title'])[session('WeChat')-1]?></title>
	<script src="/Public/Home/js/jquery-3.2.1.min.js"></script>
	<link href="/Public/Home/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="/Public/Home/bootstrap/js/bootstrap.min.js"></script>

	<!-- layer弹框包 -->
	<script type="text/javascript" src="/Public/Admin/layer/layer.js"></script>


	<!-- 前台样式 -->
	<link rel="stylesheet" href="/Public/Home/css/home.css">
    <script src="/Public/Home/js/home.js"></script>
	<link rel="stylesheet" href="/Public/Home/css/money.css">

	<script src="/Public/Home/js/zepto.min.js"></script>
    <script src="/Public/Home/js/swiper-3.4.2.min.js"></script>
	<link rel="stylesheet" href="/Public/Home/css/swiper-3.4.2.min.css">

	<script src="/Public/time/laydate/laydate.js"></script>

 	<script type="text/javascript" charset="utf-8" src="/Public/Home/ditor/ueditor.config.js"></script>
 	<script type="text/javascript" charset="utf-8" src="/Public/Home/ditor/ueditor.all.js"> </script>
 	<script type="text/javascript" charset="utf-8" src="/Public/Home/ditor/lang/zh-cn/zh-cn.js"></script>
 	<!-- pay -->
	<link rel="stylesheet" href="/Public/pay/pay.css">
<script src="/Public/pay/jquery-validate.js" type="text/javascript"></script>


</head>
<body >


<div class="res " id='resetp' style="margin-top: 3rem;">
        <div class="reset_title">重置密码</div>
        <div style="width:88%;margin-left: 6%;" ><b>手机号</b><input type="text" name="user_phone" value="" placeholder="请输入手机号"></div>
        <div style="width:88%;margin-left: 6%;" id="code"><b>验证码</b><input type="text" name="user_code" value="" style="width: 40%;" placeholder="请输入验证码"><button onclick="butt(this)">获取验证码</button></div>
        <button id="butt">下一步</button>
 </div> 
<div class="res" id="reset" style="display: none;">

      <form action="/index.php/Home/Register/reset" method="post">  
        <div class="reset_title">重置密码</div>
        <div class="reset_text"><b>请重设您的帐号密码</b></div>
        <input id="user_phone" type="hidden" name="phone" value="">
        <input type="text" name="password" value="" placeholder="请输入新密码">
        <input type="text" name="passwords" value="" placeholder="请输入确认密码">
      </form>
      <button onclick="aa()">提交</button>
</div>
<script type="text/javascript">
  function par(){
  var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
        parent.layer.close(index); //再执行关闭 
}
function msgs(data,s){
layer.open({title: false,closeBtn:0,btn:0,time:2000,icon:s,content:data});
setTimeout('par()',1000);
}
  function aa(){
     var phone =  $('#reset form').find('input').eq(0).val();
     var password =  $('#reset form').find('input').eq(1).val();
     var passwords =  $('#reset form').find('input').eq(2).val();
     $.post('/index.php/Home/Register/up_password',{phone:phone,password:password,passwords:passwords},function(data){
      if(data=='成功'){
       msgs(data,1);
      }else{
      msgs(data,0);
      }
     });
    }
  var wait = 60;
      function time(o) {
        if (wait == 0) {
         o.text("获取验证码");
         wait = 60;
         o.attr('onclick','butt(this)');
        } else { 
         wait--;
         o.text(wait);
         setTimeout(function() {
          time(o)
         },
         1000)
        }
       }
    function butt(obj){
     var phone = $('[name=user_phone]').val();
      $.post('/index.php/Home/Register/code',{phone:phone},function(data){
          alert(data);
      });
     time($(obj));
     $(obj).removeAttr('onclick');
    }
    
  $('#butt').click(function(){
    var code = $('[name=user_code]').val();
    var user_phone = $('[name=user_phone]').val();
    var myreg = /^1[3-9]{1}[0-9]{9}$/; 
    if(!myreg.test(user_phone)) 
    { 
      msgs('请输入有效的手机号码！',0);
       
    }else{
        $.post('/index.php/Home/Register/reset',{code:code,user_phone:user_phone},function(data){
            if(data=='正确'){
              $('.res').css('display','none');
              $('#reset').css('display','block');
              $('#user_phone').val(user_phone);
            }else{
              msgs(data,0);
            }
          });
    } 
  });
</script>