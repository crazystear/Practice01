// fancybox3 options
$('[data-fancybox]').fancybox({
    transitionEffect: "zoom-in-out",
    transitionDuration: 366,
    protect: true,
    buttons: [
        "zoom",
        "slideShow",
        "fullScreen",
        "close"
    ],
});
// header opacity
$(function(){
function opc(){
$(".imgslide-container").animate({"opacity":1},500);
}
var ooo = setTimeout(opc,10);
});
//导航变化
window.addEventListener("scroll",function(e){
var t =document.documentElement.scrollTop||document.body.scrollTop;
if(t <= 50){
    $('#headnav').removeClass('headnav2').addClass('headnav');
    $('.navmla').removeClass('nav_menu_li_a').addClass('nav_menu_li_a2');
    $('.navmla2').removeClass('nav_menu_li_a3').addClass('nav_menu_li_a2');
    $('#topsearch').removeClass('topsearch2').addClass('topsearch');
}else{
    $('#headnav').removeClass('headnav').addClass('headnav2');
    $('.navmla').removeClass('nav_menu_li_a2').addClass('nav_menu_li_a');
    $('.navmla2').removeClass('nav_menu_li_a2').addClass('nav_menu_li_a3');
    $('#topsearch').removeClass('topsearch').addClass('topsearch2');
}
});
//返回顶部
jQuery(document).ready(function($){
    var offset = 300,
        offset_opacity = 1200,
        scroll_top_duration = 1000,
        $back_to_top = $('.cd-top');
    $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0 ,
            }, scroll_top_duration
        );
    });
});
//搜索框
var controlSearch  = document.getElementById('controlSearch');
var searchForm = document.getElementById('topsearch');
var testmea = document.getElementById('testme');
if (testmea) {
    testmea.innerHTML = 'Theme <strong style="color: rgba(77, 136, 255,.9);">practice01</strong> Made by kisxy.com';
}
controlSearch.onclick = function(){
    var oop = searchForm.style.opacity;
    if(oop == '0'){
        searchForm.style.visibility = 'visible';
        searchForm.style.opacity = '1';
        document.getElementById('switchicon').innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
    }else{
        searchForm.style.visibility = 'hidden';
        searchForm.style.opacity = '0';
        document.getElementById('switchicon').innerHTML = '<i class="fa fa-search" aria-hidden="true"></i>';
    }
}
var m_controlSearch  = document.getElementById('m_controlSearch');
m_controlSearch.onclick = function(){
    var oop2 = searchForm.style.opacity;
    if(oop2 == '0'){
        searchForm.style.visibility = 'visible';
        searchForm.style.opacity = '1';
        document.getElementById('m_switchicon').innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
    }else{
        searchForm.style.visibility = 'hidden';
        searchForm.style.opacity = '0';
        document.getElementById('m_switchicon').innerHTML = '<i class="fa fa-search" aria-hidden="true"></i>';
    }
}
//移动端菜单
var inheadnav  = document.getElementById('m_inheadnav');
var mmenu = document.getElementById('m_menu_1');
inheadnav.onclick = function(){
    var oop3 = mmenu.style.opacity;
    if(oop3 == '0'){
        mmenu.style.visibility = 'visible';
        mmenu.style.opacity = '1';
        document.getElementById('m_inheadnav').innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
    }else{
        mmenu.style.visibility = 'hidden';
        mmenu.style.opacity = '0';
        document.getElementById('m_inheadnav').innerHTML = '<i class="fa fa-bars" aria-hidden="true"></i>';
    }
}
console.log('%c 一支穿云箭，千军万马来相见！ %c 小宇博客：https://sunxyu.cn', 'color: #fadfa3; background: #030307; padding:5px', 'background: #fadfa3; padding:5px');
// random color
$(document).ready(function() {
    var randomlinkcolor = $(".innerlinks_items li");
    randomlinkcolor.each(function() {
        var x = 20;
        var y = 0;
        var randcolor = parseInt(Math.random() * (x - y + 1) +y);
        $(this).addClass("randomlinksc" + randcolor);
    });
    var randomlinkcolor2 = $(".box .post");
    randomlinkcolor2.each(function() {
        var x2 = 20;
        var y2 = 0;
        var randcolor2 = parseInt(Math.random() * (x2 - y2 + 1) +y2);
        $(this).addClass("randomlinkscg" + randcolor2);
    });
    var randomlinkcolor3 = $(".setback");
    randomlinkcolor3.each(function() {
        var x3 = 20;
        var y3 = 0;
        var randcolor3 = parseInt(Math.random() * (x3 - y3 + 1) +y3);
        $(this).addClass("randomlinkscg" + randcolor3);
    });

    var logoUrl = document.getElementById('logoUrl');
    var wechatqrcode = document.getElementById('wechatqrcode');
    // var wechatqrcode = document.getElementById('wechatqrcode');
    $("#weixin").hover(function(){
        logoUrl.style.opacity = '0';
        wechatqrcode.style.opacity = '1';
        },function(){
            logoUrl.style.opacity = '1';
            wechatqrcode.style.opacity = '0';
      });
});
//end-------------------------------------------------------------------------------