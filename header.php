<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" href="<?php $this->options->themeUrl('favicon.ico'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/jquery.fancybox.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/atom-one-dark.css'); ?>">
      <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/nprogress.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/life.css'); ?>">
	<script src="<?php $this->options->themeUrl('js/jquery-2.2.4.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/jquery.pjax.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/nprogress.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/tether.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/highlight.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/highlightjs-line-numbers.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/jquery.qrcode.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/jquery.fancybox.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/Life.js'); ?>"></script>
    <?php $this->header(); ?>
</head>
<body>
	<div class="container">
    <div class="row blog-box-shadow">
        <!--博客主栏开始-->
        <div class="col-xl-9 col-lg-12 blog-main" id="pjax-box">
            <header class="blog-header">
                <a href="<?php $this->options->siteUrl(); ?>" class="blog-header-mobile-title"><?php $this->options->title(); ?></a>
                <a href="javascript:;" class="blog-header-navbar-btn"><i class="fa fa-bars"></i></a>
                <nav class="blog-header-navbar blog-header-fixed">
                    <ul class="blog-navbar-links">
                        <?php $this->need('navigation.php'); ?>
                        <div class="blog-navbar-right">
                            <form id="search" method="post" action="./" role="search">
                                <div class="input-group">
                                    <input type="text" name="s" class="blog-header-search" placeholder="search...">
                                    <buttn type="submit" class="blog-header-search-btn"><i class="fa fa-search"></i></buttn>
                                </div>
                            </form>
                        </div>
                    </ul>
                </nav>
            </header>
