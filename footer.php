<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->need('footer-info.php'); ?>
</div><!--博客主栏结束-->
<?php $this->need('sidebar.php'); ?>

<?php $this->footer(); ?>
</div>
</div>
    <script type="text/javascript">
        hljs.initHighlightingOnLoad();
        hljs.initLineNumbersOnLoad();
        otherF();
        $(document).pjax('a', '#pjax-box', {fragment:'#pjax-box', timeout:8000}).on('pjax:complete', function() {
            $('pre code').each(function(i, block){
                hljs.highlightBlock(block);
            })
            $('code.hljs').each(function(i, block) {
                hljs.lineNumbersBlock(block);
            });
        }).on('pjax:start', function() { NProgress.start(); }).on('pjax:end',   function() { 
            NProgress.done(); 
            otherF(); 
        });
    </script>
</body>
</html>
