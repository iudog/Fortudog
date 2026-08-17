<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://pic1.zhimg.com/v2-ed99ef114846496b779b9a5a59ba8e28"> <!-- 网站图标 -->
    <title><?php $this->options->title(); ?> - <?php $this->options->description(); ?></title>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('comments.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('xiangyingshi.css'); ?>">
    <?php $this->header(); ?>
</head>

<body>
<img src="https://pic1.zhimg.com/v2-bbb238e56874a1a00361e1ade60ba933" alt="背景图片" class="fengmian"> <!-- 背景图片 -->

<nav class="daohanglan">
    <div class="logo">
        <a href="<?php $this->options->siteUrl(); ?>">
            <?php $this->options->title() ?>
        </a>
    </div>

    <div class="caidan">
        <ul class="daohang-liebiao">
            <li class="caidan-xiangmu">
                <a <?php echo $this->is('index') ? 'class="caidan-xiangmu-xuanzhong"' : ''; ?>
                    href="<?php $this->options->siteUrl(); ?>">首页</a>
            </li>

            <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
            <?php while ($categories->next()): ?>
            <li class="caidan-xiangmu">
                <a <?php echo $this->is('category', $categories->slug) ? 'class="caidan-xiangmu-xuanzhong"' : ''; ?>
                    href="<?php $categories->permalink(); ?>"
                    title="<?php $categories->name(); ?>">
                    <?php $categories->name(); ?>
                </a>
            </li>
            <?php endwhile; ?>

            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
                <li class="caidan-xiangmu">
                    <a <?php echo $this->is('page', $pages->slug) ? 'class="caidan-xiangmu-xuanzhong"' : ''; ?>
                        href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</nav>

<div class="quanbu-ronqi">