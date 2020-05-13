<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('header.php');
?>
<script type="text/javascript" src="https://cdn.staticfile.org/jquery/2.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/layer/layer.js'); ?>"></script>
<link href="https://cdn.staticfile.org/aplayer/1.10.1/APlayer.min.css" rel="stylesheet">
<script src="https://cdn.staticfile.org/aplayer/1.10.1/APlayer.min.js"></script>
<style type="text/css">
    .timeline_center:before {
        background: rgb(141, 175, 243);
        content: '';
        width: 1px;
        height: 100%;
        position: absolute;
        left: 50%;
        margin-left: -1px;
    }
    .mark_left:before, .mark_right:before {
        position: absolute;
        width: 16px;
        height: 8px;
        content: '';
        border-radius: 20px;
        box-shadow: 0 0px 10px rgba(0, 0, 0, 0.05);
        top: 5px;
        border: 1px solid #fff;
        z-index: 99;
    }
    .mark_left:before {
        background: #6fc1fb;
        right: -6px;
    }
    .mark_right:before {
        background: #f97878;
        left: -6px;
    }
    .t_title {
        background: #fff;
        padding: 5px 10px;
        text-shadow: 0 1px 3px rgba(88,88,88,.1);
        font-size: 12px;
    }
    .t_title:hover {
        color: rgb(160, 36, 15);
        font-weight: bold;
    }
    .tCom p {
        cursor: pointer;
        transition: all .4s;
        -webkit-transition: all .4s;
        -moz-transition: all .4s;
        -ms-transition: all .4s;
        -o-transition: all .4s;
    }
    .tCom p:hover {
        color: #5a63f5;
    }
    .aplayerdemo {
        width: 100%;
        margin: 0 0 -12px 0;
        padding: 5px;
    }
    .aplayerdemo>div {
        box-shadow: none;
    }
    .sentences {
        margin-top: 76px;
    }
    .headnav {
        background: #fff;
    }
    .nav_menu_li_a2 {
        color: #000;
    }
    .nav_menu_li_a2:hover {
        background: #000;
        color: #fff;
    }
    .tl_left {
        padding: 0px 20px 0px 10px;
        margin-bottom: 70px;
    }
    .tl_right {
        padding: 0px 10px 0px 20px;
        margin-top: 40px;
        margin-bottom: 30px;
    }
    .post_comments {
        padding: 20px 10px;
    }
    .respond {
        display: none;
    }
    .tl_title_l {
        text-align: right;
    }
    .timeline_content > p > a {
        margin-bottom: -12px;
    }
    .timeline_content img {
        max-width: 100%;
        box-shadow: 0 3px 7px rgba(0,0,0,.15);
    }
    @media screen and (max-width: 767px) {
        .timeline_center:before {
            left: 20px;
            margin-left: 0;
        }
        .content {
            margin-top: 40px;
        }
        .tl_left {
            padding: 0 30px 0 40px;
            margin-bottom: 40px;
        }
        .tl_right {
            padding: 0 30px 0 40px;
            margin-top: 0px;
            margin-bottom: 40px;
        }
        .mark_left:before {
            right: 0;
            left: 13px;
        }
        .mark_right:before {
            left: 13px;
        }
        .tl_title_l {
            text-align: left;
        }
    }
