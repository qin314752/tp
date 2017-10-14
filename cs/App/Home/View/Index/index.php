<include file="Common:head" />
<form action="__URL__/find" method="post" id="seek_form">
 <div class="seek">
      <input type="text" name="prod_name" value=""><div onclick="sub()"></div>
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
   <div class="brand_menu">
        <div><img  class="halving" src="__PUBLIC__/Home/img/halving.png"><a href="__URL__/inquire?prod_kind=6"><img src="__PUBLIC__/Home/img/youhui.png"></a></div>
        <div><img  class="halving" src="__PUBLIC__/Home/img/halving.png"><a href="__URL__/inquire?prod_kind=1"><img src="__PUBLIC__/Home/img/sparex.png"></a></div>
        <div><img  class="halving" src="__PUBLIC__/Home/img/halving.png"><a href="__URL__/inquire?prod_kind=2"><img src="__PUBLIC__/Home/img/pedicure.png"></a></div>
        <div><img  class="halving" src="__PUBLIC__/Home/img/halving.png"><a href="__URL__/inquire?prod_kind=3"><img src="__PUBLIC__/Home/img/tuina.png"></a></div>
        <div><img  class="halving" src="__PUBLIC__/Home/img/halving.png"><a href="__URL__/inquire?prod_kind=4"><img src="__PUBLIC__/Home/img/spa.png"></a></div>
        <div><img  class="halving" src="__PUBLIC__/Home/img/halving.png"><a href="__URL__/inquire?prod_kind=5"><img src="__PUBLIC__/Home/img/Medicine.png"></a></div>
   </div>
<include file="Common:foot" />
<script>        
  var mySwiper = new Swiper ('.swiper-container', {
    direction: 'horizontal',
	autoplay: 1000,
    loop: true,
    pagination: '.swiper-pagination',
  })  

function sub(){
  if($('[name=prod_name]').val()){
      $('#seek_form').submit();
  }
}      
</script>