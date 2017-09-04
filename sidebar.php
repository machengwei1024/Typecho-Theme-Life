<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--博客侧边栏开始-->
        <div class="col-xl-3 blog-sidebar">
            <div class="blog-sidebar-title">
                <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
            </div>
            <div class="blog-sidebar-logo">
                <img src="<?php $this->options->logoUrl(); ?>">
            </div>
            <div class="blog-sidebar-count blog-sidebar-padding">
            <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                <div class="blog-sidebar-count-left">
                    <p class="blog-sidebar-count-p"><?php $stat->publishedPostsNum() ?></p>
                    <span class="blog-sidebar-count-span">文章</span>
                </div>
                <div class="blog-sidebar-count-right">
                    <p class="blog-sidebar-count-p"><?php $stat->categoriesNum() ?></p>
                    <span class="blog-sidebar-count-span">标签</span>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div class="blog-sidebar-icon blog-sidebar-padding">
                <ul>
                    <li><a href="<?php $this->options->socialgithub(); ?>" class="icon-github" target="_blank" data-toggle="tooltip" data-placement="top" title="Github"><i class="fa fa-github"></i></a></li>
                    <li><a href="<?php $this->options->socialweibo(); ?>" class="icon-weibo" target="_blank" data-toggle="tooltip" data-placement="top" title="新浪微博"><i class="fa fa-weibo"></i></a></li>
                    <li><a href="<?php $this->options->socialtwitter(); ?>" class="icon-twitter" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <?php if ($this->options->socialfacebook): ?>
                    <li><a href="<?php $this->options->socialfacebook(); ?>" class="icon-facebook" target="_blank" data-toggle="tooltip" data-placement="top" title="FaceBook"><i class="fa fa-facebook"></i></a></li>
                    <?php endif; ?>
                    <li><a href="mailto:<?php $this->options->socialmail(); ?>" class="icon-email" data-toggle="tooltip" data-placement="top" title="E-Mail"><i class="fa fa-envelope"></i></a></li>
                    <li><a href="<?php $this->options->socialrss(); ?>" class="icon-rss" data-toggle="tooltip" target="_blank" data-placement="top" title="RSS"><i class="fa fa-rss"></i></a></li>
                </ul>
            </div>
            <div class="blog-sidebar-categories">
                <h4 class="blog-sidebar-h4"><i class="fa fa-folder-open"></i>&nbsp;文章分类</h4>
                <ul class="list-group blog-sidebar-padding">
                    <?php $this->widget('Widget_Metas_Category_List')->parse('<li class="list-group-item justify-content-between"><a href="{permalink}">{name}</a><span class="badge badge-default badge-pill">{count}</span></li>'); ?>
                </ul>
            </div>
            <div class="blog-sidebar-tags">
                <h4 class="blog-sidebar-h4"><i class="fa fa-tag"></i>&nbsp;标签云</h4>
                <ul class="blog-sidebar-tags-ul blog-sidebar-padding">
                    <?php Typecho_Widget::widget('Widget_Metas_Tag_Cloud','ignoreZeroCount=1&limit=30')->to($tags); ?>
                    <?php if($tags->have()): ?>
                    <?php while ($tags->next()): ?>
                    <li><a href="<?php $tags->permalink();?>" class="tag-could" data-toggle="tooltip" data-placement="top" title="<?php $tags->name(); ?>" data-toggle="tooltip"><?php $tags->name(); ?></a></li>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <script>
              // 博客侧栏标签云随机色
              var tag_cloud = $('.tag-could');
              tag_cloud.each(function () {
                  var Cnum = 9;
                  var Crand = parseInt(Math.random() * Cnum);
                  $(this).addClass("tag-could" + Crand);
              })
            </script>
            <!--返回顶部按钮-->
            <div class="retop">
                <i class="fa fa-angle-up"></i>
            </div>
        </div><!--博客侧边栏结束-->
