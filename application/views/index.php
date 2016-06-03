    <script src="<?php echo base_url(); ?>public/script/showview.js"></script>
<style>
    .main{
        margin:0 auto;
        width:100%;
        min-width: 650px;
        position: relative;
        font-family: Georgia, serif
    }
    .search{
        width: 100%;
        height: 30px;
    }
    .entries .entry{
        padding: 6px;
        border-width: 1px;
        border-top-style:dashed;
        font-weight: 600;
        line-height: 1.5em;
        clear:both;
    }
     .entries .entry:hover{
        background-color: #F8F9FA;
     }
    .content{
        word-break: break-all; word-wrap:break-word;
        width: 60%;
        float:left;
        background-color: #fff;
        padding:12px;
    }
    
    /*文章列表区域*/
    .content .entries{
        color:#909090;
        list-style: none;
        margin: 0;
        padding-left: 0;
        padding-bottom: .5em;
        box-sizing: border-box;
        outline: none;
    }
    .content .entry{
        padding: 0.5em 1em;
        margin: 0.2em 0 5em 0;
        -webkit-transition: background-color,.3s;
        transition: background-color,.3s;
        border-radius: 4px;
        text-align: -webkit-match-parent;
    }
    .entry_container{
        cursor: pointer;
    }
    .entry .entry-collection {
        top: 1.2em;
    }
    .entry:hover{
        background-color:#f8f9fa;
    }
    .entry-collection {
        position: relative;
        float: left;
        margin-right: 1em;
        padding: .6em 0;
        border-radius: 4px;
        width: 3em;
        /*text-align: center;*/
        cursor: pointer;
        font-size: .8em;
        -webkit-transition: color,.3s;
        transition: color,.3s;
    }
    /*小图标样式*/
    .entry-collection i{
        height:5px; 
        width:5px; 
        display:block;
        left:-2px;
        position:relative;
    } 
    .demoSpan1{
        height:20px;
    }

    .demoSpan1:before{
        content:''; 
        height:0; 
        width:0; 
        display:block; 
        border:5px transparent solid; 
        border-top-width:0; 
        border-bottom-color:#2196F3;
    }
    /*图片样式*/
    .entry-screenshot {
        float: left;
        position: absolute;
        cursor: pointer;
        margin-left: 1.7em;
        margin-right: 1em;
        padding-top: .7em;
    }
    .entry-screenshot .entry-screenshot-img {
        position: relative;
        width: 100px;
        height: 60px;
        border-radius: 2px;
        display: block;
    }
    .entry-screenshot img {
        border: 0;
    }
    /*文章详情*/
    .entry-infor {
        width: 50%;
        float: left;
        padding: .9em 0;
    }
    .entry-infor .entry-title,.entry-tag{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        position: relative;
        left: 7em;
        top: 0;
    }
    .entry-title a{
        color:#819EE6;
        font-size:1.2em;
        line-height: 1.2em;
    }
    
    .tag{
        display: inline-block;
        font-size: 0.8em;
        margin-right:0.8em;
    }
    .entries a:hover,.tag:hover{
        color:#000;
    }
    .entry .entry-meta {
        position: relative;
        float: right;
        padding-top: 1.5em;
        /*background-color: red;*/
    }
    
    .entry-meta img{
        width: 30px;
        height:30px;
        border-radius: 15px;
        border: 0px solid #111;
    }
    .entry-meta .details{
        display: none;
        text-align: center;
        box-sizing: border-box;
        padding: 5px;
        position: absolute;
        top: -10px;
        left: -120px;
        width:100px;
        height: 100px;
        background-color: #Ccc333;
    }
    .share_box{
        margin-top:22%;
    }

    .details span{
        font-size: 12px;
        margin: 2px;
    }
   
</style>
<div class='main'>
    <div class="article_list">
        <!-- start 输出最近动态 -->
        <?php 
         echo "<h1>".$title."</h1>";
         ?>
       <!-- start 逆序输出最近发布的文章-->
        <?php
         if ($articles) {
             for ($i=count($articles)-1; $i >=0 ; $i--) { 

         ?>
           <li><a href="<?php echo site_url('Blog/get_one_article/'.$articles[$i]['id']); ?>">  
            <?php 
            echo $articles[$i]['titile'];
             ?>
             </a></li>
        <?php 
            }
         }
         ?>
    </div> 
    
    <div class="content">
        <div class="search"></div>
        <ul class='entries'>
            <?php if ($articles): ?>
                    <?php foreach ($articles as $key => $article): ?>
                    <li class='entry'>
                    <div class='entry_container'>
                        <div class="entry-collection">
                            <i class="demoSpan1"></i>
                            <div class='count_all'><?php echo $article['good']; ?></div>
                        </div>
                        <div class='entry-screenshot'>
                            <img class='entry-screenshot-img' src="http://ac-mhke0kuv.clouddn.com/3e76a2518467866a3a6e.jpg?imageView/1/w/100/h/100/q/80/format/png" alt="">
                        </div>
                        <div class='entry-infor'>
                            <div class='entry-title'>
                                <a href=""><?php echo $article['titile']; ?></a>
                            </div>
                            <div class='entry-tag'>
                                <div class='entry-time tag'>发布时间:<?php echo $article['time']; ?></div>
                                <div class='entry-classify tag'>分类:<?php echo $article['keyword']; ?></div>
                            </div>
                        </div>
                        <div class='entry-meta'>
                            <div class='entry-imgs'>
                               <img class="entry_img" src="http://ac-mhke0kuv.clouddn.com/479cd8fafaf8fd5824e3.png?imageView/1/w/100/h/100/q/80/format/png" alt="">
                            </div>
                            <div class='details'>
                                   <div class='share_box'>
                                       <div>阅读</div>
                                       <span><?php echo $article['pageview']; ?></span>
                                   </div>
                               </div>
                        </div>
                    </div>
                </li>
                <?php endforeach ?>
            <?php endif ?>
        </ul>
    </div>
      <div class='related_links'>
        <h1>相关链接</h1>
        <ul>
            <li><a href="">github</a></li>
            <li><a href="">阮一峰博客</a></li>
            <li><a href="">w3c</a></li>
            <li><a href="">图灵社区</a></li>
            <li><a href="">知乎</a></li>
            <li><a href="">实验楼</a></li>
        </ul>
    </div>
</div>

