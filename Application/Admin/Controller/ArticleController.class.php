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
            $data['cateid']  =  I('cateid') +  0;
            $data['desc']  = trim(I('desc'));
            $data['content']  = trim(I('content'));
            $data['time']  = time() ;

            //var_dump($_POST);
            //var_dump($_FILES);
            if($_FILES['pic']['tmp_name'] != ''){

                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  =     './'; // 设置附件上传根目录
                $upload->savePath  =     './Public/Uploads/'; // 设置附件上传（子）目录

                // 上传文件,相关资料
                $info   =   $upload->uploadOne($_FILES['pic']);
                if(!$info) {
                    // 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{
                    // 上传成功
                    $data['pic'] = $info['savepath'].$info['savename'];
                    //var_dump($info);
                    //var_dump( $data);
                }
            }

            $Article = D('Common/Article');

            if( $Article ->create($data)){
                if( $Article ->add()){
                    $this->success('新的文章提交成功',U('lst'));
                }else{
                    $this->error('新的文章提交失败');
                }
            }else{
                $this->error($Article->getError());
            }

        }else{
            $cate = M('Cate');
            $cates = $cate->select();
            $this->assign('cates',$cates);
            $this->display();
        }
    }

    public function edit(){

        if(IS_POST){
            var_dump($_POST);
            var_dump($_FILES);
//            $data['title']  = trim(I('title'));
//            $data['url']  = trim(I('url'));
//            $data['desc']  = trim(I('desc'));
//            $data['id']  = trim(I('id'));
//
//            $link = D('Common/Link');
//
//            if( $link -> create( $data ) ){
//                $result = $link ->save();
//                if($result !== false){
//                    $this->success('链接修改成功',U('lst'));
//                }else{
//                    $this->error('链接修改失败');
//                }
//            }else{
//                $this->error($link->getError());
//            }


        }else{
            $data['id'] = I('id') + 0 ;

            $Articles = M('Article');
            $Article = $Articles->find($data['id']);
            //var_dump($Article);

            //修改页面不能直接读出所有数据，只有在列表页面才能关联读取
//            $sql = "select * from ykj_Article as a join ykj_cate as b on a.cateid = b.id where a.id= ".$data['id'];
//            $model = M();
//            $article = $model->query($sql);
//            var_dump($article);
//            $article = $article['0'];

            $this->assign('article',$Article);
            $cate = M('Cate');
            $cates = $cate->select();
            $this->assign('cates',$cates);
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