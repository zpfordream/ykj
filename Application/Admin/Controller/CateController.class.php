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
        if(IS_POST){
            $cates = D('Common/cate');
            $data['catename']  =  I('catename');
            $data['id']  =  I('id');

            if( $cates ->create($data)){
                $res = $cates->save();
                if($res !==false ){
                    $this->success('修改分类成功',U('lst'));
                }else{
                    $this->error('修改栏目失败');
                }
            }else{
                $this->error($cates->getError());
            }

        }else{
            $cates  = D('Common/Cate');
            $cate   = $cates->find(I('id'));
            $this->assign('cate',$cate);
            $this->display();
        }

    }

    public function delete(){
        $cates = D('Common/Cate');
        if($cates->delete(I('id'))){
            $this->success('删除分类成功',U('lst'));
        }else{
            $this->error('删除分类失败');
        }

    }

    public function sort(){
        $cate=D('Common/cate');
        var_dump($_POST);
        foreach ($_POST as $id => $sort) {
            $cate->where(array('id'=>$id))->setField('sort',$sort);
        }
        $this->display('add');
        exit();
//        $this->success('排序成功！',U('lst'));
    }



}