<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>

<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
    <div id="<?php $comments->theId(); ?>">
        <div class="comments-author-img">
            <?php $comments->gravatar('48', ''); ?>
        </div>
        <div class="comments-main">
            <div>
                <a href=""><strong class="comments-author-name"><?php $comments->author(); ?></strong></a>
                <!-- <label class="label comments-author-tags">博主</label>  -->
                <span class="text-xs block m-t-xs comments-time">
                    <?php $comments->date("m月d日"); ?>
                </span>
            </div>
            <div class="comments-content"><?php $comments->content(); ?></div>
        </div>
        <div style="clear: both;"></div>
    </div>
    <span class="comments-reply-btn"><?php $comments->reply("回复"); ?></span>

<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>
<br>
<br>
<div id="comments" class="post-comments">
    <!-- <span class="post-comments-btn">评论</span> -->
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <div class="comments-number-box">
          <p class="comments-number"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></p>
    </div>
    <br>

    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo;', '&raquo;'); ?>

    <?php endif; ?>


<?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
            <?php $comments->cancelReply(); ?>
        </div>

        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <?php if($this->user->hasLogin()): ?>
            <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <div class="vedit">
                  <textarea id="textarea" name="text" class="veditor vinput" placeholder="评论前请先F5刷新本页面"></textarea>
            </div>
            <div class="form-group">
                 <button id="from_submit" type="submit" class="btn btn-info btn-block"><?php _e('发射'); ?></button>
            </div>
            <?php else: ?>
                  <div class="vedit">
                        <textarea id="textarea" name="text" class="veditor vinput" placeholder="评论前请先F5刷新本页面"></textarea>
                  </div>
                  <div class="vcontrol">
                        <div class="vident">
                              <input name="author" id="author" placeholder="称呼" class="vnick vinput form-control" type="text" />
                              <input name="url" id="url" placeholder="网址(http://)" class="vlink vinput form-control" type="text" />
                              <input name="mail" id="mail" placeholder="邮箱" class="vmail vinput form-control" type="email" />
                        </div>
                        <div class="vright">
                              <button id="from_submit" type="submit" class="vsubmit vbtn"><?php _e('发射'); ?></button>
                        </div>
                  </div>

            <?php endif; ?>
        </form>
    </div>
    <?php else: ?>
    <h3 style="text-align:center"><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>
