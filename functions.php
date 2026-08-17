<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
// 获取文章缩略图
function getThumbnail($widget) {
    if (preg_match('/<img.*?src="(.*?)".*?>/i', $widget->content, $matches)) {
        $thumbnail = $matches[1];
        
        $widget->content = preg_replace('/<img.*?src=".*?".*?>/i', '', $widget->content);
        
        return $thumbnail;
    }
    return '';
}










function themeConfig($form) {
    echo '<link rel="stylesheet" type="text/css" href="' . Helper::options()->themeUrl . '/houtai.css" />';
    require_once __DIR__ . '/qiutouwei.php';
}