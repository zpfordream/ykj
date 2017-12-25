<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/12/25
 * Time: 22:16
 */

namespace Admin\Controller;
use Think\Controller;

class AdminController extends Controller {


    //分类管理的列表
    public function lst(){

        $admin = M('admin');
        $admins = $admin->select();
        //var_dump($cates);

        $this ->assign("admins",$admins);
        $this->display();
    }

    public function add(){

        if(IS_POST){

            $data['username']  =  I('username');
            $data['password']  =  I('password');
            $data['repassword']  =  I('repassword');

            $admin = D('Common/Admin');
            if( $admin -> create( $data )  ){
                if( $admin ->add() ){
                    $this->success('添加管理员成功',U('lst'));
                }else{
                    $this->error('添加管理员失败');
                }
            }else{
                $this->error( $admin ->getError() );
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