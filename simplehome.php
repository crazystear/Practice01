<style type="text/css">
    html,body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }
    .simple_home {
        width: 50%;
        margin: 0 auto;
        text-align: center;
        position: relative;
        top: 50%;
        transform: translateY(-60%);
        -ms-transform: translateY(-60%);
        -webkit-transform: translateY(-60%);
        -moz-transform: translateY(-60%);
        -o-transform: translateY(-60%);
    }
    .simple_home_span p {
        font-size: 20px;
        line-height: 26px;
        font-family: '华文行楷', "LingWai TC";
        color: #ccc;
    }
    .simple_home_a {
        color: #333;
        font-weight: bold;
        font-size: 26px;
        margin-top: 20px;
        font-family: '华文隶书', "LingWai TC";
    }
    .simple_home_span img {
        width: 100%;
        max-width: 600px;
        height: auto;
        filter: grayscale(100%);
        -ms-filter: grayscale(100%);
        -webkit-filter: grayscale(100%);
        -moz-filter: grayscale(100%);
        -o-filter: grayscale(100%);
        opacity: 0.8;
        transition: all 1s ease;
        -ms-transition: all 1s ease;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
    }
    .simple_home_span img:hover {
        filter: grayscale(0%);
        -ms-filter: grayscale(0%);
        -webkit-filter: grayscale(0%);
        -moz-filter: grayscale(0%);
        -o-filter: grayscale(0%);
        opacity: 1;
    }
</style>
<?php
    $this->widget('Widget_Archive@index', 'pageSize=1&type=category', 'slug=timeline')->to($timeline);
    while($timeline->next()): ?>
    <div class="simple_home">
        <span class="simple_home_span"><?php $timeline->content(); ?></span>
        <p><a class="simple_home_a" href="<?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?><?php while($categorys->next()): ?><?php $getCateName =  $categorys->slug; if($getCateName == 'timeline'): ?><?php echo $categorys->permalink; ?><?php endif; ?><?php endwhile; ?>" title="进入网站...">--- Enter ---</a></p>
    </div>
<?php endwhile; ?>