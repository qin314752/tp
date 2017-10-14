<?php
return array(
		//'配置项'=>'配置值'
	'TMPL_TEMPLATE_SUFFIX'=>'.php',
	'URL_MODULE_MAP'=>array('admin'=>'admin'),
	'WAP_DOMAIN'=>'cs.cn',//

	'MODULE_ALLOW_LIST' => array('Home','Admin'),
	// 日志记录
	'LOG_RECORD' => true, // 开启日志记录
    'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR', // 只记录EMERG ALERT CRIT ERR 错误
    'LOG_TYPE'              =>  'File', // 日志记录类型 默认为文件方式
    // 令牌验证
    // 'TOKEN_ON'      =>    false,  // 是否开启令牌验证 默认关闭
    // 'TOKEN_NAME'    =>    '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
    // 'TOKEN_TYPE'    =>    'md5',  //令牌哈希验证规则 默认为MD5
    // 'TOKEN_RESET'   =>    true,  //令牌验证出错后是否重置令牌 默认为true
	/**
	 *---------------------------------------------------
	 * 数据库配置
	 *----------------------------------------------------
	 */


	// 'DB_FIELDS_CACHE'=>false,	// 关闭字段缓存
	// 'DB_TYPE'   => 'mysql', // 数据库类型
	// 'DB_HOST'   => '127.0.0.1', // 服务器地址
	// 'DB_NAME'   => 'thinkphp', // 数据库名
	// 'DB_USER'   => 'root', // 用户名
	// 'DB_PWD'    => 'root', // 密码
	// 'DB_PORT'   => 3306, // 端口
	// 'DB_PREFIX' => 'zc_',// 数据库表前缀 
	// 'DB_CHARSET'=> 'utf8', // 字符集

	'DB_FIELDS_CACHE'=>false,	// 关闭字段缓存
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => '127.0.0.1', // 服务器地址
	'DB_NAME'   => 'thinkphp', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'zc_',// 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集


	//
	 'MCHID_T' => '1279343601',
	 'NAME_T' => 'tianshu',
	 'MCHID_K' => '1287567801',
	 'NAME_K' => 'kangyun',
	/**
	 *----------------------------------------------------
	 * RBAC权限配置
	 *----------------------------------------------------
	 */

	'USER_AUTH_ON' => true,      // 是否需要认证
	'RBAC_SUPERADMIN'=>'123456',
	'ADMIN_AUTH_KEY'=>'superadmin',
	'USER_AUTH_TYPE' => '1',      // 认证类型
	'USER_AUTH_KEY' => 'authId',      // 认证识别号
	'REQUIRE_AUTH_MODULE' => '',      //  需要认证模块
	'NOT_AUTH_MODULE' => '',      // 无需认证模块
	'USER_AUTH_GATEWAY' => '',      // 认证网关
	// 'RBAC_DB_DSN' => '',       //  数据库连接DSN
	'RBAC_ROLE_TABLE' => 'zc_role',      // 角色表名称
	'RBAC_USER_TABLE' => 'zc_role_user',      // 用户表名称
	'RBAC_ACCESS_TABLE' => 'zc_access',      // 权限表名称
	'RBAC_NODE_TABLE' => 'zc_node',      // 权限表名称
	'RBAC_ERROR_PAGE' => '', //错误页面
	
	'Runtime'   =>  __ROOT__.'Runtime',
	// 'WEB_ROOT'=>explode('Mobile/Common',str_replace('\\', '/', dirname(__FILE__)),-1)[0],//网站根目录物理路径
	'WEB_ROOT' => str_replace('App/Common/Conf','',str_replace('\\', '/', dirname(__FILE__))),//网站根目录物理路径
	
);