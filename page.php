<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<header class="blog-post-page-title">
    <h4><?php $this->title() ?></h4>
</header>
<div class="blog-main-post blog-post-page-box">
    <article class="blog-post-block blog-post-page-content">
        <section>
            <?php $this->content(); ?>
        </section>
        <footer class="blog-post-page-tags">
            <?php $this->tags(' ', true, ''); ?>
        </footer>
    </article>
</div>

<?php $this->need('footer.php'); ?>