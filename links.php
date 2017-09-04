<?php
/**
 * 友情链接模板
 *
 * @package custom
 */
?>
<?php $this->need('header.php'); ?>

<header class="blog-post-page-title">
    <h4><?php $this->title() ?></h4>
</header>
<div class="blog-main-post blog-post-page-box">
    <article class="blog-post-block blog-post-page-content">
        <section>
            <?php $this->content(); ?>
            <script>
            	$(".links-block p").addClass("row");
				$('.links-block br').remove();
            </script>
        </section>
        <footer class="blog-post-page-tags">

        </footer>
    </article>
</div>

<?php $this->need('footer.php'); ?>

<script type="text/javascript">
// 链接页面类名
$('.links-block a').addClass('links-block-btn btn btn-outline-info btn-block').wrap('<div class="col-md-3 links-block-div"></div>');
$('.links-block').addClass('row');
$(".links-block>p").each(function(){
      $(this).parent().append($(this).children());
      $(this).remove();
});
</script>
