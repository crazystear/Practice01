<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('header.php');
?>
<div class="site-wrap">
    <div class="flex-left">
        <div class="left-side">
            <div class="inside">
                <div id="content" class="content">
                    <?php while($this->next()): ?>
                        <?php include("post_common.php"); ?>
                    <?php endwhile; ?>
                </div>
                <div id="ajaxloadpost" style="padding: 0 10px;">
                    <?php $this->pageLink('下一页','next'); ?>
                </div>
                    <div id="showtext"></div>
                </div>                
            </div>
        </div>
        <?php $this->need('sidebar.php'); ?>
        <?php $this->need('footer.php'); ?>