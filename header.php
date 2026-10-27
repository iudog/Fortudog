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
    <button type="button" class="hanbao-caidan-anniu" id="id-hanbao-caidan-anniu" aria-label="打开菜单">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
    </button>

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

    <button type="button" class="sousuo-anniu" id="id-sousuo-anniu" aria-label="打开搜索">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
    </button>

    <div class="daohang-sousuo" id="id-daohang-sousuo">
        <form method="post" action="<?php $this->options->searchUrl(); ?>" role="search" class="daohang-sousuo-biao-dan">
            <input type="text" name="s" class="daohang-sousuo-shu-ru" placeholder="搜索文章..." required />
            <button type="submit" class="daohang-sousuo-ti-jiao-an-niu" aria-label="搜索">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>
        </form>
    </div>
</nav>

<?php $this->need('head-chouti.php'); ?>

<div class="quanbu-ronqi">