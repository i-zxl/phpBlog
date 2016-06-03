<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="<?php echo base_url(); ?>public/script/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <script src="<?php echo base_url(); ?>public/script/login.js"></script>
    <style>
    html body{
        margin:0;
        padding: 0;
        word-spacing:-8px;
        letter-spacing:0px;
    }
   /* p{
        /*font-size: 12px;*/
        /*line-height: 200%;
        word-spacing:-8px;
        letter-spacing:0px;*/
    /*}*/
    a{
        text-decoration:none;
        text-transform:uppercase;
    }
     body{
        background-color: #f8f9fa;
        
    }
    header{
        width: 100%;
        height:50px;
        min-width: 650px;
        background-color: #fff;
        border-bottom: 1px solid #f1f1f1;
    }
    body,header,nav,ul,li{
        margin:0;
        padding: 0;
        
    }
    nav{
        margin:0 auto;
        width: 70%;
        height:50px;
    }
    nav ul{
        list-style-type:none;
        overflow:hidden;
    }
    nav ul li{
        float: left;
        margin:1% 0;
        margin-left: 3%;
    }
    nav ul li a:link,nav ul li a:visited
    {
        display:block;
        font-weight:bold;
        font-variant:small-caps;
        font-size: 24px;
        color:rgba(158,158,158,1);
        /*color:#007fff;*/
        text-align:center;
        padding:4px;
        /*text-decoration:none;
        text-transform:uppercase;*/
    }
    nav ul li a:hover,nav ul li a:active
    {
        color:#B11C3F;
    }

    
    .article_list{
        float: left;
        width: 20%;
        padding-left: 7%;
        box-sizing: border-box;
        font-family: -apple-system,Arial,Microsoft YaHei,Helvetica Neue,sans-serif;
    }
    
     /*相关链接*/
    .related_links{
        box-sizing: border-box;
        float: right;
        width: 20%;
        height: 200px;
        margin-left: -200px;
        padding-left: 10px;
    }
    .related_links li,.related_links h1{
        list-style: none;
        padding: 0px 20px;
    }
    .article_list li {
        width:90%;
    }
    .article_list li,.article_list h1,.related_links li,.related_links h1{
        list-style: none;
        font-weight: 18px;
     }
    .article_list a,.related_links a{
        color:#909090;
        display: block;
        width:100%;
        box-sizing:border-box;
        -moz-box-sizing:border-box; 
         /*Firefox */
        -webkit-box-sizing:border-box; 
        /* Safari */
        text-decoration: none;
        line-height: 30px;
        padding:0px 20px 0 30px;

    }
     .article_list h1,footer h1,.related_links h1{
        font-size: 16px;
    }
     .article_list a:hover,.related_links a:hover{
        background: #ede;   
        color:black;
    }
    .article_list h1,.related_links h1{
        margin-left: 30px;
    }
    .login{
        float: right;
    }
     .mask{
        display: none;
        position: fixed;
        left: 0;
        top:0;
        height: 100%;
        width: 100%;
        background: hsla(0, 0%, 0%, .8);
        z-index: 10;
    }
    .login_box,.register_box{
        border-radius: 5px;
        position: absolute;
        width: 600px;
        height: 400px;
        top:50%;
        left:50%;
        margin-left: -300px;
        margin-top: -200px;
        background-color:#fff;

    }
    .close_box{
        width:100%;
        height: 30px;
    }
    .register_box{
        display: none;
    }
    .login_h1{
        margin-top: 15px;
        text-align: center;font-size: 25px;
        font-weight: bold;
    }
    .close_box i{
        float: right;
        padding: 6px 12px;
        font-size: 28px;
    }
    .login_content,.register_content{
        margin: 0 auto;
        width:300px;
        height:200px;
        justify-content:space-around;
        margin-top: 30px;
        padding: 6px 12px;
        font-family: inherit;
        font-size: 18px;
        font-style: inherit;
        font-weight: inherit;
    }
    .login_content form,.register_content form{
        width:100%;
    }
    .login_content form label,.register_content form label{
        float:left;
        height: 50px;
        margin-top: 15px;
        width:100%;
    }
    .login_content form label span,.register_content form label span{
        float: left;
        margin-left: 20px;
    }
    .login_content form label input,.register_content form label input{
        border-radius: 5px 5px;
        padding: 6px;
        border:2px solid #E6E3E3;
        float: right;
        margin-right: 20px;
        text-align: center;
    }
    .help ul {
        font-size: 12px;
        list-style: none;
    }
    .help ul li {
        margin-left: 20px;
        display: inline;
    }
    </style>
   
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