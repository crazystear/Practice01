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
                            <p class="post_copyright">
                                <span>所有原创文章采用 <a href="https://creativecommons.org/licenses/by-nc/4.0/deed.zh" target="_blank">知识共享署名-非商业性使用 4.0 国际许可协议</a> 进行许可。</span><br/>
                                <span>您可以自由的转载和修改，但请务必注明文章来源并且不可用于商业目的。</span><br/>
                                <span>本站部分内容收集于互联网，如果有侵权内容、不妥之处，请联系我们删除。敬请谅解！</span><br/>
                            </p>
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