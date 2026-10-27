<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="wenzhang-biaoti">
    <h1 class="biaoti-dazi">404 · 页面走丢了</h1>
    <p class="fabiao-shijian">你访问的页面不存在，或者已经被删除了</p>
</div>

<div class="neirong-rongqi">
    <?php $this->need('sidebar.php'); ?>

    <div class="wenzhang-rongqi">
        <div class="wenzhang-neirong">
            <p>抱歉，你访问的页面可能已经离开，或者从来就没有存在过。</p>
            <p>你可以返回<a href="<?php $this->options->siteUrl(); ?>">首页</a>继续浏览，也可以使用右上角的搜索框查找你需要的内容。</p>
        </div>
        <?php $this->need('yejiao.php'); ?> <!-- 页脚包含作者署名信息，请勿删除，如需修改请前往yejiao.php -->
    </div>
</div>

<?php
$this->need('footer.php');
?>