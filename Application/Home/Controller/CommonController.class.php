<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->nav();
        $this->link();
        $this->last_Acticle();
    }


    public function nav(){

        $cate = D('Cate');
        $cates = $cate->select();

        $this->assign('cates',$cates);
//        var_dump($cates);
    }

    public function link(){

        $link = D('Link');
        $links = $link->select();

//        var_dump($links);
        $this->assign('links',$links);

    }

    public function last_Acticle(){

        $article = D('Article');
        $articles = $article ->order('id desc')->limit(10) ->select();

//        var_dump($articles);
        $this->assign('articles',$articles);

    }
}