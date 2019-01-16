<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('header.php');
?>
<?php if($this->fields->postGallery == 'isGallery'): ?>                             
    <?php include("post_gallery.php") ?>
<?php else: ?>
<div class="site-wrap">
    <div class="flex-left">
        <div class="left-side">
            <div class="inside">
                <div id="content" class="content">
                    <div class="post_content main2">
                        <div class="pcontent">
                            <h1 class="post_entry"><a href="<?php $this->permalink() ?>"><?php $this->title() ?>
                                <?php if ($this->fields->postTop == 'keeptop'): ?>
                                    <span style="color:#ff0000;font-size:12px;">【置顶】</span>
                                <?php endif; ?>
                                </a></h1>
                            <p class="post_meta">
                                <span class="head_meta noneformo">Category&nbsp;:&nbsp;<?php $this->category(',', false); ?></span>
                                <span class="head_meta">Views&nbsp;:&nbsp;<?php get_post_view($this) ?></span>
                                <span class="head_meta">Comments&nbsp;:&nbsp;<?php $this->commentsNum('0','1','%d'); ?></span>
                                <span>Posted on&nbsp;:&nbsp;<time style="font-size: 12px;" datetime="<?php $this->date('Y-m-d'); ?>"><?php $this->date(); ?></time></span>
                            </p>
                            <div class="post_body">
                                    <?php $this->content(); ?>
                            </div>
                            <?php if(!($this->fields->aplayerurl == '' && $this->fields->aplayerthumb == '')): ?>
                                <?php $this->need('aplayer.php'); ?>
                            <?php endif; ?>
                            <p class="post_tag">
                                <span class="head_meta">Posted by&nbsp;:&nbsp;<?php $this->author(); ?></span>
                                <span>Tags&nbsp;:&nbsp;<?php $this->tags(' , ', true, '本文未设置标签'); ?></span>
                            </p>
                            <?php include("copyright.php"); ?>
                            <div class="pre_nex">
                                <div class="post_pre">
                                    <span><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;Previous post</span>
                                    <?php $this->thePrev('%s','已到最后一篇'); ?>   
                                </div>
                                <div class="post_nex">
                                    <span>Next post&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                                    <?php $this->theNext('%s','已到最新一篇'); ?>
                                </div>
                            </div>
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
    <?php endif; ?>
    <?php $this->need('footer.php'); ?>