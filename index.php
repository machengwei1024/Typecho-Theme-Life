<?php
/**
 * 记录生活，为写作而生！
 *
 * @package Life
 * @author Weic
 * @version 1.0
 * @link http://weic.me/themes-life/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');?>

<div class="blog-main-post">
    <div class="index-post-br"></div>
    <?php while($this->next()): ?>
    <article class="blog-post-block">
        <header>
        <?php if (array_key_exists('thumb',unserialize($this->___fields()))): ?>
            <div class="blog-post-block-img">
                <img src="<?php echo $this->fields->thumb;?>">
            </div>
        <?php else : ?>
        <?php $thumb = showThumbnail($this); if(!empty($thumb)):?>
            <div class="blog-post-block-img">
                <img src="<?php echo $thumb;?>">
            </div>
        <?php endif; ?>
        <?php endif; ?>
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
