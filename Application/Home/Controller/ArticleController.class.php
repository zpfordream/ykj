<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends CommonController {

    public function index()
    {
        $id = I('id') + 0;
        $arts = D('article');
        $art = $arts ->find($id);
//        var_dump($art);
        $this->assign( 'art' ,$art);
        $this->catename($art['cateid']);

        $this->display();
    }

    public function catename($cateid){

        $cate = M('cate');
        $catename = $cate ->find($cateid);
        $this->assign('catename',$catename);
    }



}