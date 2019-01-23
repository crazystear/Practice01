<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="main main2">
<?php
    preg_match_all("/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $this->content, $matches);
    $imgCount = count($matches[0]);
    if ($imgCount >= 4 || $this->fields->postGallery == 'isGallery') { ?>
<div onclick="window.open('<?php $this->permalink() ?>','_self')" class="lazyload act2" data-original="<?php if (!($this->fields->thumbimg == '')): ?><?php $this->fields->thumbimg(); ?><?php else: ?><?php
preg_match_all("/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $this->content, $matches);
$imgCount = count($matches[0]);
if($imgCount >= 1){
$img = $matches[2][0];
echo <<<Html
{$img}
Html;
}
?><?php endif; ?>" style="background-image: url(<?php $this->options->loadingPic(); ?>)">
                                <article class="main-act">
                                    <div class="cate2"><?php $this->category(',', true); ?>
                                    <?php
                                        preg_match_all('/(http:|https:)(.*?)(.jpg|.png|.gif)/i', $this->content, $inpostImgMatch);
                                        $countInnerImg = count($inpostImgMatch[0]);
                                        echo '<a style="margin-left:2px;background:rgba(0, 55, 125, 0.6);padding:10px 5px;">'.$countInnerImg.'P</a>';
                                    ?>
                                    </div>
                                    <div class="entry2"><p><a <?php if(!($this->fields->posttitlecolor == '')): ?> style="color:<?php $this->fields->posttitlecolor(); ?>" <?php endif; ?> href="<?php $this->permalink() ?>"><i style="font-size:12px;" class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;<?php $this->title() ?>&nbsp;<?php $this->sticky(); ?></a></p>
                                    </div>
                                    <div class="author2">
                                        <div>
                                            <p class="titleLen"><i style="font-size:12px;" class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php $this->author(); ?>&nbsp;&nbsp;</p>
                                            <p><i style="font-size:12px;" class="fa fa-eye" aria-hidden="true"></i>&nbsp;<?php get_post_view($this) ?>&nbsp;&nbsp;</p>
                                            <p><i style="font-size:12px;" class="fa fa-comment" aria-hidden="true"></i>&nbsp;<?php $this->commentsNum('0','1','%d'); ?></p>
                                        </div>
                                        <div><p><i style="font-size:12px;" class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<time style="font-size: 12px;" datetime="<?php $this->date('Y-m-d'); ?>"><?php $this->date('Y-m-d'); ?></time></p></div>
                                    </div>
                                </article>
                            </div>
<?php }else{ ?>
                            <div class="act">
                                <article class="main-act">
<?php if(!($this->fields->thumbimg == '')) { ?>
        <div><a class="header" href="<?php $this->permalink() ?>"><img class="lazyload" src="<?php $this->options->loadingPic(); ?>" data-original="<?php $this->fields->thumbimg(); ?>"></a></div>
<?php }else{ ?>
<?php
    preg_match_all("/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $this->content, $matches);
    $imgCount = count($matches[0]);
    if ($imgCount >= 1) { ?>
        <div><a class="header" href="<?php $this->permalink() ?>"><img class="lazyload" src="<?php $this->options->loadingPic(); ?>" data-original="<?php $img = $matches[2][0];
echo <<<Html
{$img}
Html;
?>"></a></div>
<?php }} ?>
                                    <div class="entry"><p><a <?php if(!($this->fields->posttitlecolor == '')): ?> style="color:<?php $this->fields->posttitlecolor(); ?>" <?php endif; ?> href="<?php $this->permalink() ?>">
                                        <?php if(!($this->fields->aplayerurl == '')): ?>
                                            <i style="font-size:12px;" class="fa fa-music" aria-hidden="true"></i>
                                        <?php elseif(preg_match("/\bmp4\b/i",$this->content)): ?>
                                            <i style="font-size:12px;" class="fa fa-video-camera" aria-hidden="true"></i>
                                        <?php else: ?>
                                            <i style="font-size:12px;" class="fa fa-book" aria-hidden="true"></i>
                                        <?php endif; ?>
                                        &nbsp;<?php $this->title() ?>&nbsp;<?php $this->sticky(); ?></a></p></div>
                                    <div class="expert"><p><?php $this->excerpt(35, ' ...'); ?></p></div>
                                    <div class="cate"><p><i style="font-size:12px;" class="fa fa-clone" aria-hidden="true"></i>&nbsp;<?php $this->category(',', true); ?></p></div>
                                    <div class="author">
                                        <div>
                                            <p class="titleLen"><i style="font-size:12px;" class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php $this->author(); ?>&nbsp;&nbsp;</p>
                                            <p><i style="font-size:12px;" class="fa fa-eye" aria-hidden="true"></i>&nbsp;<?php get_post_view($this) ?>&nbsp;&nbsp;</p>
                                            <p><i style="font-size:12px;" class="fa fa-comment" aria-hidden="true"></i>&nbsp;<?php $this->commentsNum('0','1','%d'); ?></p>
                                        </div>
                                        <div><p><i style="font-size:12px;" class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<time style="font-size: 12px;" datetime="<?php $this->date('Y-m-d'); ?>"><?php $this->date('Y-m-d'); ?></time></p></div>
                                    </div>
                                </article>
                            </div>
<?php } ?>
                        </div>