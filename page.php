<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="index-biaoti wenzhang-biaoti">
    <h1 class="biaoti-dazi"><?php $this->title(); ?></h1>
    <p class="fabiao-shijian">
        发表于 <?php $this->date(); ?>
    </p>
</div>
<div class="neirong-rongqi">
    <?php $this->need('sidebar.php'); ?>

    <div class="wenzhang-rongqi">
        <div class="wenzhang-neirong">
            <?php $this->content(); ?>
        </div>

        <?php $this->need('comments.php'); ?>

    </div>
</div>

<?php
$this->need('footer.php');
?>