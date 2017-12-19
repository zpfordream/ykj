<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends Controller {

    public function lst(){

        $link = D('Common/Link');
        $links = $link->select();

        $this->assign('links',$links);
        $this->display();
    }

    public function add(){
        if(IS_POST){

            $data['title']  = trim($_POST['title']);
            $data['url']  = trim($_POST['url']);
            $data['desc']  = trim($_POST['desc']);

            $link = D('Common/Link');

            if( $link ->create($data)){
                if( $link ->add()){
                    $this->success('新的链接提交成功',U('lst'));
                }else{
                    $this->error('新的链接提交失败');
                }
            }else{
                $this->error($link->getError());
            }

        }else{
            $this->display();
        }
    }

    public function edit(){

        $this->display();
    }
}