</style>
<div class="site-wrap">
    <div class="flex_cate_timeline">
        <div class="left-side">
            <div class="inside">
                <div id="content" class="content timeline_center">
                    <?php $tCount = 0; while($this->next()): ?>
                    <?php if($tCount%2 == 0): ?>
                        <div class="main_timeline main2 tl_left">
                        <div class="tl_title_l" style="padding: 10px 0;">
                            <!-- <a style="display: inline;color: #666;" href="<?php $this->permalink() ?>" target="_blank"> -->
                                <span class="t_title"><i class="fa fa-fire" aria-hidden="true"></i>&nbsp;<?php $this->title() ?></span>
                            <!-- </a> -->
                        </div>
                    <?php else: ?>
                        <div class="main_timeline main2 tl_right">
                        <div style="padding: 10px 0;">
                            <!-- <a style="display: inline;color: #666;" href="<?php $this->permalink() ?>" target="_blank"> -->
                                <span class="t_title"><i class="fa fa-fire" aria-hidden="true"></i>&nbsp;<?php $this->title() ?></span>
                            <!-- </a> -->
                        </div>
                    <?php endif; ?>
                            <div class="act_timeline">
                                <article class="main-act">
                                    <?php if($tCount%2 == 0): ?>
                                        <div class="timeline_content mark_left">
                                    <?php else: ?>
                                        <div class="timeline_content mark_right">
                                    <?php endif; ?>
                                        <?php if(!($this->fields->aplayerurl == '' && $this->fields->aplayerthumb == '')): ?>
                                            <?php $this->need('aplayer.php'); ?>
                                        <?php endif; ?>
                                        <?php if(!($this->fields->videorurl == '' && $this->fields->videoname == '')): ?>
                                            <?php $this->need('videoplayer.php'); ?>
                                        <?php endif; ?>
                                        <?php
                                            $t_content = $this->content;
                                            $t_content = preg_replace('/<img src="(http:|https:)(.*?)(.jpg|.png|.gif|.jpeg)" alt="(.*?)"(.*?)>/i','<a href="$1$2$3" data-fancybox="images" data-caption="$4"><img src="$1$2$3" alt="$4" title="$4"></a>', $t_content);
                                            echo $t_content; 
                                        ?>
                                    </div>
                                    <div class="author" style="margin-top: 0;justify-content: flex-end;">
                                        <div style="padding: 0 10px;border-right: 1px solid #f1f1f1;"><p>Posted on&nbsp;<time style="font-size: 12px;" datetime="<?php $this->date('Y-m-d'); ?>"><?php $this->date('Y-m-d'); ?></time></p></div>
                                        <div class="tCom" id="<?php $this->cid(); ?>" style="padding: 0 10px;">
                                            <p><?php $this->commentsNum('0','1','%d'); ?>&nbsp;Comments</p>
                                        </div>
                                    </div>
                                    <!-- <div id="<?php echo $this->cid.'Practice01'; ?>" class="tlcombody"></div> -->
                                    <!-- <script type="text/javascript">
                                        $(document).ready(function(){
                                          $("#<?php $this->cid(); ?>").click(function(){
                                            if (!($('div').is('.<?php $this->cid(); ?>'))) {
                                                $.ajax({url:"<?php $this->permalink() ?>",success:function(result){
                                                    var res2 = $(result).find(".post_comments");
                                                    $("#<?php echo $this->cid.'Practice01'; ?>").append(res2);
                                                    $("#<?php $this->cid(); ?>").addClass("<?php $this->cid(); ?>");
                                                    f_masonry();
                                                }});
                                            }else {
                                                $("#<?php echo $this->cid.'Practice01'; ?>").html("");
                                                $("#<?php $this->cid(); ?>").removeClass("<?php $this->cid(); ?>");
                                                f_masonry();
                                            }
                                          });
                                          $(document).click(function(event){
                                            var _con = $("#<?php $this->cid(); ?>");
                                            var _con1 = $("#<?php echo $this->cid.'Practice01'; ?>");
                                            if(!_con.is(event.target) && !_con1.is(event.target) && _con.has(event.target).length === 0 && _con1.has(event.target).length === 0){
                                                $("#<?php echo $this->cid.'Practice01'; ?>").html("");
                                                $("#<?php $this->cid(); ?>").removeClass("<?php $this->cid(); ?>");
                                                f_masonry();
                                            }
                                        });
                                        }); 
                                    </script> -->
                                    <script>
                                        var wd = document.body.clientWidth;
                                        var wd2 = '800';
                                            if (parseInt(wd) < parseInt(wd2)) {
                                            ;!function(){
                                            $('#<?php $this->cid(); ?>').on('click', function(){
                                                layer.open({
                                                  type: 2,
                                                  title: '<i class="fa fa-fire" aria-hidden="true"></i>&nbsp;<?php $this->title() ?>',
                                                  maxmin: true,
                                                  area: ['95%', '500px'],
                                                  content: '<?php $this->permalink() ?>',
                                                  shade: 0.5,
                                                  shadeClose: true,
                                                });
                                              });
                                            }();
                                        } else {
                                            ;!function(){
                                            $('#<?php $this->cid(); ?>').on('click', function(){
                                                layer.open({
                                                  type: 2,
                                                  title: '<i class="fa fa-fire" aria-hidden="true"></i>&nbsp;<?php $this->title() ?>',
                                                  maxmin: true,
                                                  area: ['800px', '500px'],
                                                  content: '<?php $this->permalink() ?>',
                                                  shade: 0.5,
                                                  shadeClose: true,
                                                });
                                              });
                                            }();
                                        }
                                        $('#<?php $this->cid(); ?>').mouseover(function(){
                                            layer.tips('有话说？请点我吧！', '#<?php $this->cid(); ?>', {
                                              tips: [1, '#000'],
                                              time: 1000
                                            });
                                        });
                                    </script>
                                </article>
                            </div>
                        </div>
                    <?php $tCount++; endwhile; ?>
                </div>
                <div id="ajaxloadpost" style="padding: 0 10px;">
                    <?php $this->pageLink('下一页','next'); ?>
                </div>
                <div id="showtext"></div>
                </div>                
            </div>
        </div>
        <?php $this->need('footer.php'); ?>