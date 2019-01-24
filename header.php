<!-- 
*********************************************
                   _ooOoo_
                  o8888888o
                  88" . "88
                  (| -_- |)
                  O\  =  /O
               ____/`---'\____
             .'  \\|     |//  `.
            /  \\|||  :  |||//  \
           /  _||||| -:- |||||-  \
           |   | \\\  -  /// |   |
           | \_|  ''\---/''  |   |
           \  .-\__  `-`  ___/-. /
         ___`. .'  /--.--\  `. . __
      ."" '<  `.___\_<|>_/___.'  >'"".
     | | :  `- \`.;`\ _ /`;.`/ - ` : | |
     \  \ `-.   \_ __\ /__ _/   .-` /  /
======`-.____`-.___\_____/___.-`____.-'======
                   `=---='
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
            佛祖保佑       永无BUG
-->
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="UFT-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="<?php $this->options->cusTitle(); ?> - <?php $this->options->desc(); ?>">
    <meta name="description" content="<?php $this->options->cusAboutme(); ?>">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->cusTitle(); ?> - <?php $this->options->desc(); ?></title>
    <!-- 使用url函数转换相关路径 -->
    <?php if(!($this->options->siteicon == '')): ?>
    <link rel="icon" href="<?php $this->options->siteicon(); ?>" mce_href="<?php $this->options->siteicon(); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php $this->options->siteicon(); ?>" mce_href="<?php $this->options->siteicon(); ?>" type="image/x-icon">
    <?php endif; ?>
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/fancybox/3.5.2/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://cdn.staticfile.org/highlight.js/9.13.1/styles/<?php $this->options->highlightColor(); ?>.min.css" />
    <?php if(!($this->fields->aplayerurl == '' && $this->fields->aplayerthumb == '')): ?>
    <link href="https://cdn.staticfile.org/aplayer/1.10.1/APlayer.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/aplayer/1.10.1/APlayer.min.js"></script><?php endif; ?>
    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
    <?php if(!($this->options->tongji == '')): ?><?php $this->options->tongji(); ?><?php endif; ?>
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<div id="headnav" class="headnav">
    <div class="inheadnav">
        <div id="headlogo" class="headlogo"><a class="navmla2 nav_menu_li_a2" style="padding: 0;" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->cusTitle(); ?></a></div>
        <ul class="nav_menu">
            <li class="nav_menu_li"><a class="navmla nav_menu_li_a2" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
            <?php if (!empty($this->options->sidebarCategory) && in_array('onTopNav', $this->options->sidebarCategory)): ?>
            <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
            <?php while($categorys->next()): ?>
            <li class="nav_menu_li"><a class="navmla nav_menu_li_a2" href="<?php $categorys->permalink(); ?>" title="<?php $categorys->description(); ?>"><?php $categorys->name(); ?></a></li>
            <?php endwhile; ?><?php endif; ?>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?><?php if(!($pages->template == 'page-status.php')): ?>
            <li class="nav_menu_li"><a class="navmla nav_menu_li_a2" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
            <?php endif; ?><?php endwhile; ?>
            <li id="controlSearch" class="nav_menu_li"><a id="switchicon" class="navmla2 nav_menu_li_a2"><i class="fa fa-search" aria-hidden="true"></i></a></li>
        </ul>
    </div>
</div>
<!-- --------------------------mobile-nav-start------------------------------------ -->
<div id="m_nav">
    <div class="m_innav">
        <div id="m_inheadnav" class="m_inheadnav">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div id="m_menu_1" class="m_menu_1" style="visibility: hidden;opacity: 0;">
            <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
            <?php while($categorys->next()): ?>
            <li class="m_menu_1_li"><a class="m_menu_1_li_a" href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a></li>
            <?php endwhile; ?>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
            <li class="m_menu_1_li"><a class="m_menu_1_li_a" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
            <?php endwhile; ?>
        </div>
        <div class="m_logo">
            <a class="m_logo_a" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->cusTitle(); ?></a>
        </div>
        <div id="m_controlSearch" class="m_search">
            <a id="m_switchicon"><i class="fa fa-search" aria-hidden="true"></i></a>
        </div>
    </div>
</div>
<!-- --------------------------mobile-nav-end------------------------------------ -->
<div id="topsearch" class="topsearch" style="visibility: hidden;opacity: 0;">
    <div class="intopsearch">
        <div class="mainsearch">
            <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                <input type="text" id="s" name="s" class="text" placeholder="<?php _e('ENTER KEYWORDS...'); ?>" />
                <button type="submit" class="submit"><?php _e('Search'); ?></button>
            </form>
        </div>
    </div>
</div>
<?php if (!empty($this->options->slideImages) && in_array('ShowSlideOn', $this->options->slideImages)): ?>
    <?php if(!($this->is('post') || $this->is('page'))): ?>
        <div class="imgslide-container" style="opacity: 0;">
            <div id="container">
                <div class="sections" id="sections">
            <?php if(!($this->is('category'))): ?>
                    <?php SlideImg($this->options->SlideSortOnHome); ?>
                </div>
                <?php $imgnums = $this->options->slideimgnum; ?>
            <?php endif; ?>
            <?php if($this->is('category')): ?>
                    <?php SlideImg($this->options->SlideSortOnCategory); ?>
                </div>
                <?php $imgnums = $this->options->slideimgnum2; ?>
            <?php endif; ?>
                <div id="navs">
                        <?php for($i=0;$i<$imgnums;$i++) { ?>
                            <a href="javascript:;"></a>
                        <?php } ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php if($this->is('post') || $this->is('page')): ?>
    <div class="imgslide-container" style="opacity: 0;">
        <div id="container2">
            <div class="sections2">
                <?php if (!($this->fields->headbigimg == '')): ?>
                    <div class="section2 lazyload" data-original="<?php $this->fields->headbigimg(); ?>" style="background-image: url();">
                <?php else: ?>
                    <div class="section2 lazyload" data-original="<?php $this->options->postdefaultimg(); ?>" style="background-image: url();">
                <?php endif; ?>
                <?php if (!($this->fields->headpostdesc == '')): ?>
                    <h3><?php $this->fields->headpostdesc(); ?></h3>
                <?php else: ?>
                    <h3><?php $this->options->postdefaultword(); ?></h3>
                <?php endif; ?>
            </div> 
        </div>
    </div>
    <div class="sentences">
    <?php else: ?>
    <?php if (!empty($this->options->slideImages) && in_array('ShowSlideOn', $this->options->slideImages)): ?>
        <div class="sentences">
    <?php else: ?>
        <div class="sentences" style="margin-top: 76px;">
    <?php endif; ?>   
        <?php endif; ?>
        <div id="testjs" style="position: fixed;top: 10px;left: 10px;z-index: 999;background: #000;color: #fff;"></div>
        <div class="insentence">
            <p><i style="color: #ff0000;" class="fa fa-heart" aria-hidden="true"></i>&nbsp;&nbsp;<span id="typed" style="word-wrap: break-word;word-break: break-all;overflow: hidden;font-size: 12px;"></span>&nbsp;&nbsp;<i style="color: #ff0000;" class="fa fa-heart" aria-hidden="true"></i></p>
        </div>
    </div>
    