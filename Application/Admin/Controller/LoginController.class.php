<?php
/**
 * Created by PhpStorm.
 * User: ZP
 * Date: 2017/12/25
 * Time: 22:16
 */

namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {


    public function login(){

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






}