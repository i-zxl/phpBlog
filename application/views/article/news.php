<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/news.css">
<div class='main'>
    <div class='content'>
        <h1><?php echo $articles[0]['titile'] ?></h1>
        <span>分类：<?php echo $articles[0]['keyword']; ?></span>
        <div style="padding-top:10px; ">
            <?php echo $articles[0]['content']; ?>
        </div>
    </div>
     <div class="message_box">
                <div class='message_content'>
                    <h1>评论</h1>
                    <?php if ($all_keyword_article): ?>
                            <?php foreach ($all_keyword_article as $key => $messvalue): ?>
                                    <div class='commit'>
                
                                        <span class='user'><?php echo $messvalue['C_name']; ?> &nbsp;说：</span>
                                         <p><?php echo $messvalue['C_message'];?></p>
                                        <?php if ($messvalue['mess']): ?>

                                            <?php foreach ($messvalue['mess'] as $key => $replymess): ?>
                                                <div class="reply">
                                                    <span class='user'>
                                                        <?php echo $replymess['C_name']; ?> &nbsp;对&nbsp; <?php echo $messvalue['C_name'];?>&nbsp;说： 
                                                    </span>
                                                    <p><?php echo $replymess['C_message'];?></p>
                                                </div>
                                            <?php endforeach ?>
                                        <?php endif ?>
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