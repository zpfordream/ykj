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
        array('title','require','标题不能为空'),
        array('title','5,10','标题必须在5-10个字符之间',0,'length'),
        array('desc','require','简介不能为空'),
        array('desc','10,20','简介必须在10-20个字符之间',0,'length'),
        array('content','require','内容不能为空'),
        array('content','20,50','内容必须在20-50个字符之间',0,'length'),

    );

    public function aaa(){
        echo 111;
    }
}