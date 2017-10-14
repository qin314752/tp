<?php
namespace Admin\Controller;
class RbacController extends CommonController {
   
    //管理员-列表
    public function admin_user_list()
    {
        $data = M('user_login')->select();
        $this->assign('data',$data);
        $this->display();
    }
    //添加管理-显示页面
    public function admin_add()
    {   
        $data = M('role')->getField('id,name');
        $this->assign('data',$data);
        $this->display();

    }
    //管理员-添加
    public function admin_add_user()
    {

        $data = I();
        $rbac = D("Login");
        if (!$rbac->create()){echo  $rbac->getError(); die;}
            $data['password'] = md5($data['password']);
            unset($data['pass']);
            $arr = explode('_',$data['user_role']);
            $data['user_role']=$arr[1];
            $data['last_add_time'] = time();
            $data['last_add_ip'] = get_client_ip();
            $user_id = M('user_login')->add($data);
            if(!$user_id){echo 2;alogs('Rbac/admin_update',3,'添加'.$data['username'].'管理员失败');die;}
            $str = M('role_user')->add(['user_id'=>$user_id,'role_id'=>$arr[0]]);
            if(!$str){M('user_login')->where('id='.$user_id)->delect();echo 2;alogs('Rbac/admin_update',3,'添加'.$data['username'].'管理员 角色关系 失败');die;}
            alogs('Rbac/admin_update',3,'添加'.$data['username'].'管理员成功');
            echo 1;
    }
    //管理员-停/启 
    public function user_suop()
    {
        $data = I();
        if($data['status']==0){
            $data['status']=1;
        }else{
            $data['status']=0;
        }
        $a = M('user_login')->save($data);
        if(!empty($a)){echo $data['status'];}

    }
    //管理员-编辑-显示页面
    public function admin_edit()
    {
        $id = $_GET['id'];
        $data = M('user_login')->where("id=$id")->find();
        $role = M('role')->getField('id,name');
        // var_dump($data);
        // var_dump($role);
        // die;
        $this->assign('role',$role);
        $this->assign('data',$data);
        $this->display();
    }
    
    //管理员-删除
    public function user_del(){
        $id = I('get.id');
        $user = M('user_login')->where("id=$id")->delete();
        $role_user = M('role_user')->where("user_id=$id")->delete();
        if($user&&$role_user){echo 0;alogs('Rbac',3,'删除'.I('get.name').'管理员成功');}

    }
    //更新数据
    public function admin_update()
    { 
        $data = I();

         $rbac = D("Login");
        if (!$rbac->create()){echo  $rbac->getError(); die;}

            $data['password'] = md5($data['password']);
            unset($data['passwords']);
            $arr = explode('_',$data['user_role']); 
            $data['last_add_time'] = time();
            $data['last_add_ip'] = get_client_ip();
            $role_user= M('role_user');
            $role_user->startTrans(); 
            if($arr[1]!=$data['user_role_old']){
                unset($data['user_role_old']);
                $data['user_role']=$arr[1];
                $role['role_id']=$arr[0];
                if($role_user->where('user_id='.$data['id'])->find()){
                    $str = $role_user->where('user_id='.$data['id'])->save($role);
                }else{
                    $role['user_id'] = $data['id'];
                    $str = $role_user->add($role);
                }
            }else{
                unset($data['user_role_old']);
                $data['user_role']=$arr[1];
            }
                $user_login = M('user_login')->save($data);
            if($str&&$user_login){
                  $role_user->commit();
                  echo '成功';
                  alogs('Rbac',3,'更新'.$data['username'].'数据成功');
              }else{
                  $role_user->rollback();
                  echo '失败，联系编程人员修补bug';
                  alogs('Rbac/admin_update',3,'更新'.$data['username'].'数据失败');
            }
    }

    
 

