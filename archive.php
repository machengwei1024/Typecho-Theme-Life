<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<header class="blog-post-page-title blog-search-page-title">
  <h4><?php $this->archiveTitle(array(
			'category'  =>  _t('分类 <span class="archive-page-keyword">%s</span> 下的文章'),
			'search'    =>  _t('包含关键字 <span class="archive-page-keyword">%s</span> 的文章'),
			'tag'       =>  _t('标签 <span class="archive-page-keyword">%s</span> 下的文章'),
			'author'    =>  _t('<span class="archive-page-keyword">%s</span> 发布的文章')
		), '', ''); ?></h4>
</header>

<div class="blog-main-post blog-post-page-box">
    <?php while($this->next()): ?>
    <article class="blog-post-block">
        <header>

        </header>
    <div class="blog-post-block-padding">
        <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
        <section>
            <?php $this->excerpt(120, ' ...'); ?>
        </section>
        <footer>
            <time datetime="<?php $this->date('c'); ?>"><i class="fa fa-clock-o"></i><?php $this->date('Y-m-d'); ?></time>
            <span><i class="fa fa-folder-o"></i>
              <a href="" itemprop="url" rel="index"><?php $this->category(','); ?></a>
          	</span>
        </footer>
    </div>
</article>
    <?php endwhile; ?>
    <?php $this->need('navigator.php'); ?>
</div>


<?php $this->need('footer.php'); ?>