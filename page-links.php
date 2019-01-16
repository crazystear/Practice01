<?php
/**
 * links
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
                            <div class="post_body">
                                <?php $this->content(); ?>
                                <div><?php innerlinks($this->options->innerlinkshow); ?></div>
                                <?php if(!($this->fields->aplayerurl == '' && $this->fields->aplayerthumb == '')): ?>
                                    <?php $this->need('aplayer.php'); ?>
                                <?php endif; ?>
                            </div>
                            <p class="post_tag">
                                <span class="head_meta" style="border: none;">Made by&nbsp;:&nbsp;<?php $this->author(); ?></span>
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