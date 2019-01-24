<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="flex-right">
	<div class="rightbar" id="rightbar">
		<?php if(!($this->is('page'))): ?>
		<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
			<?php while($pages->next()): ?>
				<?php if ($pages->template == 'page-status.php'): ?>
					<?php if(!($pages->content == '')): ?>
					<div class="side-about" style="margin-bottom: 20px;border-radius: 5px;">
				    	<div class="about-me">
				    		<p><i style="color: #ff0000;" class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp;&nbsp;<?php $pages->title(); ?></p>
				    		<p><a class="cusMore" href="<?php $pages->permalink(); ?>" title="查看更多..."><i class="fa fa-bars" aria-hidden="true"></i></a></p>
				    	</div>
				    	<div class="desc2">
					    	<?php
					    		preg_match('/\[record\](.*?)\<br\>(.*?)\[\/record]/i', $pages->content, $smatches);
					    		if ($smatches) {
					    			echo '<p>'.$smatches[2].'<span> --- updated on '.$smatches[1].'</span></p>';
					    		}else{
					    			echo "<p>未获取到内容，请按照主题指定的格式发布公告或动态内容！</p>";
					    		}
					    	?>	
				    	</div>
				    </div>
				    <?php endif; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<div class="side-about">
	    	<div class="about-me"><p><i style="color: #ff0000;" class="fa fa-bookmark" aria-hidden="true"></i>&nbsp;&nbsp;关于博主</p></div>
	    	<div>
		    	<div class="me-avatar"><div class="ava2wx">
	    			<a id="logoUrl" style="opacity: 1;" href="<?php $this->options->siteUrl(); ?>">
		            	<img src="<?php $this->options->logoUrl(); ?>" />
		          	</a>
		          	<a id="wechatqrcode" style="margin-top: -80px;opacity: 0;" href="<?php $this->options->siteUrl(); ?>">
		            	<img src="<?php $this->options->wechatqrcode(); ?>" />
		          	</a>
		    	</div></div>
		    	<div class="desc"><p><?php $this->options->cusAboutme(); ?></p></div>
		    </div>
			<div class="social">
				<div class="weixin" id="weixin" style="border-right: 1px solid rgba(0,0,0,.04)">
					<i class="fa fa-weixin" aria-hidden="true"></i>
				</div>
				<div class="tweibo" style="border-right: 1px solid rgba(0,0,0,.04)">
					<a class="tweibo-a" href="<?php $this->options->githubaddr(); ?>" target="_blank">
						<?php if(!empty($this->options->secIcon)): ?>
							<?php $this->options->secIcon(); ?>
						<?php else: ?>
							<i class="fa fa-github" aria-hidden="true"></i>
						<?php endif; ?>
					</a>
				</div>
				<div class="qq" style="border-right: 1px solid rgba(0,0,0,.04)">
					<a class="qq-a" href="<?php $this->options->contactbyqq(); ?>" target="_blank">
						<?php if(!empty($this->options->thrIcon)): ?>
							<?php $this->options->thrIcon(); ?>
						<?php else: ?>
							<i class="fa fa-qq" aria-hidden="true"></i>
						<?php endif; ?>
					</a>
				</div>
				<div class="weibo" style="border-right: 1px solid rgba(0,0,0,.04)">
					<a class="weibo-a" href="<?php $this->options->meonweibo(); ?>" target="_blank">
						<?php if(!empty($this->options->forIcon)): ?>
							<?php $this->options->forIcon(); ?>
						<?php else: ?>
							<i class="fa fa-weibo" aria-hidden="true"></i>
						<?php endif; ?>
					</a>
				</div>
				<div class="email">
					<a class="email-a" href="<?php $this->options->feedUrl(); ?>" target="_blank">
						<i class="fa fa-feed" aria-hidden="true"></i>
					</a>
				</div>
			</div>
	    </div>

		

	<?php if(!($this->is('index'))): ?>
		<div class="newposts">
	    	<div class="newposts_title"><p><i style="color: #ff0000;" class="fa fa-fire" aria-hidden="true"></i>&nbsp;&nbsp;近期文章</p></div>
	    	<div class="newposts_items">
	    		<ul>
					<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10&type=category')->parse('<li><a href="{permalink}"><i style="color:rgba(77, 136, 255,.8);" class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;{title}</a></li>'); ?>
				</ul>
	    	</div>
	    </div>
	<?php endif; ?>
		<div class="newcomments">
	    	<div class="newcomments_title"><p><i style="color: #ff0000" class="fa fa-commenting" aria-hidden="true"></i>&nbsp;&nbsp;近期评论</p></div>
	    	<div class="newcomments_items">
	    		<ul>
				<?php $this->widget('Widget_Comments_Recent','pageSize=10&ignoreAuthor=true')->to($comments); ?>
				<?php if($comments->have()): ?>
					<?php while($comments->next()): ?>
				    	<li><a href="<?php $comments->permalink(); ?>"><i style="color:rgba(77, 136, 255,.8);" class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp;<?php $comments->author(false); ?></a>: <?php $comments->excerpt(50, '...'); ?></li>
					<?php endwhile; ?>
				<?php else: ?>
					<li>暂无评论</li>
				<?php endif; ?>
				</ul>
	    	</div>
	    </div>
	<?php if (!empty($this->options->sidebarCategory) && in_array('onSidebar', $this->options->sidebarCategory)): ?>
	    <div class="newcomments">
	    	<div class="newcomments_title"><p><i style="color: #ff0000" class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp;分类目录</p></div>
	    	<div class="sideCate_items">
	    		<ul>
	    		<?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
	            <?php while($categorys->next()): ?>
	            	<li><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->description(); ?>"><?php $categorys->name(); ?></a></li>
	            <?php endwhile; ?>
	        	</ul>
	    	</div>
	    </div>
	<?php endif; ?>
	<?php if($this->is('index')): ?>
	<?php if (!empty($this->options->ShowLinks) && in_array('sidebar', $this->options->ShowLinks)): ?>
	    <div class="friends">
	    	<div class="links"><p><i style="color: #ff0000;" class="fa fa-link" aria-hidden="true"></i>&nbsp;&nbsp;友情链接</p></div>
	    	<div class="links_items">		
	    		<ul>
	    			<?php Links($this->options->IndexLinksSort); ?>
	    		</ul>
	    		<ul style="margin-top: -20px;">
		    		<li><a href="#0" class="cd-top" style="color: #fff;"> - Back to Top - </a></li>
		    	</ul>
	    	</div>
	    </div>
	<?php endif; ?>
	<?php else: ?>
		<div class="friends">
	    	<div class="links_items">
	    		<ul>
		    		<li><a href="#0" class="cd-top" style="color: #fff;"> - Back to Top - </a></li>
		    	</ul>
	    	</div>
	    </div>
	<?php endif; ?>
    </div>
</div>
