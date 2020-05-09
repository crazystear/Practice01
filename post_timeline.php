<?php $this->need('header.php'); ?>
<style type="text/css">
    @media screen and (min-width: 980px) {
        .flex-left {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>
<div class="site-wrap">
    <div class="flex-left">
        <div class="left-side">
            <div class="inside">
                <div id="content" class="content">
                    <div class="post_content main2">
                        <div class="pcontent">
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
<script type="text/javascript" src="https://cdn.staticfile.org/jquery/2.2.1/jquery.min.js"></script>