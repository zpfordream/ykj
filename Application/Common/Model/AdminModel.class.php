<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/12/18
 * Time: 22:35
 */
namespace Common\Model;
use Think\Model;


class AdminModel extends Model{

    protected $_validate = array(
        array('username','require','用户名不能为空',1,'regex',3),
        array('password','require','密码不能为空',1,'regex',1),
        array('repassword','password','两次输入密码不一致',0,'confirm'),
        array('username','require','用户名不能重复',1,'unique',3),
        array('username','require','用户名不能为空',1,'regex',4),
        array('password','require','密码不能为空',1,'regex',4),
        array('verify','check_verify','验证码错误',1,'callback',4),//使用回调函数，第一个参数就是调用函数的第一个参数；这个数组的第七个可以是数组，传入第二个变量

    );


    protected $_auto = array (
        array('password','md5',1,'function') , // 对password字段在新增和编辑的时候使md5函数处理,新增时进行md5加密
    );

    public function login($username,$password){

        $info = $this->where(array('username'=>$username))->find();
        if($info){
            if($info['password'] == md5($password)){
                session('id',$info['id']);
                session('username',$info['username']);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }



    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }





    public function aaa(){
        echo 111;
    }
}