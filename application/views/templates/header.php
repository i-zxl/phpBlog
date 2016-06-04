<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="<?php echo base_url(); ?>public/script/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <script src="<?php echo base_url(); ?>public/script/login.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/header.css">
   
</head>
<body>
    <header>
        <nav>
            <ul>
                <?php 
                //创建一个数组存放分类
                $nav_ul = array();
                //将文章的分类提取出来
                for ($i=0; $i < count($articles) ; $i++) { 
                    $nav_ul[$i] = $articles[$i]['keyword'];
                }
                //去重
                $nav_ul = array_unique($nav_ul);
                echo "<li><a href='".site_url()."/Blog/Get_article'>首页</a></li>";
                foreach ($nav_ul as $key => $value) {
                    echo "<li><a href='".site_url()."/Blog/get_keyword_arricle/".$value."'>".$value."</a></li>";
                }
                echo "<li class='login'><a class='loginBtn' href='#''>登录</a></li>";
                 ?>
            </ul>
        </nav>
    </header>
    <div class="mask">
        <div class='login_box'>
            <div class="close_box">
                <a href=""><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
            <div class='login_content'>
                <div class='login_form'>
                    <h1 class="login_h1">欢迎登录小来子的博客</h1>
                    <form action="" method="POST">
                        <label for="">
                            <span>用户名：</span>
                            <input type="text">
                        </label>
                        <label for="">
                            <span>密码：</span>
                            <input name='pwd' type="text">
                        </label>
                        <label for='login'>
                            <input type="button" value='登录'>
                        </label>
                    </form>
                </div>
                <div class='help'>
                    <ul>
                        <li><a class="login_link" href="#">还没有账号？</a></li>
                        <li><a class="forgotpwd" href="#">忘记密码</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class='register_box'>
            <div class="close_box">
                <a href=""><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
            <div class='register_content'>
                    <div class='register_form'>
                        <h1 class="login_h1">欢迎注册小来子的博客</h1>
                        <form action="">
                            <label for="username"><span>用户名：</span><input type="text"></label>
                            <label for="pwd"><span>密码：</span><input type="pwd"></label>
                            <label for=""><span>确认密码：</span><input type="pwd"></label>
                            <label for='login'><input type="button" value='注册'></label>
                        </form>
                    </div>
            </div>
            
        </div>
    </div>