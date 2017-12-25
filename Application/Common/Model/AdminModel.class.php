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
        array('username','require','用户名不能为空'),
        array('password','require','用户名不能为空'),
        array('repassword','password','两次输入密码不一致',0,'confirm'),
        array('username','','用户名不能重复',1,'unique',3),

    );


    protected $_auto = array (
        array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
    );



    public function aaa(){
        echo 111;
    }
}