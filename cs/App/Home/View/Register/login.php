<include file="Common:head" />
<form action="__URL__/find" method="post" id="seek_form">
 <div class="seek">
      <input type="text" name="prod_name" value=""><span onclick="sub()">搜索</span>
  </div>
</form>

  <div class="swiper-container">
        <div class="swiper-wrapper">
        <?php foreach ($carousel as $key => $value) {?>
            <div class="swiper-slide"><a href="javascript:;" onclick="javascript:location.href='__URL__/particulars?id=<?php echo $value['prod_id']; ?>'">
            <img src="/<?php  echo $value['carousel_img'];?>"></a></div>
           <?php }?>
        </div>
    <div class="swiper-pagination"></div>
  </div>
   <div class="brand_menu" style="width: 100%;height:100%;-margin-bottom: 0px;">
        <div><img  class="halving" src="__PUBLIC__/Home/img/halving.png"><a href="__URL__/inquire?prod_kind=6"><img src="__PUBLIC__/Home/img/youhui.png"></a></div>
        <div><img  class="halving" src="__PUBLIC__/Home/img/halving.png"><a href="__URL__/inquire?prod_kind=1"><img src="__PUBLIC__/Home/img/sparex.png"></a></div>
        <div><img  class="halving" src="__PUBLIC__/Home/img/halving.png"><a href="__URL__/inquire?prod_kind=2"><img src="__PUBLIC__/Home/img/pedicure.png"></a></div>
        <div><img  class="halving" src="__PUBLIC__/Home/img/halving.png"><a href="__URL__/inquire?prod_kind=3"><img src="__PUBLIC__/Home/img/tuina.png"></a></div>
        <div><img  class="halving" src="__PUBLIC__/Home/img/halving.png"><a href="__URL__/inquire?prod_kind=4"><img src="__PUBLIC__/Home/img/spa.png"></a></div>
        <div><img  class="halving" src="__PUBLIC__/Home/img/halving.png"><a href="__URL__/inquire?prod_kind=5"><img src="__PUBLIC__/Home/img/Medicine.png"></a></div>
   </div>

<div style="width: 100%;height: 4.5rem;position: fixed;background-color: #FFF;opacity:1;bottom: 0rem;border-top: 1px solid #EFEEED;">
      <div class="menu_list"  onclick="javascript:location.href='__URL__/index'">
          <div class="menu_img">
            <img src="__PUBLIC__/Home/img/home_1s.png">
          </div>
      </div>
    <div class="menu_list"  onclick="javascript:location.href='__URL__/collect'">
          <div class="menu_img"">
            <img src="__PUBLIC__/Home/img/home_2.png">
          </div>
      </div>
    <div class="menu_list" onclick="javascript:location.href='__URL__/shopping'">
          <div class="menu_img">
            <img src="__PUBLIC__/Home/img/home_3.png">
          </div>
      </div>
    <div class="menu_list" onclick="javascript:location.href='__URL__/userlist'">
          <div class="menu_img">
            <img src="__PUBLIC__/Home/img/home_4.png">
          </div>
      </div>
</div>
<div class="modal fade " id="myModal" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
       <div class="home_login" id="home_login">账号登录</div>
         <form action="__URL__/login" method="post">
             <div class="home_login_list" id="login" >
               <div><span>账号</span><input  type="text" name="user_phone" value="" placeholder="请输入手机号"></div>
               <div><span>密码 </span><input  type="password" name="user_password" value="" placeholder="请输入密码"></div>
               <button>登陆</button>
               <div class="homelist" > <div onclick="blocks(this,'forget')">| 忘记密码</div> <div onclick="blocks(this,'in')">立即注册</div></div>
              </div>
        </form>
         <form action="__URL__/register" method="post">
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
      content: ['__URL__/reset'],
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
      $.post('__URL__/code',{phone:phone},function(data){
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