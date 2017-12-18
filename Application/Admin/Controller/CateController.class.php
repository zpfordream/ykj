<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends Controller {

    public function lst(){

        $cate = M('cate');
        $cates = $cate->select();
        //var_dump($cates);

        $this ->assign("cates",$cates);
        $this->display();
    }

    public function add(){
        if(IS_POST){

        }
        $this->display();
    }

    public function edit(){

        $this->display();
    }
}