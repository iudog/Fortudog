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
            <!-- CC协议信息 -->
            <div class="quanxian-xinxi-mokuai">
                <h2 class="quanxian-wenzhang-biaoti"><?php $this->title(); ?></h2>
                <a class="quanxian-wenzhang-lianjie" href="#"><?php $this->permalink(); ?></a>
                <div class="quanxian-xinxi-liebiao">
                    <div class="quanxian-xinxi-xiang">
                        <span class="quanxian-xinxi-biaoqian">本文作者</span>
                        <span class="quanxian-xinxi-neirong"><?php $this->author->screenName(); ?></span>
                    </div>
                    <div class="quanxian-xinxi-xiang">
                        <span class="quanxian-xinxi-biaoqian">发布时间</span>
                        <span class="quanxian-xinxi-neirong"><?php $this->date(); ?></span>
                    </div>
                    <div class="quanxian-xinxi-xiang">
                        <span class="quanxian-xinxi-biaoqian">许可协议</span>
                        <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.zh-hans" target="_blank" rel="noopener noreferrer">CC BY-NC-SA 4.0</a>
                    </div>
                </div>
                <div class="cc-biaoshi">CC</div>
            </div>
        </div>

        <?php $this->need('comments.php'); ?>

    </div>
</div>

<?php
$this->need('footer.php');
?>