<?php
namespace Admin\Model;
use Think\Model;
use Org\Util\String;
class AdminModel extends Model{
    protected $tableName = 'admin';
    protected $pk             = 'id';
    public      $error;
    
    /**
     * 登录验证
     */
    public function login($username, $password){
        $times_db = M('times');

        //查询帐号
        $r = $this->where(array('user_name'=>$username))->find();
        if(!$r){
            $this->error = '管理员不存在';
            return false;
        }
        
        //密码错误剩余重试次数
        $rtime = $times_db->where(array('user_name'=>$username, 'is_admin'=>'1'))->find();
        if($rtime['times'] >= C('MAX_LOGIN_TIMES')) {
            $minute = C('LOGIN_WAIT_TIME') - floor((time()-$rtime['logintime'])/60);
            if ($minute > 0) {
                $this->error = "密码重试次数太多，请过{$minute}分钟后重新登录！";
                return false;
            }else {
                $times_db->where(array('user_name'=>$username))->delete();
            }
        }

        $password = md5(md5($password).$r['encrypt']);
        $ip             = get_client_ip(0, true);

        if($r['password'] != $password) {
            if($rtime && $rtime['times'] < C('MAX_LOGIN_TIMES')) {
                $times = C('MAX_LOGIN_TIMES') - intval($rtime['times']);
                $times_db->where(array('user_name'=>$username))->save(array('ip'=>$ip,'is_admin'=>1));
                $times_db->where(array('user_name'=>$username))->setInc('times');
            } else {
                $times_db->where(array('user_name'=>$username,'is_admin'=>1))->delete();
                $times_db->add(array('user_name'=>$username,'ip'=>$ip,'is_admin'=>1,'login_time'=>time(),'times'=>1));
                $times = C('MAX_LOGIN_TIMES');
            }
            $this->error = "密码错误，您还有{$times}次尝试机会！";
            return false;
        }
        
        $times_db->where(array('user_name'=>$username))->delete();
        $this->where(array('id'=>$r['id']))->save(array('last_login_ip'=>$ip,'last_login_time'=>time()));
        
        //登录日志
        $admin_log_db = M('admin_log');
        $admin_log_db->add(array(
            'id'              => create_guid(),
            'user_id'         => $r['id'],
            'user_name'       => $username,
            'http_user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'ip'              => $ip,
            'time'            => date('Y-m-d H:i:s'),
            'type'            => 'login',
            'session_id'      => session_id(),
        ));
        
        session('user_id', $r['id']);
        session('role_id', $r['role_id']);
        cookie('user_name', $username);
        cookie('user_id', $r['id']);
        S('SESSION_ID_' . $r['id'] , session_id());  //单点登录用
        return true;
    }
    
    /**
     * 获取用户信息
     */
    public function getUserInfo($userid){
        $admin_role_db = D('AdminRole');
        $info = $this->field('password, encrypt', true)->where(array('id'=>$userid))->find();
        if($info) $info['rolename'] = $admin_role_db->getRoleName($info['role_id']);    //获取角色名称
        return $info;
    }
    
    /**
     * 修改密码
     */
    public function editPassword($userid, $password){
        $userid = intval($userid);
        if($userid < 1) return false;
        $passwordinfo = password($password);
        return $this->where(array('id'=>$userid))->save($passwordinfo);
    }
}