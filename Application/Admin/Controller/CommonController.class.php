<?php
/**
 * Created by PhpStorm.
 * User: 益彩通
 * Date: 2017-12-27
 * Time: 11:32
 */


namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller {

    public function __construct()
    {
        parent::__construct();

        if( !session('id') ){
            $this->error('您还没有登录',U('Login/login'));
        }
    }

}