    //角色列表
    public function admin_role(){
        $data = M('role')->getField('id,name,status');
        $this->assign('data',$data);
        $this->display();
    }
    // 角色-添加页面
    public function admin_role_add()
    {
        $data = M('node')->select();
        $node = node_merge($data);
        $this->assign('node',$node);
        $this->display();
    }
    //角色-添加数据
    public function add_role()
    {
        $arr = I();
        $role_id = M('role')->add(['name'=>$arr['name'],'status'=>$arr['status']]);
        $data = array();
        foreach ($arr['access'] as $v) {
            $tmp = explode('_',$v);
            $data[] = array(
                    'role_id'=>$role_id,
                    'node_id'=>$tmp['0'],
                    'level'=>$tmp['1'],
                ); 
        }
        if(M('access')->addAll($data)){echo 1;alogs('Rbac',3,'添加'.$arr['name'].'角色成功');}
    }
    //角色-启用/停用
    public function role_suop()
    {
        $data = I();
        if($data['status']==0){
            $data['status']=1;
        }else{
            $data['status']=0;
        }
        $a = M('role')->save($data);
        if(!empty($a)){echo $data['status'];}

    }
    //角色-删除
    public function role_del()
    {
        $id = I('get.id');
        $role_user = M('role_user')->where('role_id='.$id)->select();
        $arr['user_role'] = '未分配权限';
        foreach ($role_user as $k=>  $v) {M('user_login')->where('id='.$v['user_id'])->save($arr);}
        $role = M('role')->where('id='.$id)->delete();
        $role_user = M('role_user')->where(array('role_id'=>$id))->delete();
        $access = M('access')->where(array('role_id'=>$id))->delete();
        if($role&&$access){echo 1;alogs('Rbac',3,'删除'.I('get.name').'角色成功');}

    }
    //角色-修改-页面
    public function admin_role_edit()
    {
        $role_id= I('get.id');
        $role_name= I('get.name');
        $access = M('access')->where(array('role_id'=>$role_id))->getField('node_id',true);
        $node = M('node')->select();
        $new_node = node_merge($node,$access);
        $this->assign('role_id',$role_id);
        $this->assign('role_name',$role_name);
        $this->assign('node',$new_node);
        $this->display();
    }

     //角色-修改后存入
    public function edit_role()
    {
        $arr = I();
        $role_id = $arr['role_id'];
        $access= M('access');
        $access->startTrans();
        $del = $access->where("role_id=$role_id")->delete();
        if($del){
            $data = array();
            foreach ($arr['access'] as $v) {
                $tmp = explode('_',$v);
                $data[] = array(
                    'role_id'=>$role_id,
                    'node_id'=>$tmp['0'],
                    'level'=>$tmp['1'],
                ); 
            }
            $str = $access->addAll($data);
            if($str){
                if($arr['name']==$arr['role_name']){
                    $auser_login=$role=true;
                }else{
                    $role_user = M('role_user');
                    $user_id = $role_user->where('role_id='.$arr['role_id'])->getField('user_id',true);
                    $role = M('role')->where('id='.$arr['role_id'])->setField('name',$arr['name']);
                    $user_login = M('user_login');
                    foreach ($user_id as $id) {
                        $auser_login = $user_login->where('id='.$id)->setField('user_role',$arr['name']);
                       if(!$auser_login)break;
                    }
                }
            }else{
                alogs('Rbac/edit_role',3,'修改'.$arr['role_name'].'角色-权限失败');
            }
         }
            if($del&&$str&&$auser_login&&$role){
               $access->commit();
               echo '成功';
               alogs('Rbac',3,'修改'.$arr['role_name'].'角色-权限成功');
            }else{
                $access->rollback();
                echo '失败，联系编程人员修补bug';
                alogs('Rbac/edit_role',3,'修改'.$arr['role_name'].'角色-权限失败');
             }
        
    }
    

    // 权限列表
    public function admin_node(){
        $data = M('node')->select();
        $node = node_merge($data);
        $this->assign('node',$node);
        $this->display();
    }
   

    //添加权限
    public  function admin_add_node()
    {
        
        $this->pid = I('pid',0,'intval');
        $this->level = I('level',1,'intval');
        switch ($this->level) {
            case 1:
                $this->type = '应用';
                break;
            case 2:
                $this->type = '控制器';
                break;
            case 3:
                $this->type = '方法';
                break;
            
            
        }
        $this->display();
    }
    //新权限写入
    public function add_node()
    {
        $data = I();
        if(M('node')->add($data)){echo 1;}
    }




























}