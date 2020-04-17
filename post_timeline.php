<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<head>
    <?php $this->header(); ?>
    <style type="text/css">
        .tlArrow {
            height: 0;
            width: 0;
            float: right;
            margin-right: 40px;
            border-width: 8px;
            border-style: solid;
            border-color: #f1f1f1 #fff #fff #fff;
        }
    </style>
</head>
<body>
    <div class="tlArrow"></div>
    <div class="flex-left-gallery">
        <div class="left-side">
            <div class="inside">    
                <div class="gallery_comment" style="border-radius: 0;box-shadow: none;border-top: 1px solid #f1f1f1;">
                    <div class="post_comments" style="padding: 10px;">
                        <div class="comments_body">
                            <?php $this->need('comments.php'); ?>
                        </div>   
                    </div>
                </div>    
            </div>
        </div>
    </div>
</body>