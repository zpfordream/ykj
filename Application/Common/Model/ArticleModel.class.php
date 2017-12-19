<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/12/18
 * Time: 22:35
 */
namespace Common\Model;
use Think\Model;


class ArticleModel extends Model{

    protected $_validate = array(
        array('catename','require','分类名称不能为空'),
        array('catename','','分类名称不能重复',1,'unique',3),

    );

    public function aaa(){
        echo 111;
    }
}