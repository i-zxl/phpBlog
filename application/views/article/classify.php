<script src="<?php echo base_url(); ?>public/script/classify.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/classify.css">
<!-- 查询分页 -->
    <div class='article_list'>
        <h1><?php echo $classify; ?></h1>
        <?php if ($allcount): ?>
            <?php foreach ($allcount as $key => $value): ?>
                <li><a href="<?php echo site_url('Blog/get_keyword_arricle/?keyword='.$value['keyword']."&per_page=".($key+1)); ?>"><?php echo $value['titile']; ?></a></li>
            <?php endforeach ?>
        <?php endif ?>
    </div>
    <div class='related_links'>
        <h1>相关链接</h1>
        <ul>
            <li><a href="">github</a></li>
            <li><a href="http://www.ruanyifeng.com/home.html">阮一峰博客</a></li>
            <li><a href="">w3c</a></li>
            <li><a href="">图灵社区</a></li>
            <li><a href="">知乎</a></li>
            <li><a href="">实验楼</a></li>
        </ul>
    </div>

    <div class='main'>
        <div class="classifys">
            <?php 
            foreach ($all_keyword_article[0] as $key) {
             ?>
            <h1><?php echo $key['titile']; ?></h1>
            <div class='classify-tag'>
                <span>分类：<?php echo $key['keyword'];?></span>
                <span>阅读量:  <?php echo $key['pageview']; ?> </span>
                <span>评论： <?php echo count($all_keyword_article[1]); ?> </span>
                <span>喜欢：</span>
                <div class="content">
                    <p>
                        <?php echo $key['content'];?>
                    </p>
                </div>
            <?php }; ?>
            </div>
            <div class='page'>
                    <?php
                    //显示并分页
                    echo $this->pagination->create_links();
                 ?>            
            </div>
            <!-- 吐槽 -->
            <div class="message_box">
                <div class='message_content'>
                    <h1>评论</h1>
                    <?php if ($all_keyword_article[1]): ?>
                            <?php foreach ($all_keyword_article[1] as $key => $messvalue): ?>
                                    <div class='commit'>
                
                                        <span class='user'><?php echo $messvalue['C_name']; ?> &nbsp;说：</span>
                                        <p><?php echo $messvalue['C_message'];?></p>
                                            <?php foreach ($messvalue['mess'] as $key => $replymess): ?>
                                                <div class="reply">
                                                    <span class='user'>
                                                        <?php echo $replymess['C_name']; ?> &nbsp;对&nbsp; <?php echo $messvalue['C_name'];?>&nbsp;说： 
                                                    </span>
                                                    <p><?php echo $replymess['C_message'];?></p>
                                                </div>
                                            <?php endforeach ?>
                                        <div class='commit_tag'>
                                            <span><a href="">回复</a></span>
                                        </div>
                                    </div>
                    <?php endforeach ?>
                    <?php else: ?>
                        <?php echo '还没有评论哟！赶紧抢沙发'; ?>
                    <?php endif ?>
                    
                <div class='message_form'>
                    <span>
                        <strong>发表看法</strong>
                    </span>
                    <form class='message-form' action="" method="POST">
                        <label for="">
                            <input type="text" name='message-user' placeholder="用户名">
                        </label>
                        <label for="">
                            <textarea name="message-content" placeholder='吐槽一下吧！'  rows="10"></textarea>
                        </label>
                        <label for="">
                            <input type="submit" value="发表">
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>