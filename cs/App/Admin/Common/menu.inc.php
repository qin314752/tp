<?php

/*array(菜单名，菜单url参数，是否显示)*/
$i=0;
$menu_left = array();
//=================================================================
$menu_left[$i]= array('首页');
$menu_left[$i]['low_title'][] = array('首页',U('Index/index'));
//=================================================================
$i++;
$menu_left[$i]= array('产品管理');
$menu_left[$i]['low_title'][] = array('产品添加',U('Product/index'));
$menu_left[$i]['low_title'][] = array('产品列表',U('Product/product_list'));


//=================================================================
$i++;
$menu_left[$i]= array('会员管理');
$menu_left[$i]['low_title'][] = array('会员管理',U('Members/user_list'));
$menu_left[$i]['low_title'][] = array('等级管理',U('Members/level'));
$menu_left[$i]['low_title'][] = array('资金变动日志',U('Members/money_dos'));

//=================================================================
$i++;
$menu_left[$i]= array('订单管理');
$menu_left[$i]['low_title'][] = array('订单列表',U('Indent/indent_list'));
$menu_left[$i]['low_title'][] = array('微信退单列表',U('Indent/refund_list'));

//=================================================================
$i++;
$menu_left[$i]= array('系统管理');

$menu_left[$i]['low_title'][] = array('管理员管理',U('Rbac/admin_user_list'));

$menu_left[$i]['low_title'][] = array('角色管理',U('Rbac/admin_role'));

// $menu_left[$i]['low_title'][] = array('管理组权限管理',U('Rbac/admin_node'));

$menu_left[$i]['low_title'][] = array('数据库信息',U('SysData/index'));
//==========================================================
$i++;
$menu_left[$i]= array('运营管理');

$menu_left[$i]['low_title'][] = array('产品有效期',U('Global/period'));

$menu_left[$i]['low_title'][] = array('网站设置',U('Global/websetting'));

$menu_left[$i]['low_title'][]= array('地址管理',U('Global/address'));

$menu_left[$i]['low_title'][] = array("操作日志",U("Global/adminlog"));
//==========================================================
$i++;
$menu_left[$i]= array('第三方接口');

// $menu_left[$i]['low_title'][] = array('手机wap支付接口',U('Notice/wappay'));

$menu_left[$i]['low_title'][] = array('通知信息接口',U('Notice/index'));

$menu_left[$i]['low_title'][] = array('通知信息模板',U('Notice/template'));

$menu_left[$i]['low_title'][] = array('手机短息记录',U('Notice/phone'));

// $menu_left[$i]['low_title'][] = array('邮箱信息记录',U('Notice/emaillog'));
//==========================================================
$i++;
$menu_left[$i]= array('广告');

$menu_left[$i]['low_title'][] = array('轮播  广告',U('Carousel/advertising'));
return $menu_left;
?>

