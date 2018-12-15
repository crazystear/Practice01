<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
    function threadedComments($comments, $options) {
        $commentClass = '';
        if ($comments->authorId) {
            if ($comments->authorId == $comments->ownerId) {
                $commentClass .= ' comment-by-author';
            } else {
                $commentClass .= ' comment-by-user';
            }
        }
        $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
        if ($comments->url) {
            $author = '<a href="' . $comments->url . '" target="_blank" rel="external nofollow">' . $comments->author . '</a>';
        } else {
            $author = $comments->author;
        }
?>
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
<div id="<?php $comments->theId(); ?>">
    <div class="comment-author">
            <?php $comments->gravatar('40', ''); ?>
            <cite class="fn"><?php echo $author; ?></cite>
        </div>
        <div class="comment-meta">
            <a href="<?php $comments->permalink(); ?>"><?php $comments->date('F jS\, Y \a\t h:i:s A'); ?></a>
            <span class="comment-reply"><?php $comments->reply(); ?></span>
        </div>
        <div class="comment-content">
            <span>
                <?php get_commentReply_at($comments->coid); ?>
                <?php $cos = preg_replace('#</?[p|P][^>]*>#','',$comments->content);echo $cos;?>
            </span>
        </div>

    </div>
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
    
    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <?php if($this->commentsNum === '0'): ?>
    <div id="<?php $this->respondId(); ?>" class="respond" style="margin-top: 0px;">
    <?php else: ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
    <?php endif; ?>
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    
        <h3 id="response"><?php _e('添加新评论'); ?><?php if($this->user->hasLogin()): ?>（已登陆：<?php $this->user->screenName(); ?>）<a style="display: inline;font-size: 12px;" href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?></a><?php endif; ?></h3>
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <div class="post_comment_area">
                <p>
                    <textarea placeholder="来都来了，说两句吧！" rows="8" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
                </p>
            </div>
                <?php if($this->user->hasLogin()): ?>
                    <div class="post_comment_meta" style="flex: 0;padding-right: 0;">
                <?php else: ?>
                    <div class="post_comment_meta">
                <p>
                    <input placeholder="昵称 *" type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required />
                </p>
                <p>
                    <input onblur="showAva(this.value)" placeholder="邮箱 *" type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                </p>
                <p>
                    <input placeholder="http://" type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                </p>
                <?php endif; ?>
            </div>
            <div class="post_comment_submit">
                <p id="showAvatar"><img style="width: 80px;" src="https://sunxyu.cn/img/avatar.jpg"></p>
                <p>
                    <button type="submit" class="submit"><?php _e('提交评论'); ?></button>
                </p>
            </div>   
        </form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>
<!-- gravatar头像 -->
<script type="text/javascript">
    function showAva(str) {
        if(window.XMLHttpRequest){
            var xhr = new XMLHttpRequest();
        }else{
            var xhr = new ActiveXobject('Microsoft.XMLHTTP');
        }
        xhr.onreadystatechange = function(){
            //console.log(xhr.readyState);
            if(xhr.status == 200 && xhr.readyState == 4){
                document.getElementById('showAvatar').innerHTML = xhr.responseText;
            }
        }
        //进行请求的初始化
        xhr.open('get', '../usr/themes/practice01/show_avatar.php?n1='+str, true);
        //正式发送请求
        xhr.send();
    }
</script>
