<style>
    .main{
        margin:0 10%;
        word-break: break-all; word-wrap:break-word;
    }
    .content{
        background-color: #fff;
        width: 80%;
        padding: 12px;
    }
    .message_content,.content{
        margin: 0 auto;
    }
    .message_content{
        box-sizing: border-box;
        padding: 12px;
        background-color: #FAF1F1;
        width: 82%;
    }
    .commit{
        position: relative;
        bottom: 10px;
        display: block;
        padding: 12px;
    }
    .message_form,.commit{
        width: 83%;
        margin:0 auto;
    }
    .commit .user{
        
        font-size: 1.5em;
    }
    .commit .commit_tag{
        position: absolute;
        right: 0;
        top: 80%;
    }
   
    .message_form input,.message_form textarea{
        border:2px solid #fff;
        width:100%;
        display: table-cell;
        margin-top: 20px;
        padding: 6px;
        margin-bottom: 10px;
    }
    .message_form textarea{
        width:99.4%;
    }
</style>

<div class='main'>
    <div class='content'>
        <h1><?php echo $row[0]['titile'] ?></h1>
        <span>分类：<?php echo $row[0]['keyword']; ?></span>
        <div style="padding-top:10px; ">
            <?php echo $row[0]['content']; ?>
        </div>
    </div>
    <div class="message_box">
        <div class='message_content'>
            <h1>评论</h1>
            <div class='commit'>
                <p class='user'>user</p>
                <div>
                    contentdsadasdsadasddasdsadsdsdasdssdfgsfdsfgdgdfsdfgsfdsfgdgdfsdfgsfdsfgdgdfsdfgsfdsfgdgdfsdfgsfdsfgdgdfsdfgsfdsfgdgdfadsad
                </div>
                <div class='commit_tag'>
                    <span>data</span>
                    <span><a href="">回复</a></span>
                </div>
            </div>
            <div class='commit'>
                <span class='user'>user</span>
                <div>
                    sdfgsfdssdfgsfdsfgdgdfsdfgsfdsfgdgdfsdfgsfdsfgdgdfsdfgsfdsfgdgdfsdfgsfdsfgdgdfsdfgsfdsfgdgdfsdfgsfdsfgdgdfsdfgsfdsfgdgdffgdgdf
                </div>
                <div class='commit_tag'>
                    <span>data</span>
                    <span><a href="">回复</a></span>
                </div>
            </div>
            <div class='commit'>
                <span class='user'>
                    user
                </span>
                <div>
                   <p>sdfgsfdsfsdfgsfdsfgdgdfsdfgsfdsfgdgdfsdfgsfdsfgdgdfsdfgsfdsfgdgdfsdfgsfdsfgdgdfgdgdf</p>
                </div>
                <div class='commit_tag'>
                    <span>dsdsd</span>
                    <span><a href="">回复</a></span>
                </div>
            </div>
        </div>
        <div class='message_form'>
            <span>
                <strong>发表看法</strong>
            </span>
            <form action="" method="POST">
                <label for="">
                    <input type="text" name='user' placeholder="用户名">
                </label>
                <label for="">
                    <textarea name="message" placeholder='吐槽一下吧！'  rows="10"></textarea>
                </label>
                <label for="">
                    <input type="submit" value="发表">
                </label>
            </form>
        </div>
    </div>
</div>