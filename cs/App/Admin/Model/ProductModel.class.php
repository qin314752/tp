<?php 
	namespace Admin\Model;
	use Think\Model ;
	class ProductModel extends Model
	{
		protected $tableName = 'product';
		 protected $_validate = array(
	     array('prod_name','require','产品名称 不能为空',1), 
	     array('prod_money','require','团购金额 不能为空',1), 
	     array('prod_money_bid','require','门店价金额 不能为空',1), 
	     array('prod_brand','require','产品品牌 不能为空',1), 
	     array('prod_kind','require','产品种类 不能为空',1), 
	     array('prod_grade','require','产品等级 不能为空',1), 
	     array('prod_product_time','require','上钟时间 不能为空',1), 
	     array('prod_stastic','require','上/下线 不能为空',1), 
	     array('prod_number','require','已购买人数 不能为空',1), 
	     array('prod_service','require','服务内容 不能为空',1), 
	     array('prod_range','require','适用范围 不能为空',1), 
	     array('prod_taboo','require','禁忌提示 不能为空',1), 

	     array('prod_number',"/^\d+$/",'已购买人数 为数字',1,'regex'),
	     array('prod_product_time',"/^\d+$/",'上钟时间为数字',1,'regex'), 
	     array('prod_money','prod_money','团购金额 格式不对',1,'function'), 
	     array('prod_money_bid','prod_money','门店价金额 格式不对',1,'function'),

	     array('prod_service','1,1000','服务内容文字太长',1,'length'), 
	     array('prod_range','1,1000','适用范围文字太长',1,'length'), 
	     array('prod_taboo','1,1000','禁忌提示文字太长',1,'length'), 
	   );

	}


 ?>