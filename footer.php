<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div>
<script type="text/javascript" src="https://cdn.staticfile.org/jquery/2.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.staticfile.org/masonry/4.2.2/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="https://cdn.staticfile.org/jquery_lazyload/1.9.7/jquery.lazyload.min.js"></script>
<script src="https://cdn.staticfile.org/fancybox/3.5.2/jquery.fancybox.min.js"></script>
<script src="https://cdn.staticfile.org/highlight.js/9.13.1/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<!-- 图片懒加载结合masonry -->
<script type="text/javascript">
$(function() {    
    $(".lazyload").lazyload({
        effect: 'fadeIn',
        load : f_masonry,
    });
});
</script>
<!-- 瀑布流方法 -->
<script type="text/javascript">
function f_masonry() {
    $('#content').masonry({
        itemSelector: '.main2',
        isAnimated: true,
        // columnWidth: 5,
        });
    }
</script>
<!-- 边栏打字效果调用 -->
<script src="https://cdn.staticfile.org/typed.js/1.1.7/typed.min.js"></script>
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function(){
        Typed.new("#typed", {
            stringsElement: document.getElementById('typed-strings'),
            typeSpeed: 30,
            backDelay: 10000,
            loop: true,
            contentType: 'html', // or text
            // defaults to null for infinite loop
            loopCount: null,
            // callback: function(){ foo(); },
            // resetCallback: function() { newTyped(); }
        });
    });
</script>
<?php include("typeword.php"); ?>
<!-- 边栏固定 -->
<?php if (!empty($this->options->fixedSidebar) && in_array('fSidebar', $this->options->fixedSidebar)): ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('/js/theia-sticky-sidebar.min.js'); ?>"></script>
<script>
  $(document).ready(function() {
    $('.flex-left, .flex-right')
      .theiaStickySidebar({
        additionalMarginTop: 56
      });
  });
</script>
<?php endif; ?>
<!-- 头部全屏轮播调用 -->
<?php if(!($this->is('post') || $this->is('page'))): ?>
<?php if (!empty($this->options->slideImages) && in_array('ShowSlideOn', $this->options->slideImages)): ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('/js/pageSwitch.min.js'); ?>"></script>
<script>
    a=new pageSwitch('sections',{
    duration:1500,
    start:0,
    direction:1,
    loop:true,
    ease:'ease-out',
    transition:'fade',
    autoplay:true,
    mouse:false,
    mousewheel:false,
    arrowkey:true,
    interval:5000
});
navs=document.getElementById('navs').getElementsByTagName('a');
a.on('before',function(m,n){
    navs[m].className='';
    navs[n].className='active';
});
i=0;
for(;i<navs.length;i++){
    !function(i){
        navs[i].onclick=function(){
            a.slide(i);
        }
    }(i);
}
</script>
<?php endif; ?>
<?php endif; ?>
<div class="footer">
    <div class="infoot">
        <?php if (!empty($this->options->themeCopy) && in_array('closeThemeCopy', $this->options->themeCopy)): ?><?php else: ?>
        <p id="testme">Theme <strong style="color: rgba(77, 136, 255,.9);">practice01</strong> Made by kisxy.com</p><?php endif; ?>
        <p>Copyright © 2019 <a href="http://www.miitbeian.gov.cn" target="_blank" rel="noopener noreferrer"><?php $this->options->beianno(); ?></a></p>
        <p>Published with Typecho</p>
    </div>
</div></div>
<?php $this->footer(); ?>
<!-- 无限加载文章列表 -->
<?php if(!($this->is('post') || $this->is('page'))): ?>
<script src="https://cdn.staticfile.org/jquery-infinitescroll/3.0.5/infinite-scroll.pkgd.min.js"></script>
<script type="text/javascript">
    if ($('a').is('.next')) {
        var $grid = $('.content').masonry({
        itemSelector: '.main2',
        isAnimated: true,
        // columnWidth: 5
        });
        var msnry = $grid.data('masonry');
        $grid.infiniteScroll({
          path: '.next',
          append: '.main2',
          hideNav: '#ajaxloadpost',
          history: false,
          outlayer: msnry,
        });
        $grid.on('append.infiniteScroll', function( event, response, path) {
          $(".lazyload").lazyload({
            load : f_masonry,
        });
        });
        $grid.on( 'last.infiniteScroll', function( event, response, path ) {
          document.getElementById('showtext').innerHTML = '<p>已经到底啦！</p>';
        });
    }
</script>
<?php endif; ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('/js/practice01.js'); ?>"></script>
<?php if(!($this->options->bdAutoPush == '')): ?><?php $this->options->bdAutoPush(); ?><?php endif; ?>
</body>
</html>
