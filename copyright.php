<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if (!empty($this->options->posCopy) && in_array('closeCopy', $this->options->posCopy)): ?><?php else: ?>
    <p class="post_copyright">
        <?php if(!empty($this->options->postCopyright)): ?>
            <?php $this->options->postCopyright(); ?>
        <?php else: ?>
            <span>所有原创文章采用 <a href="https://creativecommons.org/licenses/by-nc/4.0/deed.zh" rel="external nofollow" target="_blank">知识共享署名-非商业性使用 4.0 国际许可协议</a> 进行许可。</span><br/>
            <span>您可以自由的转载和修改，但请务必注明文章来源并且不可用于商业目的。</span><br/>
            <span>本站部分内容收集于互联网，如果有侵权内容、不妥之处，请联系我们删除。敬请谅解！</span><br/>
        <?php endif; ?>
    </p>
<?php endif; ?>