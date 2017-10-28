<include file="Common:head" />
<div class="res " id='resetp' style="margin-top: 3rem;">
        <div class="reset_title">重置密码</div>
        <div style="width:88%;margin-left: 6%;" ><b>手机号</b><input type="text" name="user_phone" value="" placeholder="请输入手机号"></div>
        <div style="width:88%;margin-left: 6%;" id="code"><b>验证码</b><input type="text" name="user_code" value="" style="width: 40%;" placeholder="请输入验证码"><button onclick="butt(this)">获取验证码</button></div>
        <button id="butt">下一步</button>
 </div> 
<div class="res" id="reset" style="display: none;">

      <form action="__URL__/reset" method="post">  
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
     $.post('__URL__/up_password',{phone:phone,password:password,passwords:passwords},function(data){
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
      $.post('__URL__/code',{phone:phone},function(data){
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
        $.post('__URL__/reset',{code:code,user_phone:user_phone},function(data){
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
