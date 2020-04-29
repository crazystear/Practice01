<?php
    $test666 = mt_rand(10000000,99999999);
?>
<div class="aplayerdemo">
    <div id="<?php echo $test666; ?>">
        <pre class="aplayer-lrc-content">
    </pre>
</div>
</div>
<script>
    var ap = new APlayer
        ({
            element: document.getElementById('<?php echo $test666; ?>'),
            narrow: false,
            autoplay: false,
            showlrc: false,
            loop: 'none',
            music: {
                title: '<span style="font-size:12px;"><?php $this->fields->aplayername(); ?></span>',
                author: '<?php $this->fields->aplayerauthor(); ?>',
                url: '<?php $this->fields->aplayerurl(); ?>',
                pic: '<?php $this->fields->aplayerthumb(); ?>'
            }
        });
</script>