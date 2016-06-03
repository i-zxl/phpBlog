<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/index.css">
<script src="<?php echo base_url(); ?>public/script/showview.js"></script>
<div class='main'>
    <div class="article_list">
        <!-- start 输出最近动态 -->
        <?php 
         echo "<h1>".$title."</h1>";
         ?>
       <!-- start 逆序输出最近发布的文章-->
       <?php if ($articles): ?>
           <?php for($i=count($articles)-1; $i >=0 ; $i--): ?>
        
           <li><a href="<?php echo site_url('Blog/get_one_article/'.$articles[$i]['id']); ?>">  
            <?php echo $articles[$i]['titile'];?>
             </a></li>
            <?php endfor ?>
        <?php endif ?>
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

