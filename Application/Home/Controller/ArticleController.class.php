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
        $this->pre_next($id);

        $this->display();
    }

    public function catename($cateid){

        $cate = M('cate');
        $cat = $cate ->find($cateid);
        $this->assign('cat',$cat);
    }

    public function pre_next($id){

        $article = D('article');

        $pre = $article -> where('id < '.$id ) -> where('cateid ='.$id)  ->order('id desc')->find();
        $nxt = $article -> where('id > '.$id ) -> where('cateid ='.$id)  ->order('id asc') ->find();

        $this->assign('pre',$pre);
        $this->assign('nxt',$nxt);
    }

}