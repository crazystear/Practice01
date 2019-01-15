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
<?php
    $host = 'https://cdn.v2ex.com';
    $url = '/gravatar/';
    $size = '40';
    $rating = Helper::options()->commentsAvatarRating;
    $cusAva = Helper::options()->commentAuthorAvatar;
    $hash = md5(strtolower($comments->mail));
    $email = strtolower($comments->mail);
    $sjtx = Typecho_Widget::widget('Widget_Options')->motx;    
    $qqnumber = str_replace('@qq.com', '', $email);
    if (!($cusAva == '') && $comments->authorId == $comments->ownerId) {
        $avatar = $cusAva;
    }elseif (strstr($email,"qq.com") && is_numeric($qqnumber) && strlen($qqnumber) > 4 && strlen($qqnumber) < 12) {
        $avatar = 'https://q.qlogo.cn/g?b=qq&nk='.$qqnumber.'&s='.$size.'';
    }else {
        $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d='.$sjtx;
    }
?>
    <div class="comment-author">
            <img class="avatar"
     src="<?php echo $avatar; ?>" alt="<?php echo $comments->author; ?>" width="<?php echo $size ?>" height="<?php echo $size ?>" />
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
                    <input placeholder="http://" type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" onfocus="getUrl()" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                </p>
                <?php endif; ?>
            </div>
            <div class="post_comment_submit">
                <p id="showAvatar">
                    <?php if($this->user->hasLogin()): ?>
                        <?php
                            $masterMail = $this->user->mail;
                            $cusAvatar = $this->options->commentAuthorAvatar;
                            $mdmdmd5 = md5(strtolower(trim($masterMail)));
                            $qnum = str_replace('@qq.com', '', $masterMail);
                            if (!($cusAvatar == '')) {
                                $avatarLoged = $cusAvatar;
                            }elseif (strstr($masterMail,"qq.com") && is_numeric($qnum) && strlen($qnum) > 4 && strlen($qnum) < 12) {
                                $avatarLoged = 'https://q.qlogo.cn/g?b=qq&nk='.$qnum.'&s=100';
                            }else {
                                $avatarLoged = 'https://cdn.v2ex.com/gravatar/' . $mdmdmd5 . '?s=80';
                            }
                        ?>
                        <img style="width: 80px;height: 80px;" src="<?php echo $avatarLoged; ?>">    
                    <?php else: ?>
                        <img style="width: 80px;height: 80px;" src="https://cdn.v2ex.com/gravatar/?s=80">
                    <?php endif; ?>
                </p>
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
        xhr.open('get', '<?php $this->options->themeUrl('./show_avatar.php?n1='); ?>'+str, true);
        //正式发送请求
        xhr.send();
    }
    function getUrl() {
        var getUrl = document.getElementById("url").value;
        if (getUrl == "") {
            document.getElementById("url").value = "http://";
        }
    }
</script>
