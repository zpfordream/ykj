<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>/ykj</title>
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1/ykj/Application/Admin/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1/ykj/Application/Admin/Public/css/main.css"/>
    <script type="text/javascript" src="http://127.0.0.1/ykj/Application/Admin/Public/js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员:<?php echo $_SESSION['username'];?></a></li>
                <li><a href="/ykj/index.php/Admin/Admin/edit/id/<?php echo $_SESSION['id'];?>">修改密码</a></li>
                <li><a href="/ykj/index.php/Admin/Admin/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="/ykj/index.php/Admin/Article/lst"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                        <li><a href="/ykj/index.php/Admin/Cate/lst"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="/ykj/index.php/Admin/Link/lst"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="/ykj/index.php/Admin/Admin/lst"><i class="icon-font">&#xe008;</i>管理员管理</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">作品管理</a><span class="crumb-step">&gt;</span><span>新增作品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/ykj/index.php/Admin/Article/edit" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th>文章标题：</th>
                                <td><input class="common-text" name="title" size="50" value="<?php echo ($article["title"]); ?>" type="text"></td>
                            </tr>
                            <tr>
                                <th>文章类别：</th>
                                <td><select name="cateid" id="">
                                    <option value="0">请选择类别</option>
                                    <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"   <?php if( $vo['id'] == $article['cateid'] ): ?>selected="selected"<?php endif; ?>   >
                                            <?php echo ($vo["catename"]); ?>
                                        </option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>文章简介：</th>
                                <td><input class="common-text" name="desc" size="50" value="<?php echo ($article["desc"]); ?>" type="text"></td>
                            </tr>
                            <tr>
                                <th>文章内容：</th>
                                <td><input class="common-text" name="content" size="50" value="<?php echo ($article["content"]); ?>" type="text"></td>
                            </tr>
                            <tr>
                                <th>文章图片：</th>
                                <td>
                                    <?php if( $article['pic'] != '' ): ?><img src="/ykj/<?php echo ($article["pic"]); ?>" alt="" size="50" width="100">
                                    <?php else: ?>
                                        暂无上传图片<?php endif; ?>
                                    <input class="common-text" name="pic" size="50" value="pic" type="file"></td>
                            </tr>

                            <tr>
                                <th></th>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo ($article["id"]); ?>">
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>