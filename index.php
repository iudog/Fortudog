<?php
/**
 * 轻量、简约、美观、大方
 *
 * @package Fortudog
 * @author iudog
 * @version 1.1.0
 * @link https://iudog.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

$this->need('header.php');
?>

<div id="id-yulu" class="yulu">
    <p id="id-riye" class="riye">日夜两盏灯，春秋一场梦</p>
    <p id="id-mengxiang" class="mengxiang">没有梦想，只会做梦</p> <!-- 封面文字修改 -->
</div>

<?php
$biaotiMingcheng = $this->getArchiveTitle();
if (empty($biaotiMingcheng)) {
    $biaotiMingcheng = $this->options->title;
}
?>
<div class="index-biaoti">
    <h1 class="biaoti-dazi"><?php echo $biaotiMingcheng; ?></h1>
</div>

<div id="id-neirong-quyu" class="neirong-rongqi">
    <?php $this->need('sidebar.php'); ?>
    <div class="wenzhang-rongqi">
        <?php while($this->next()): ?>
            <article class="wenzhang-fengmian" onclick="window.location.href='<?php $this->permalink() ?>'">
                <a class="wenzhang-dianji-ceng" href="<?php $this->permalink() ?>" aria-label="进入文章详情"></a>
                <?php 
                $thumbnail = getThumbnail($this);
                if (!empty($thumbnail)) {
                ?>
                <div class="wenzhang-shangbu">
                    <div class="suolvetu"><img src="<?php echo $thumbnail; ?>" alt="文章图片"></div>
                    <div class="wenzhang-diejia">
                        <h2 class="fengmian-biaoti"><?php $this->title() ?></h2>
                        <h3 class="fabiao-xinxi">
                            <span>作者: <?php $this->author(); ?></span>
                            <span>发表于 <?php $this->date(); ?></span>
                        </h3>
                    </div>
                </div>
                <?php } else { ?>
                <div class="wenzhang-meiyoutu">
                    <h2 class="fengmian-biaoti"><?php $this->title() ?></h2>
                    <h3 class="fabiao-xinxi">
                        <span>作者: <?php $this->author(); ?></span>
                        <span>发表于 <?php $this->date(); ?></span>
                    </h3>
                </div>
                <?php } ?>
                <div class="yuanxinxi-neirong">
                    <div class="neirong"><?php $this->content(); ?></div>
                </div>
            </article>
        <?php endwhile; ?>

        <?php $this->pageNav('«', '»', 5, '...'); ?>

        <?php $this->need('yejiao.php'); ?> <!-- 页脚包含作者署名信息，请勿删除，如需修改请前往yejiao.php -->
    </div>
</div>

<?php
$this->need('footer.php');
?>