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
                                    <?php
                                        $t_content = $this->content;
                                        $t_content = preg_replace('/(\[addvideo2\])(http:|https:)(.*?),(http:|https:)(.*?),(.*?)(\[\/addvideo2\])/i','<a data-fancybox data-width="640" data-height="360" href="$2$3" data-caption=""><img data-original="$4$5" class="lazyload" src="'.$loadingPicAddr.'" alt="" title=""></a>', $t_content);
                                        echo $t_content; 
                                    ?>
                                    <!-- <?php if(!($this->fields->videorurl == '' && $this->fields->videoname == '' && $this->fields->videothumb == '')): ?>
                                        <?php $this->need('videoplayer.php'); ?>
                                    <?php endif; ?> -->
                            </div>
                            <!-- <?php if(!($this->fields->aplayerurl == '' && $this->fields->aplayerthumb == '')): ?>
                                <?php $this->need('aplayer.php'); ?>
                            <?php endif; ?> -->
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
</div>
<script type="text/javascript" src="https://cdn.staticfile.org/jquery/2.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.staticfile.org/masonry/4.2.2/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="https://cdn.staticfile.org/jquery_lazyload/1.9.7/jquery.lazyload.min.js"></script>
<!-- 图片懒加载结合masonry -->
<script type="text/javascript">
$(function() {    
    $(".lazyload").lazyload({
        effect: 'fadeIn',
        load : f_masonry,
    });
});
window.onload = function() {
        f_masonry();
    }
</script>
<!-- 瀑布流方法 -->
<?php if($this->category == 'timeline' && !$this->is('index')): ?>
<script type="text/javascript">
function f_masonry() {
    $('#content').masonry({
        itemSelector: '.main2',
        isAnimated: true,
        horizontalOrder: true,
        });
    }
</script>
<?php else: ?>
<script type="text/javascript">
function f_masonry() {
    $('#content').masonry({
        itemSelector: '.main2',
        isAnimated: true,
        });
    }
</script>
<?php endif; ?>