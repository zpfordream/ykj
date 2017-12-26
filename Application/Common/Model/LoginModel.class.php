<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/12/18
 * Time: 22:35
 */
namespace Common\Model;
use Think\Model;


class LoginModel extends Model{

    protected $_validate = array(
//        array('title','require','链接名称不能为空'),
//        array('title','','链接名称不能重复',1,'unique',3),
//        array('url','require','链接不能为空'),
//        array('desc','require','详细描述不能为空'),

    );

    public function aaa(){
        echo 111;
    }
}