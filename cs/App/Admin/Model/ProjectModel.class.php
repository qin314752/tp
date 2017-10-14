<?php 
	namespace Admin\Model;
	use Think\Model ;
	class ProjectModel extends Model
	{
		protected $tablePrefix = "";//表示表格前缀为空，就是没有前缀。
    	protected $trueTableName = "zc_address";//如果不写这句话，会自动去找Yong_Hu这张表，这是默认的表格的命名。这里要写上实际的表格的名字
}


 ?>