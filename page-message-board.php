<?php
/**
 * message-board
 *
 * @package custom
 */
?>
<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('header.php');
?>
<div class="site-wrap">
    <div class="flex-left">
        <div class="left-side">
            <div class="inside">
                <div id="content" class="content">
                    <div class="post_content main2">
                        <div class="pcontent">
                            <h1 class="post_entry"><a href="<?php $this->permalink() ?>">读者墙&留言板</a></h1>
                            <p class="post_meta">
                                <span class="head_meta">Template&nbsp;:&nbsp;Message Board</span>
                                <span class="head_meta">Views&nbsp;:&nbsp;<?php get_post_view($this) ?></span>
                                <span class="head_meta" style="border: none;">Comments&nbsp;:&nbsp;<?php $this->commentsNum('0','1','%d'); ?></span>
                            </p>
                            <div class="post_body">
                                <?php $this->content(); ?>
                            	<div class="message_board_content">
                            	<?php
									$period = time() - 999592000; 
									$counts = Typecho_Db::get()->fetchAll(Typecho_Db::get()
									->select('COUNT(author) AS cnt','author', 'url', 'mail')
									->from('table.comments')
									->where('created > ?', $period )
									->where('status = ?', 'approved')
									->where('type = ?', 'comment')
									->where('authorId = ?', '0')
									->group('author')
									->order('cnt', Typecho_Db::SORT_DESC)
									->limit(40)
									);
									$mostactive = '';
									$avatar_path = 'https://cdn.v2ex.com/gravatar/';
									foreach ($counts as $count) {
									  $avatar = $avatar_path . md5(strtolower($count['mail'])) . '?s=65';
									  $c_url = $count['url']; if ( !$c_url ) $c_url = Helper::options()->siteUrl;
									  $mostactive .= "<a class='message_board_a' href='" . $c_url . "' title='" . $count['author'] . " (参与" . $count['cnt'] . "次互动)' target='_blank' rel='external nofollow'><img class='message_board_a_img' src='" . $avatar . "' alt='" . $count['author'] . "的头像' width='65' height='65' /></a>\n";
									}
									echo $mostactive; ?>
								</div>	
                                <?php if(!($this->fields->aplayerurl == '' && $this->fields->aplayerthumb == '')): ?>
                                    <?php $this->need('aplayer.php'); ?>
                                <?php endif; ?>
                            </div>
                            <p class="post_tag">
                                <span class="head_meta" style="border: none;">Posted by&nbsp;:&nbsp;<?php $this->author(); ?></span>
                            </p>
                            <p class="post_copyright">
                                <span>所有原创文章采用 <a href="https://creativecommons.org/licenses/by-nc/4.0/deed.zh" rel="external nofollow" target="_blank">知识共享署名-非商业性使用 4.0 国际许可协议</a> 进行许可。</span><br/>
                                <span>您可以自由的转载和修改，但请务必注明文章来源并且不可用于商业目的。</span><br/>
                                <span>本站部分内容收集于互联网，如果有侵权内容、不妥之处，请联系我们删除。敬请谅解！</span><br/>
                            </p>
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
    <?php $this->need('sidebar.php'); ?>
    <?php $this->need('footer.php'); ?>