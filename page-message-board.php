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
                                      $qnum = str_replace('@qq.com', '', $count['mail']);
                                      if (strstr($count['mail'], "qq.com") && is_numeric($qnum) && strlen($qnum) > 4 && strlen($qnum) < 12) {
                                          $avatar = 'https://q.qlogo.cn/g?b=qq&nk='.$qnum.'&s=100';
                                      }else{
                                          $avatar = $avatar_path . md5(strtolower($count['mail'])) . '?s=65';
                                      }
									  $c_url = $count['url']; if ( !$c_url ) $c_url = Helper::options()->siteUrl;
									  $mostactive .= "<a class='message_board_a' href='" . $c_url . "' title='" . $count['author'] . " (参与" . $count['cnt'] . "次互动)' target='_blank' rel='external nofollow'><img style='width:65px;height:65px;' class='message_board_a_img' src='" . $avatar . "' alt='" . $count['author'] . "的头像' width='65' height='65' /></a>\n";
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
                            <?php include("copyright.php"); ?>
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