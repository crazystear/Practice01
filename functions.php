<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) {
    $siteicon = new Typecho_Widget_Helper_Form_Element_Text('siteicon', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">1.</span>站点favicon.ico图标地址'), _t(''));
    $form->addInput($siteicon);

    $cusTitle = new Typecho_Widget_Helper_Form_Element_Text('cusTitle', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">2.</span>站点名称'), _t(''));
    $form->addInput($cusTitle);

    $desc = new Typecho_Widget_Helper_Form_Element_Text('desc', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">3.</span>站点副标题，将显示在标题栏上！'), _t(''));
    $form->addInput($desc);

    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">4.</span>侧栏关于博主头像，填入头像图片地址！'), _t(''));
    $form->addInput($logoUrl);

    $cusAboutme = new Typecho_Widget_Helper_Form_Element_Textarea('cusAboutme', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">5.</span>侧栏关于博主的文字说明！支持html代码。'), _t(''));
    $cusAboutme->input->setAttribute('style', 'height:80px;resize:both;');
    $form->addInput($cusAboutme);

    $wechatqrcode = new Typecho_Widget_Helper_Form_Element_Text('wechatqrcode', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">6.</span>第一个图标位：微信或公众号二维码图片地址'), _t('显示在侧栏关于博客下方的图标'));
    $form->addInput($wechatqrcode);

    $githubaddr = new Typecho_Widget_Helper_Form_Element_Text('githubaddr', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">7.</span>第二个图标位链接地址'), _t(''));
    $form->addInput($githubaddr);
    $secIcon = new Typecho_Widget_Helper_Form_Element_Text('secIcon', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">8.</span>第二个图标，需引用fontawesome图标，引用方法参考http://www.fontawesome.com.cn/faicons/'), _t('显示在侧栏关于博客下方的图标'));
    $form->addInput($secIcon);

    $contactbyqq = new Typecho_Widget_Helper_Form_Element_Text('contactbyqq', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">9.</span>第三个图标位链接地址'), _t(''));
    $form->addInput($contactbyqq);
    $thrIcon = new Typecho_Widget_Helper_Form_Element_Text('thrIcon', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">10.</span>第三个图标，需引用fontawesome图标，引用方法参考http://www.fontawesome.com.cn/faicons/'), _t('显示在侧栏关于博客下方的图标'));
    $form->addInput($thrIcon);

    $meonweibo = new Typecho_Widget_Helper_Form_Element_Text('meonweibo', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">11.</span>第四个图标位链接地址'), _t(''));
    $form->addInput($meonweibo);
    $forIcon = new Typecho_Widget_Helper_Form_Element_Text('forIcon', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">12.</span>第四个图标，需引用fontawesome图标，引用方法参考http://www.fontawesome.com.cn/faicons/'), _t('显示在侧栏关于博客下方的图标'));
    $form->addInput($forIcon);

    $slideImages = new Typecho_Widget_Helper_Form_Element_Checkbox('slideImages', 
    array('ShowSlideOn' => _t('显示轮播图（开启后将在首页及分类页显示轮播）<br/><mark>【建议至少设置一条轮播内容后再开启，若无内容直接开启将显示空白占位影响美观！】</mark>')),
    array(), _t('<span style="color:#ff0000;margin-right:0px;">13.</span>轮播图显示设置，默认关闭，勾选表示开启！'));
    $form->addInput($slideImages->multiMode());

    $SlideImg = new Typecho_Widget_Helper_Form_Element_Textarea('SlideImg', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">14.</span>轮播图列表（注意：切换主题会被清空，注意备份！）'), _t('按照格式输入轮播图信息，格式：<strong>1标题,2URL地址,3轮播图片地址,4轮播分类</strong><br>不同信息之间用英文逗号“,”分隔，例如：<br><strong><mark>venom,https://sunxyu.cn/life/240.html,https://sunxyu.cn/usr/uploads/2018/11/894101175.jpg,home</mark></strong><br>轮播分类用于过滤要显示的轮播，建议使用英文！'));
    $SlideImg->input->setAttribute('style', 'height:150px;resize:both;');
    $form->addInput($SlideImg);

    $SlideSortOnHome = new Typecho_Widget_Helper_Form_Element_Text('SlideSortOnHome', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">15.</span>首页轮播分类（支持多分类，请用英文逗号“,”分隔）'), _t('若只需显示某分类下的轮播，请输入轮播分类名（建议使用字母形式的分类名），<mark>留空则默认显示全部轮播图列表中的轮播</mark>'));
    $form->addInput($SlideSortOnHome);

    $SlideImgNum = new Typecho_Widget_Helper_Form_Element_Text('slideimgnum', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">16.</span>【必填】要显示在首页的轮播图数量，用于控制轮播导航条数量（填数字即可，例如：3）'), _t(''));
    $form->addInput($SlideImgNum->addRule('isInteger', _t('请填入一个数字')));

    $SlideSortOnCategory = new Typecho_Widget_Helper_Form_Element_Text('SlideSortOnCategory', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">17.</span>分类页面轮播分类（支持多分类，请用英文逗号“,”分隔）'), _t('若只需显示某分类下的轮播，请输入轮播分类名（建议使用字母形式的分类名），<mark>留空则默认显示全部轮播图列表中的轮播</mark>'));
    $form->addInput($SlideSortOnCategory);

    $SlideImgNum2 = new Typecho_Widget_Helper_Form_Element_Text('slideimgnum2', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">18.</span>【必填】要显示在分类页面的轮播图数量，用于控制轮播导航条数量（填数字即可，例如：3）'), _t(''));
    $form->addInput($SlideImgNum2->addRule('isInteger', _t('请填入一个数字')));

    $fixedSidebar = new Typecho_Widget_Helper_Form_Element_Checkbox('fixedSidebar', 
    array('fSidebar' => _t('开户页面滚动边栏固定')),
    array(), _t('<span style="color:#ff0000;margin-right:0px;">19.</span>边栏固定，默认关闭！'));
    $form->addInput($fixedSidebar->multiMode());

    $ShowLinks = new Typecho_Widget_Helper_Form_Element_Checkbox('ShowLinks', array('sidebar' => _t('显示首页友情链接（在首页侧边栏显示）')), NULL, _t('<span style="color:#ff0000;margin-right:0px;">20.</span>显示友链，勾选后请在链接列表中按格式输入链接信息即可'));
    $form->addInput($ShowLinks->multiMode());

    $IndexLinksSort = new Typecho_Widget_Helper_Form_Element_Text('IndexLinksSort', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">21.</span>要显示在首页侧边栏的链接分类（支持多分类，请用英文逗号“,”分隔）'), _t('若只需显示某分类下的链接，请输入链接分类名（建议使用字母形式的分类名），<mark>留空则默认显示全部链接列表中的链接</mark>'));
    $form->addInput($IndexLinksSort);

    $Links = new Typecho_Widget_Helper_Form_Element_Textarea('Links', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">22.</span>首页链接列表（注意：切换主题会被清空，注意备份！）'), _t('按照格式输入链接信息，格式：<strong>1链接分类*,2链接名称*,3链接地址*,4链接描述</strong><br>不同信息之间用英文逗号“,”分隔，例如：<br><strong><mark>myself,小宇博客,https://sunxyu.cn,没有什么会永垂不朽</mark></strong><br>链接分类用于过滤要显示的链接，建议使用英文！'));
    $Links->input->setAttribute('style', 'height:100px;resize:both;');
    $form->addInput($Links);

    $innerlinkshow = new Typecho_Widget_Helper_Form_Element_Textarea('innerlinkshow', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">23.</span>要在内页（链接页面）显示的链接分类（支持多分类，一行一个）【 必填 】'), _t(''));
    $innerlinkshow->input->setAttribute('style', 'height:100px;resize:both;');
    $form->addInput($innerlinkshow);

    $innerlinks = new Typecho_Widget_Helper_Form_Element_Textarea('innerlinks', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">24.</span>内页页面链接列表，一行一个（注意：切换主题会被清空，注意备份！）'), _t('按照格式输入链接信息，格式：<strong>1链接分类*,2链接名称*,3链接地址*,4链接描述,5可选参数0</strong><br>不同信息之间用英文逗号“,”分隔，例如：<br><strong><mark>myself,小宇博客,https://sunxyu.cn,没有什么会永垂不朽</mark></strong><br>若要使用rel="external nofollow"属性，第五个参数请输入0！例如：<br><strong><mark>myself,小宇博客,https://sunxyu.cn,没有什么会永垂不朽,0</mark></strong>'));
    $innerlinks->input->setAttribute('style', 'height:500px;resize:both;');
    $form->addInput($innerlinks);

    $postdefaultimg = new Typecho_Widget_Helper_Form_Element_Text('postdefaultimg', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">25.</span>文章头部默认图片'), _t('填写图片地址，推荐分辨率2000*500px'));
    $form->addInput($postdefaultimg);
    $postdefaultword = new Typecho_Widget_Helper_Form_Element_Text('postdefaultword', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">26.</span>文章头部默认文字'), _t(''));
    $form->addInput($postdefaultword);

    $loadingPic = new Typecho_Widget_Helper_Form_Element_Text('loadingPic', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">27.</span>懒加载动态loading.gif图片地址！'), _t(''));
    $form->addInput($loadingPic);

    $commentAuthorAvatar = new Typecho_Widget_Helper_Form_Element_Text('commentAuthorAvatar', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">28.</span>自定义博主评论头像地址'), _t(''));
    $form->addInput($commentAuthorAvatar);

    $beianno = new Typecho_Widget_Helper_Form_Element_Text('beianno', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">29.</span>网站底部备案号填写'), _t(''));
    $form->addInput($beianno);

    $posCopy = new Typecho_Widget_Helper_Form_Element_Checkbox('posCopy', 
    array('closeCopy' => _t('关闭文章底部版权信息说明！')),
    array(''), _t('<span style="color:#ff0000;margin-right:0px;">30.</span>文章版权说明'));
    $form->addInput($posCopy->multiMode());

    $postCopyright = new Typecho_Widget_Helper_Form_Element_Textarea('postCopyright', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">31.</span>文章底部自定义版权信息（支持HTML代码）'), _t('留空则显示主题定义的默认版权信息！'));
    $postCopyright->input->setAttribute('style', 'height:100px;resize:both;');
    $form->addInput($postCopyright);

    $themeCopy = new Typecho_Widget_Helper_Form_Element_Checkbox('themeCopy', 
    array('closeThemeCopy' => _t('关闭网站底部的主题版权说明！')),
    array(''), _t('<span style="color:#ff0000;margin-right:0px;">32.</span>主题版权说明'));
    $form->addInput($themeCopy->multiMode());

    $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">33.</span>网站统计代码'), _t(''));
    $tongji->input->setAttribute('style', 'height:100px;resize:both;');
    $form->addInput($tongji);

    $bdAutoPush = new Typecho_Widget_Helper_Form_Element_Textarea('bdAutoPush', NULL, NULL, _t('<span style="color:#ff0000;margin-right:0px;">34.</span>百度自动推送工具代码'), _t('使用方式请查阅：https://ziyuan.baidu.com/linksubmit/index'));
    $bdAutoPush->input->setAttribute('style', 'height:100px;resize:both;');
    $form->addInput($bdAutoPush);

    $sidebarCategory = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarCategory', 
    array('onTopNav' => _t('在顶部菜单栏显示（PC端）'),
    'onSidebar' => _t('在侧边栏显示')),
    array(''), _t('<span style="color:#ff0000;margin-right:0px;">35.</span>分类目录'));
    $form->addInput($sidebarCategory->multiMode());

    $highlightColor = new Typecho_Widget_Helper_Form_Element_Radio('highlightColor', 
    array('default' => _t('default'),
    'mono-blue' => _t('mono-blue'),
    'tomorrow' => _t('tomorrow'),
    'zenburn' => _t('zenburn'),
    'purebasic' => _t('purebasic'),
    'dracula' => _t('dracula'),
    'xcode' => _t('xcode'),
    'foundation' => _t('foundation'),
    'vs2015' => _t('vs2015'),
    'monokai-sublime' => _t('monokai-sublime'),
    'routeros' => _t('routeros'),
    'grayscale' => _t('grayscale'),
    'vs' => _t('vs'),
    'github' => _t('github'),
    'atom-one-light' => _t('atom-one-light')),
    'default', _t('36.选择代码高亮配色方案，默认为default方案！'), _t('配色效果参考：https://highlightjs.org/static/demo/'));
    $form->addInput($highlightColor);

    include("theme_config.php");
}
//get_post_view($this)
function get_post_view($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
    if(!in_array($cid,$views)){
       $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views);
        }
    }
    echo $row['views'];
}
//设置文章自定义字段
function themeFields($layout)
    {
        $thumbImg = new Typecho_Widget_Helper_Form_Element_Text('thumbimg', NULL, NULL, _t('自定义缩略图'), _t('将要显示在瀑布流中的缩略图URL地址，建议图片宽度500px，高度不限！【只针对文章，页面请忽略】'));
        $thumbImg->input->setAttribute('class', 'w-100');
        $layout->addItem($thumbImg); 

        $postTop = new Typecho_Widget_Helper_Form_Element_Radio('postTop', 
        array('keeptop' => _t('添加文章页置顶标记'),
        'removetop' => _t('关闭文章页置顶标记')),
        'removetop', _t('文章置顶Sticky插件辅助'), _t('默认关闭【只针对文章，页面请忽略】<br/>说明：此处选项是配合sticky插件使用的，若你没有使用sticky插件则直接忽略此处设置。<br/>若有使用sticky插件置顶文章时，勾选此处会使文章内容页的标题后也出现置顶的标记！'));
        $layout->addItem($postTop);

        $headbigimg = new Typecho_Widget_Helper_Form_Element_Text('headbigimg', NULL, NULL, _t('文章页顶部大图'), _t('将要显示在文章页顶部的图片地址，建议图片分辨率2000*500px！'));
        $headbigimg->input->setAttribute('class', 'w-100');
        $layout->addItem($headbigimg);

        $headpostdesc = new Typecho_Widget_Helper_Form_Element_Text('headpostdesc', NULL, NULL, _t('文章页顶部大图文字'), _t('图片配文，可以不填写！'));
        $headpostdesc->input->setAttribute('class', 'w-100');
        $layout->addItem($headpostdesc);

        $posttitlecolor = new Typecho_Widget_Helper_Form_Element_Text('posttitlecolor', NULL, NULL, _t('标题字体颜色'), _t('输入颜色代码，如：#ff0000;'));
        $posttitlecolor->input->setAttribute('class', 'w-100');
        $layout->addItem($posttitlecolor);

        $postGallery = new Typecho_Widget_Helper_Form_Element_Radio('postGallery', array('isGallery' => _t('文章设置为相册'), 'noGallery' => _t('普通文章形式')), 'noGallery', _t('设置为相册形式'), _t('默认为普通文章形式。相册模式直接文章中输入图片地址，每行地址前需要添加一个反斜杠“\”，一行一个地址。'));
        $layout->addItem($postGallery);

        $aplayerurl = new Typecho_Widget_Helper_Form_Element_Text('aplayerurl', NULL, NULL, _t('歌曲URL地址'), _t('输入可以在线播放的音乐URL地址'));
        $aplayerurl->input->setAttribute('class', 'w-100');
        $layout->addItem($aplayerurl);

        $aplayername = new Typecho_Widget_Helper_Form_Element_Text('aplayername', NULL, NULL, _t('歌名'), _t(''));
        $aplayername->input->setAttribute('class', 'w-100');
        $layout->addItem($aplayername);

        $aplayerauthor = new Typecho_Widget_Helper_Form_Element_Text('aplayerauthor', NULL, NULL, _t('歌手'), _t(''));
        $aplayerauthor->input->setAttribute('class', 'w-100');
        $layout->addItem($aplayerauthor);

        $aplayerthumb = new Typecho_Widget_Helper_Form_Element_Text('aplayerthumb', NULL, NULL, _t('歌曲封面'), _t(''));
        $aplayerthumb->input->setAttribute('class', 'w-100');
        $layout->addItem($aplayerthumb);
    }
//调用首页友情链接
function Links($sorts = NULL) {
        $options = Typecho_Widget::widget('Widget_Options');
        if ($options->Links) {
            $list = explode("\r\n", $options->Links);
            foreach ($list as $tmp) {
                list($sort, $name, $url, $description) = explode(',', $tmp);
                if (!isset($sorts) || $sorts == "") {
                    echo '<li><a class="innerlinksa" href="'.$url.'" title="'.$description.'" target="_blank">'.$name.'</a></li>';
                } else {
                    $arr = explode(",", $sorts);
                    for($i = 0; $i < count($arr); $i++) {
                        if($arr[$i] === $sort) {
                            echo '<li><a class="innerlinksa" href="'.$url.'" title="'.$description.'" target="_blank">'.$name.'</a></li>';
                        }
                    }
                }
            }
        } else {
            echo '<li>暂无链接</li>';
        }
    }
//调用内页页面友情链接
function innerLinks($innersorts = NULL) {
        $options = Typecho_Widget::widget('Widget_Options');
        if ($options->innerlinks) {
            $list = explode("\r\n", $options->innerlinks);
            $innerlinkcate = explode("\r\n", $innersorts);
            for ($i=0; $i < count($innerlinkcate); $i++) { 
                echo '<span class="innerlinkcat">'.$innerlinkcate[$i].'</span><ul class="innerlinks_items">';
                foreach ($list as $eachlist) {
                    list($sort, $name, $url, $description, $type) = explode(',', $eachlist);
                    if (isset($innersorts) && !$innersorts == "") {
                        if ($innerlinkcate[$i] === $sort) {
                            if ($type === '0') {
                                echo '<li><a class="innerlinksa" href="'.$url.'" title="'.$description.'" target="_blank" rel="external nofollow">'.$name.'</a></li>';
                            }else{
                                echo '<li><a class="innerlinksa" href="'.$url.'" title="'.$description.'" target="_blank">'.$name.'</a></li>';
                            }
                        }
                    }
                }
                echo '</ul>';
            }
        } else {
            echo '<li>暂无链接</li>';
        }
    }
// 调用轮播图
// <p><a>'.$catname.'</a></p>
function SlideImg($classifys = NULL) {
        $options = Typecho_Widget::widget('Widget_Options');
        if ($options->SlideImg) {
            $list2 = explode("\r\n", $options->SlideImg);
            foreach ($list2 as $tmp) {
                list($title, $posturl, $imgurl, $classify) = explode(',', $tmp);
                if (!isset($classifys) || $classifys == "") {
                    echo '<div class="section" style="background-image: url('.$imgurl.');">
                                <h3><a href="'.$posturl.'">'.$title.'</a></h3>
                            </div>';
                } else {
                    $arr2 = explode(",", $classifys);
                    for($i = 0; $i < count($arr2); $i++) {
                        if($arr2[$i] === $classify) {
                            echo '<div class="section" style="background-image: url('.$imgurl.');">
                                <h3><a href="'.$posturl.'">'.$title.'</a></h3>
                            </div>';
                        }
                    }
                }
            }
        } else {
            echo '<div class="section" style="background:#000;">
                                <h3><a>&nbsp;-&nbsp;未设置轮播图，请先设置&nbsp;-&nbsp;</a></h3>
                            </div>';
        }
    }
//评论添加回复标记
function get_commentReply_at($coid)
{
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
                                 ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
                                     ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '回复 <span style="color:#ff8300;">' . $author . '</span>：';
        echo $href;
    } else {
        echo '';
    }
}
// 替换文章内容方法
function themeInit($archive)
    {
        if ($archive->is('single'))
        {
            $archive->content = image_class_replace($archive->content);
        }
    }
function image_class_replace($content)
    {
        $options = Typecho_Widget::widget('Widget_Options');
        if ($options->loadingPic) {
            $loadingPicAddr = $options->loadingPic;
        }else{
            $loadingPicAddr = "#";
        }
        $content = preg_replace('#<img(.*?) src="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>#',
            '<img$1 data-original="$2$3"$5 class="lazyload" src="'.$loadingPicAddr.'">', $content);
        $content = preg_replace('#<a(.*?) href="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>#',
            '<a$1 href="$2$3"$5 rel="external nofollow" target="_blank">', $content);
        $content = preg_replace('/\[addimg\](http:|https:)(.*?)(.jpg|.png|.jpeg|.png),(.*?)\[\/addimg\]/i','<a data-fancybox="gallery" href="$1$2$3" data-caption="$4">$4</a>', $content);
        $content = preg_replace('/(\[addvideo\])(http:|https:)(.*?),(.*?),(.*?),(.*?)(\[\/addvideo\])/i','<a data-fancybox data-width="$5" data-height="$6" href="$2$3" data-caption="$4">$4</a>', $content);
        $content = preg_replace('/(\[addvideo2\])(http:|https:)(.*?),<img data-original="(http:|https:)(.*?)" alt="(.*?)" (.*?),(.*?),(.*?)(\[\/addvideo2\])/i','<a data-fancybox data-width="$8" data-height="$9" href="$2$3" data-caption="$6"><img data-original="$4$5" class="lazyload" src="'.$loadingPicAddr.'" alt="$6" title="$6"></a>', $content);
        $content = preg_replace('/(\[addvideo3\])(http:|https:)(.*?),(.*?),<a href="(http:|https:)(.*?),(.*?),(.*?)" (.*?)(\[\/addvideo3\])/i','<a data-fancybox data-width="$7" data-height="$8" href="$2$3" data-caption="$4"><img data-original="$5$6" class="lazyload" src="'.$loadingPicAddr.'" alt="$4" title="$4"></a>', $content);
        $content = preg_replace('/\[group\](http:|https:)(.*?)(.jpg|.jpeg|.gif|.png),(.*?),(.*?)\[\/group\]/i','<a data-thumbs={"autoStart":true} href="$1$2$3" data-fancybox="$5" alt="$4" title="$4"><img src="$1$2$3" /></a>',$content);
        preg_match_all('/\[album\](http:|https:)(.*?)(.jpg|.jpeg|.gif|.png),(.*?)\[\/album\]/i', $content, $matches);
        $ca = count($matches[0]);
        $content = preg_replace('/\[album\](http:|https:)(.*?)(.jpg|.jpeg|.gif|.png),(.*?)\[\/album\]/i','<a href="$1$2$3" data-fancybox="$4" data-thumb="$1$2$3"></a>',$content);
        if ($ca > 1) {
            $content = preg_replace('/\<\/a\>\<br\>\<a/i', '</a><a', $content);
        }
        $content = preg_replace('/\[record\](.*?)\<br\>(.*?)\[\/record]/i','<span class="postRecord"><span style="background:#fff;padding:0 5px;">$1</span></span><span class="recordBody">$2</span>',$content);
        return $content;
    }
?>
<!-- end -->