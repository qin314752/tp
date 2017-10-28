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


<form action="/index.php/Home/Register/find" method="post" id="seek_form">
 <div class="seek">
      <input type="text" name="prod_name" value=""><span onclick="sub()">搜索</span>
  </div>
</form>

  <div class="swiper-container">
        <div class="swiper-wrapper">
        <?php foreach ($carousel as $key => $value) {?>
            <div class="swiper-slide"><a href="javascript:;" onclick="javascript:location.href='/index.php/Home/Register/particulars?id=<?php echo $value['prod_id']; ?>'">
            <img src="/<?php  echo $value['carousel_img'];?>"></a></div>
           <?php }?>
        </div>
    <div class="swiper-pagination"></div>
  </div>
   <div class="brand_menu" style="width: 100%;height:100%;-margin-bottom: 0px;">
        <div><img  class="halving" src="/Public/Home/img/halving.png"><a href="/index.php/Home/Register/inquire?prod_kind=6"><img src="/Public/Home/img/youhui.png"></a></div>
        <div><img  class="halving" src="/Public/Home/img/halving.png"><a href="/index.php/Home/Register/inquire?prod_kind=1"><img src="/Public/Home/img/sparex.png"></a></div>
        <div><img  class="halving" src="/Public/Home/img/halving.png"><a href="/index.php/Home/Register/inquire?prod_kind=2"><img src="/Public/Home/img/pedicure.png"></a></div>
        <div><img  class="halving" src="/Public/Home/img/halving.png"><a href="/index.php/Home/Register/inquire?prod_kind=3"><img src="/Public/Home/img/tuina.png"></a></div>
        <div><img  class="halving" src="/Public/Home/img/halving.png"><a href="/index.php/Home/Register/inquire?prod_kind=4"><img src="/Public/Home/img/spa.png"></a></div>
        <div><img  class="halving" src="/Public/Home/img/halving.png"><a href="/index.php/Home/Register/inquire?prod_kind=5"><img src="/Public/Home/img/Medicine.png"></a></div>
   </div>

<div style="width: 100%;height: 4.5rem;position: fixed;background-color: #FFF;opacity:1;bottom: 0rem;border-top: 1px solid #EFEEED;">
      <div class="menu_list"  onclick="javascript:location.href='/index.php/Home/Register/index'">
          <div class="menu_img">
            <img src="/Public/Home/img/home_1s.png">
          </div>
      </div>
    <div class="menu_list"  onclick="javascript:location.href='/index.php/Home/Register/collect'">
          <div class="menu_img"">
            <img src="/Public/Home/img/home_2.png">
          </div>
      </div>
    <div class="menu_list" onclick="javascript:location.href='/index.php/Home/Register/shopping'">
          <div class="menu_img">
            <img src="/Public/Home/img/home_3.png">
          </div>
      </div>
    <div class="menu_list" onclick="javascript:location.href='/index.php/Home/Register/userlist'">
          <div class="menu_img">
            <img src="/Public/Home/img/home_4.png">
          </div>
      </div>
</div>
<div class="modal fade " id="myModal" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
       <div class="home_login" id="home_login">账号登录</div>
         <form action="/index.php/Home/Register/login" method="post">
             <div class="home_login_list" id="login" >
               <div><span>账号</span><input  type="text" name="user_phone" value="" placeholder="请输入手机号"></div>
               <div><span>密码 </span><input  type="password" name="user_password" value="" placeholder="请输入密码"></div>
               <button>登陆</button>
               <div class="homelist" > <div onclick="blocks(this,'forget')">| 忘记密码</div> <div onclick="blocks(this,'in')">立即注册</div></div>
              </div>
        </form>
         <form action="/index.php/Home/Register/register" method="post">
            <div class="home_login_list" id='in' style="display: none;height:15.5rem;">
             <div><span style="width: 6rem;font-size: 1.6rem;">手机号</span><input type="text" name="user_phone" value="" placeholder="请输入手机号"></div>
             <div><span style="width: 6rem;font-size: 1.6rem;">密码</span><input type="password" name="user_password" value="" placeholder="请输入密码"></div>
             <div class="home_code"><span style="width: 6rem;font-size: 1.6rem;">验证码</span><input type="text" name="user_code" value="" style="width: 35%;" placeholder="请输入验证码">
             <div  onclick="butt(this)">获取验证码</div></div>
             <button>注册</button>
            </div> 
        </form> 
        </div>

      </div>
    </div>
  </div>
  <script type="text/javascript">
function blocks(obj,id){
  var obj = $(obj);
  if(id=='in'){
    $('.home_login_list').css('display','none');
    $('#'+id).css('display','block');
    document.getElementById('home_login').innerHTML = '立即注册';
  }else{
    layer.open({
      type: 2,
      title: false,
      closeBtn: 0, 
      shade: [0],
      offset:['1rem','3%'],
      shade :0.3,
      scrollbar:true,
      area: ['94%', '23rem;'],
      anim: 0,
      content: ['/index.php/Home/Register/reset'],
    }); 
  }

}
  </script>
<script>        
  var mySwiper = new Swiper ('.swiper-container', {
    direction: 'horizontal',
  autoplay: 2000,
    loop: true,
    pagination: '.swiper-pagination',
  })  

function sub(){
  if($('[name=prod_name]').val()){
      $('#seek_form').submit();
  }
}      
 $(function(){
var mo=function(e){e.preventDefault();};
  $('#myModal').modal({
    keyboard: false,
    backdrop: 'static',
    keyboard: false,
  });
   document.body.style.overflow='hidden';        
        document.addEventListener("touchmove",mo,false);//禁止页面滑动
});

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
     var phone = $('#in').find('[name=user_phone]').val();
      $.post('/index.php/Home/Register/code',{phone:phone},function(data){
      });
     time($(obj));
     $(obj).removeAttr('onclick');
    }
</script>
<script type="text/javascript">
$(function() {
　　if (window.history && window.history.pushState) {
　　$(window).on('popstate', function () {
　　window.history.pushState('forward', null, '#');
　　window.history.forward(1);
　　});
　　}
　　window.history.pushState('forward', null, '#'); //在IE中必须得有这两行
　　window.history.forward(1);
　　})
</script>
</body>
</html>