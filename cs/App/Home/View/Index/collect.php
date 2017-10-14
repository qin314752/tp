<include file="Common:head" />
<?php if(empty($product)){echo '<div class="product_more"><img src="__PUBLIC__/Home/img/collect.jpg"></div>';?>
<include file="Common:foot" />
<?php }else{?>
<div class="product_height">
<?php  foreach ($product as  $data) {?>
<?php  foreach ($data as $key => $value) {?>
	<div class="list"  onclick="javascript:location.href='__URL__/particulars?id=<?php echo $value['id'];?>&prod_brand=<?php echo $value['prod_brand']?>&home_img=<?php echo $home_img;?>' " >
			<div class='product_list'>
				<div class="product_title"><?php echo $value['prod_brand']==1?'天舒':'康韵' ?>养生会馆 <div></div></div>
				<div class="product_left">
					<div class="product_left_sort"><?php echo $value['prod_name']?></div>
					<div class="product_left_kind"><?php echo $value['prod_product_time']?>分钟 &nbsp;&nbsp;|&nbsp;&nbsp;<?php echo prod_kind($value['prod_kind'])?> </div>
					<div class="product_left_time"><p>自购买<?php echo inquire_name('period','','','select')[0][session('WeChat_pay')];?>天内有效</p></div>
				</div>
				<div class="product_right">
					<div class="product_money_list">
						<div  class="product_money"><p><?php echo $value['prod_money']?></p><div></div></div>
						<div class="product_money_bid"><p><?php echo $value['prod_money_bid']?></p><div>门市价:</div></div>
					</div>
				</div>
			</div>
	</div>
<?php }} ?>
</div>
<include file="Common:foot" />
<?php }?>