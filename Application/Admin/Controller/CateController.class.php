<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends Controller {


    //分类管理的列表
    public function lst(){

        $cate = M('cate');
        $cates = $cate->select();
        //var_dump($cates);

        $this ->assign("cates",$cates);
        $this->display();
    }

    public function add(){

        if(IS_POST){
            $cate = D('Common/cate');
            $data['catename']  =  I('catename');
            if( $cate -> create( $data )  ){
                if( $cate ->add() ){
                    $this->success('添加栏目成功',U('lst'));
                }else{
                    $this->error('添加栏目失败');
                }
            }else{
                $this->error( $cate ->getError() );
            }
        }else {
            $this->display();
        }
    }



    public function edit(){

        $this->display();
    }
}