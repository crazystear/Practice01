<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('header.php');
?>
<style>
.box{
    text-align: center;
    position: relative;
    overflow: hidden;
    cursor: pointer;
}
.box:before,
.box:after,
.box-content:before,
.box-content:after{
    content: '';
    background: linear-gradient(transparent,rgba(0,0,0,0.9));
    height: 100%;
    width: 25%;
    transform: translateY(-101%);
    position: absolute;
    left: 0;
    top: 0;
    z-index: 1;
    transition: all 0.3s;
}
.box:hover:before,
.box:hover:after,
.box:hover .box-content:before,
.box:hover .box-content:after{
    transform: translateY(0);
}
.box:after{ left: 25%; }
.box .box-content:before{ left: 50%; }
.box .box-content:after{ left: 75%; }
.box:hover:before{ transition-delay: 0.225s; }
.box:hover:after{ transition-delay: 0.075s; }
.box:hover .box-content:before{ transition-delay: 0.15s; }
.box:hover .box-content:after{ transition-delay: 0s; }
.box img{
    width: 100%;
    height: auto;
    transition: all 0.3s ease 0s;
}
.box:hover img{ filter: grayscale(100%); }
.box .box-content{
    width: 100%;
    height: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
    transition: all 0.2s;
}
.content1{
    width: 100%;
    opacity: 1;
    position: absolute;
    left: 0;
    bottom: -30px;
    z-index: 2;
    transition: all 0.3s ease 0.1s;
}
.box:hover .content1{
    opacity: 1;
    bottom: 0px;
}
.content2{
    width: 100%;
    opacity: 1;
    position: absolute;
    left: 0;
    bottom: 0;
    z-index: 2;
    transition: all 0.3s ease 0.1s;
}
.box:hover .content2{
    opacity: 1;
    bottom: -30px;
}
.author3 {
    display: flex;
    height: 22px;
    align-items: center;
    justify-content: space-between;
}
.author3 > div {
    display: flex;
    align-items: flex-end;
    padding: 0px 10px;
}
.author3 p {
    padding: 3px 0px;
    font-size: 12px;
    color: #fff;
}
.box .post{
    font-size: 13px;
    letter-spacing: 1px;
    display: block;
    color:#fff;
    padding: 3px;
    text-shadow: 0 1px 3px rgba(88,88,88,.6);
}
/*random gallery color*/
.randomlinkscg0 { background: rgba(244,124,37,.6); }
.randomlinkscg1 { background: rgba(37,185,244,.6); }
.randomlinkscg2 { background: rgba(244,37,37,.6); }
.randomlinkscg3 { background: rgba(233,37,244,.6); }
.randomlinkscg4 { background: rgba(137,37,244,.6); }
.randomlinkscg5 { background: rgba(37,80,244,.6); }
.randomlinkscg6 { background: rgba(31,175,14,.6); }
.randomlinkscg7 { background: rgba(158,13,126,.6); }
.randomlinkscg8 { background: rgba(244,191,37,.6); }
.randomlinkscg9 { background: rgba(244,144,37,.6); }
.randomlinkscg10 { background: rgba(6,133,183,.6); }
.randomlinkscg11 { background: rgba(247,105,170,.6); }
.randomlinkscg12 { background: rgba(14,183,169,.6); }
.randomlinkscg13 { background: rgba(52,53,48,.6); }
.randomlinkscg14 { background: rgba(24,167,97,.6); }
.randomlinkscg15 { background: rgba(0,127,255,.6); }
.randomlinkscg16 { background: rgba(127,0,255,.6); }
.randomlinkscg17 { background: rgba(191,0,255,.6); }
.randomlinkscg18 { background: rgba(147,108,108,.6); }
.randomlinkscg19 { background: rgba(179,77,77,.6); }
.randomlinkscg20 { background: rgba(191,64,64,.6); }
</style>
<div class="site-wrap">
    <div class="flex_cate_gallery">
        <div class="left-side">
            <div class="inside">
                <div id="content" class="content">
                    <?php while($this->next()): ?>
                        <div class="main_gallery main2">
                            <div class="act act_gallery">
                                <article class="main-act">
                                    <div onclick="window.open('<?php $this->permalink() ?>','_self')" class="box">
                                        <a class="header" href="<?php $this->permalink() ?>">
                                            <img class="lazyload" src="<?php $this->options->loadingPic(); ?>" data-original="<?php $this->fields->thumbimg(); ?>">
                                        </a>
                                        <div class="box-content">
                                            <div class="content1 setback">
                                                <div class="author3">
                                                    <div>
                                                        <p><i style="font-size:12px;" class="fa fa-eye" aria-hidden="true"></i>&nbsp;<?php get_post_view($this) ?>&nbsp;&nbsp;</p>
                                                        <p><i style="font-size:12px;" class="fa fa-comment" aria-hidden="true"></i>&nbsp;<?php $this->commentsNum('0','1','%d'); ?></p>
                                                    </div>
                                                    <div><p><i style="font-size:12px;" class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<time style="font-size: 12px;" datetime="<?php $this->date('Y-m-d'); ?>"><?php $this->date('Y-m-d'); ?></time></p></div>
                                                </div>
                                            </div>
                                            <div class="content2">
                                                <span class="post"><?php $this->title() ?><span style="font-size: 12px;">【<?php
                                                        preg_match_all('/(http:|https:)(.*?)(.jpg|.png|.gif|.jpeg)/i', $this->content, $inpostImgMatch);
                                                        $countInnerImg = count($inpostImgMatch[0]);
                                                        echo $countInnerImg.'P';
                                                    ?>】</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div id="ajaxloadpost" style="padding: 0 10px;">
                    <?php $this->pageLink('下一页','next'); ?>
                </div>
                    <div id="showtext"></div>
                </div>                
            </div>
        </div>
        <?php $this->need('footer.php'); ?>