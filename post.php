<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<header class="blog-post-page-title">
    <h4><?php $this->title() ?></h4>
    <time datetime="<?php $this->date('c'); ?>"><i class="fa fa-clock-o"></i><?php $this->date('Y-m-d'); ?></time>
    <span><i class="fa fa-folder-o"></i>
      <a href="" itemprop="url" rel="index"><?php $this->category(','); ?></a>
    </span>
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
    <article class="blog-post-page-readmore">

            <?php $this->thePrev('%s', NULL, array('title' => '<span>上一篇</span>', 'tagClass' => 'blog-post-page-readmore-prev')); ?>

            <?php $this->theNext('%s', NULL, array('title' => '<span>下一篇</span>', 'tagClass' => 'blog-post-page-readmore-next')); ?>

        <div style="clear: both;"></div>
    </article>

    <article class="blog-post-block blog-post-page-content">
            <div class="row">
                <div class="col-md-4 col-sm-4 post-page-more-btn">
                    <span class="post-comments-btn btn btn-info btn-block" data-toggle="tooltip" data-placement="top" title="目前没有找到较好的与Pjax插件兼容的方法，所以只能刷新页面后才能评论">点我评论</span>
                </div>
                <script>
                    $(".post-comments-btn").click(function(){
                        history.go(0) ;
                    })
                </script>
                <div class="col-md-4 col-sm-4 post-page-more-btn">
                    <span  data-toggle="modal" data-target="#post-donate-content">
                        <span id="post-donate-btn" class="btn btn-danger btn-block" data-toggle="tooltip" data-placement="top" title="如果您觉得本文还不错或者对您有帮助，可以考虑打赏一下作者哦">打赏本文</span>
                    </span>
                </div>
                <div class="col-md-4 col-sm-4 post-page-more-btn">
                    <span  data-toggle="modal" data-target="#post-qrcode-content">
                        <span><span id="post-qrcode-btn" class="btn btn-success btn-block" data-toggle="tooltip" data-placement="top" title="微信扫描二维码手机端查看本文及分享本文">二维码</span></span>
                    </span>
                </div>
            </div>
        <div class="post-more-function-br"></div>
        <?php $this->need('comments.php'); ?>
        <script>
            $(".post-comments-btn").click(function(){
                $(".post-comments").toggle();
            })
        </script>

<div class="modal fade" id="post-donate-content" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">打赏本文</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row post-donate-content">
                            <div class="col-md-4">
                                <p>支付宝</p>
                                    <img class="post-donate-content-img no-lightbox" src="<?php $this->options->alipayUrl() ?>" alt="">
                            </div>
                            <div class="col-md-4">
                                <p>微信</p>
                                    <img class="post-donate-content-img no-lightbox" src="<?php $this->options->wechatUrl() ?>" alt="">
                            </div>
                            <div class="col-md-4">
                                <p>财付通</p>
                                    <img class="post-donate-content-img no-lightbox" src="<?php $this->options->qqUrl() ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    </div>
                </div>
            </div>
        </div>
<!-- 文章二维码模态框 -->
        <div class="modal fade" id="post-qrcode-content" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">文章二维码</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row post-qrcode-content">
                            <span class="post-qrcode-content-canvas"></span>
                            <img class="post-qrcode-content-img no-lightbox" src=""/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- 文章页二维码生成脚本 -->
        <script>
            // post QRcode
            // 中文转码
            function toUtf8(str) {  
                var out, i, len, c;  
                out = "";  
                len = str.length;  
                for (i = 0; i < len; i++) {  
                    c = str.charCodeAt(i);  
                    if ((c >= 0x0001) && (c <= 0x007F)) {  
                        out += str.charAt(i);  
                    } else if (c > 0x07FF) {  
                        out += String.fromCharCode(0xE0 | ((c >> 12) & 0x0F));  
                        out += String.fromCharCode(0x80 | ((c >> 6) & 0x3F));  
                        out += String.fromCharCode(0x80 | ((c >> 0) & 0x3F));  
                    } else {  
                        out += String.fromCharCode(0xC0 | ((c >> 6) & 0x1F));  
                        out += String.fromCharCode(0x80 | ((c >> 0) & 0x3F));  
                    }  
                }  
                return out;  
            }
            // 生成
            var qrcode= $('.post-qrcode-content-canvas').qrcode({width: 150,height: 150,text: toUtf8("<?php $this->permalink() ?>")}).hide();   
            var canvas=qrcode.find('canvas').get(0);  
            $('.post-qrcode-content-img').attr('src',canvas.toDataURL('image/jpg'));
        </script>

    </article>
</div>

<?php $this->need('footer.php'); ?>

