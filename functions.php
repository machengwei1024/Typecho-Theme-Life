<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('LOGO地址'), _t('在这里填入一个图片的URL地址, 以在网站显示你的LOGO'));
    $form->addInput($logoUrl);
    // 赞助图片链接
    $wechatUrl = new Typecho_Widget_Helper_Form_Element_Text('wechatUrl', NULL, NULL, _t('微信图片地址'), _t('在这里填入你微信二维码图片的URL地址, 以在网站文章页的赞助模块里显示你的微信二维码'));
    $form->addInput($wechatUrl);
    $alipayUrl = new Typecho_Widget_Helper_Form_Element_Text('alipayUrl', NULL, NULL, _t('支付宝图片地址'), _t('在这里填入你支付宝二维码图片的URL地址, 以在网站文章页的赞助模块里显示你的支付宝二维码'));
    $form->addInput($alipayUrl);
    $qqUrl = new Typecho_Widget_Helper_Form_Element_Text('qqUrl', NULL, NULL, _t('QQ图片地址'), _t('在这里填入你QQ二维码图片的URL地址, 以在网站文章页的赞助模块里显示你的QQ二维码'));
    $form->addInput($qqUrl);
    //社交链接
	$socialweibo = new Typecho_Widget_Helper_Form_Element_Text('socialweibo', NULL, NULL, _t('微博'), _t('在这里输入微博链接,带http://'));
	$form->addInput($socialweibo);
	$socialgithub = new Typecho_Widget_Helper_Form_Element_Text('socialgithub', NULL, NULL, _t('GitHub'), _t('在这里输入GitHub链接,带http://'));
	$form->addInput($socialgithub);
	$socialrss = new Typecho_Widget_Helper_Form_Element_Text('socialrss', NULL, NULL, _t('RSS'), _t('在这里输入RSS链接,带http://'));
	$form->addInput($socialrss);
	$socialemail = new Typecho_Widget_Helper_Form_Element_Text('socialemail', NULL, NULL, _t('电子邮箱'), _t('在这里输入电子邮箱,例如 i@weic96.cn'));
	$form->addInput($socialemail);
    $socialtwitter = new Typecho_Widget_Helper_Form_Element_Text('socialtwitter', NULL, NULL, _t('推特'), _t('在这里输入推特链接,带http://'));
    $form->addInput($socialtwitter);
    $socialfacebook = new Typecho_Widget_Helper_Form_Element_Text('socialfacebook', NULL, NULL, _t('脸书'), _t('在这里输入脸书链接,带http://'));
    $form->addInput($socialfacebook);
    //备案号
    $socialicp = new Typecho_Widget_Helper_Form_Element_Text('socialicp', NULL, NULL, _t('备案号'), _t('在这里输入备案号'));
    $form->addInput($socialicp);
}



function showThumbnail($widget)
{ 
$cai = '';
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i'; 
    $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';

if ($attach && $attach->isImage) {

$ctu = $attach->url.$cai;
    } 
else 
if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
$ctu = $thumbUrl[1][0].$cai;
    }
  else   if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
$ctu = $thumbUrl[1][0].$cai;
    }
    else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
$ctu = $thumbUrl[1][0].$cai;
    }
else {
$ctu = "";
}
return $ctu;
}