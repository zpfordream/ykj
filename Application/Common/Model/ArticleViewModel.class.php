<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/12/25
 * Time: 21:07
 */
namespace  Common\Model ;
use Think\Model\ViewModel;

class ArticleViewModel extends ViewModel{

    public $viewFields = array(
        'Article'=>array('id','title','pic','content','time'),
        'cate'=>array('catename', '_on'=>'Article.cateid=Cate.id'),
    );

}