<?php 
	namespace Admin\Model;
	use Think\Model ;
	class MembersModel extends Model
	{
		protected $tableName = 'members';
		 protected $_validate = array(
	     array('members_name','require','会员名称 不能为空',1), 
	     array('members_money','require','充值金额 不能为空',1), 
	     array('members_discount','require','打折百分比 不能为空',1), 
	     array('members_money','prod_money','充值金额 格式不对',1,'function'),
	     array('members_discount',"/^[0-9]+$/",'打折百分比 格式不对',1,'regex'),
	     array('members_name','','会员名称已经存在！',1,'unique',1), 
	     array('members_money','','充值金额已经存在！',1,'unique',1), 

	   );

	}


 ?>