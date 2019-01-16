<?php
/**
 * status
 *
 * @package custom
 */
?>
<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('header.php');
?>
<div class="site-wrap">
    <div class="flex-left">
        <div class="left-side">
            <div class="inside">
                <div id="content" class="content">
                    <div class="post_content main2">
                        <div class="pcontent">
                            <h1 class="post_entry"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                            <p class="post_meta">
                                <!-- <span class="head_meta">Category&nbsp;:&nbsp;<?php $this->category(',', false); ?></span> -->
                                <span class="head_meta">Views&nbsp;:&nbsp;<?php get_post_view($this) ?></span>
                                <span class="head_meta">Comments&nbsp;:&nbsp;<?php $this->commentsNum('0','1','%d'); ?></span>
                                <span>Posted on&nbsp;:&nbsp;<time style="font-size: 12px;" datetime="<?php $this->date('Y-m-d'); ?>"><?php $this->date(); ?></time></span>
                            </p>
                            <div class="post_body">
                                <?php $this->content(); ?>
                                <?php if(!($this->fields->aplayerurl == '' && $this->fields->aplayerthumb == '')): ?>
                                    <?php $this->need('aplayer.php'); ?>
                                <?php endif; ?>
                            </div>
                            <p class="post_tag">
                                <span class="head_meta" style="border: none;">Posted by&nbsp;:&nbsp;<?php $this->author(); ?></span>
                                <!-- <span>Tags&nbsp;:&nbsp;<?php $this->tags(' , ', true, '此页面未设置标签'); ?></span> -->
                            </p>
                            <?php include("copyright.php"); ?>
                            <div class="post_comments">
                                <div class="comments_body">
                                    <?php $this->need('comments.php'); ?>
                                </div>   
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->need('sidebar.php'); ?>
    <?php $this->need('footer.php'); ?>