<?php 
	namespace Home\Model;
	use Think\Model ;
	class RegisterModel extends Model
	{
		protected $tableName = 'consumer';
		 protected $_validate = array(
	     array('user_phone','require','手机号必须有！'),
	     array('user_phone','','帐号名称已经存在！',1,'unique',1),
	     array('user_phone',"/^1[3-9]{1}[0-9]{9}$/",'手机号格式不对',1,'regex'),
	     array('user_password','require','密码必须有！'), 
	     array('user_code','require','验证码必须有',1), 
	   );

	}


 ?>