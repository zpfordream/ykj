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

        $page_num = 2 ;   //设置分页条数

        $admin = D('Common/Admin');

        //分页
        $count      = $admin ->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,$page_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $admin ->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        var_dump($list);
        var_dump($show);

        $this ->assign("admins",$list);
        $this->assign('page',$show);// 赋值分页输出
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

            $admins = D('Common/Admin');

            $data['username']  =  I('username');
            $data['id']  =  I('id');

            $info = $admins->find($data['id']);

            if($_POST['password'] != null ){
                $data['password']  =  md5(trim(I('password')));
            }else{
                $data['password']  =  $info['password'];
            }
//            var_dump($data);

            if( $admins ->create($data)){
                $res = $admins->save();
                if($res !==false ){
                    $this->success('修改管理员成功',U('lst'));
                }else{
                    $this->error('修改管理员失败');
                }
            }else{
                $this->error($admins->getError());
            }

        }else{
            $admins  = D('Common/Admin');
            $admin   = $admins->find(I('id'));
            $this->assign('admin',$admin);
            $this->display();
        }
    }

    public function delete(){
        $admins  = M('Admin');

        if($admins->delete(I('id'))){
            $this->success('删除管理员成功',U('lst'));
        }else{
            $this->error('删除管理员失败');
        }
    }

}