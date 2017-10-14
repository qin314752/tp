<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;
class CommonController extends Controller {

    /**
      +----------------------------------------------------------
     * 初始化
     * 如果 继承本类的类自身也需要初始化那么需要在使用本继承类的类里使用parent::_initialize();
      +----------------------------------------------------------
     */
    public function _initialize() {
         //检查认证识别号
        if(!isset($_SESSION[C('USER_AUTH_KEY')])){
           //跳转到认证网关
          $this->error('非法访问');
        }

        $notauth = in_array(ACTION_NAME, explode(',',C('NOT_AUTH_MODULE')));
        if(C('USER_AUTH_ON')&&!$notauth)
        //权限认证的过滤器方法
        if(!Rbac::AccessDecision()){
          if (C('RBAC_ERROR_PAGE')) {
                 // 定义权限错误页面
                 redirect(C('RBAC_ERROR_PAGE'));
          } else {
                 $this->error(L('_VALID_ACCESS_'));
          }
        }
        $this->assign("menu_top", $this->show_menu());

    }







    /**
      +----------------------------------------------------------
     * 显示一级菜单
      +----------------------------------------------------------
     */
    private function show_menu() {
      $data = array();
        require(C('WEB_ROOT')."App/Admin/Common/menu.inc.php");
            foreach ($menu_left as $key => $value) {
              $data[$key] = $value;
          }
          return $data; 
    }
  

  
  

    
    
}