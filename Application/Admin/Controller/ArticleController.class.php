<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {


    public function lst(){

        $page_num = 3 ;   //设置分页条数
        $article = D('Common/Article');

        //分页
        $count      = $article ->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,$page_num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $article ->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
//        var_dump($list);

        $this->assign('articles',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }

    public function add(){
        if(IS_POST){

            $data['title']  = trim(I('title'));
            $data['url']  = trim(I('url'));
            $data['desc']  = trim(I('desc'));

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

        if(IS_POST){

            $data['title']  = trim(I('title'));
            $data['url']  = trim(I('url'));
            $data['desc']  = trim(I('desc'));
            $data['id']  = trim(I('id'));

            $link = D('Common/Link');

            if( $link -> create( $data ) ){
                $result = $link ->save();
                if($result !== false){
                    $this->success('链接修改成功',U('lst'));
                }else{
                    $this->error('链接修改失败');
                }
            }else{
                $this->error($link->getError());
            }


        }else{

            $data['id'] = I('id') + 0 ;

            $links = M('Link');
            $link = $links->find($data['id']);
//            var_dump($link);

            $this->assign('link',$link);
            $this->display();
        }

    }

    public function delete(){

        $id = I('id');
        $link = M('link');
        if($link->delete($id)){
            $this->success('删除链接成功',U('lst'));
        }else{
            $this->error('删除链接失败');
        }

    }
}