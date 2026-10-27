<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<div class="zhe-zhao-ceng" id="id-zhe-zhao-ceng"></div>
<aside class="cebianlan-chouti" id="id-cebianlan-chouti">

    <div class="chouti-neibu-fangkuang">
        <div class="touxiang-quyu">
            <img src="https://pic1.zhimg.com/v2-ed99ef114846496b779b9a5a59ba8e28" alt="头像" class="touxiang-tu">
        </div>
        <div class="geren-jianjie">
            <h1 class="zuozhe-mingcheng" style="font-size: 2.5rem;"><?php $this->author->screenName(); ?></h1>
            <?php $tongji = Typecho_Widget::widget('Widget_Stat'); ?>
            <div class="touxiang-tongji">
                <div>
                    <span style="font-size: 1.2rem;"><?php echo number_format($tongji->publishedPostsNum); ?></span>
                    <span style="font-size: 1.2rem;">文章</span>
                </div>
                <div>
                    <span style="font-size: 1.2rem;"><?php echo number_format($tongji->publishedCommentsNum); ?></span>
                    <span style="font-size: 1.2rem;">评论</span>
                </div>
            </div>
        </div>
    </div>

    <div class="chouti-neibu-fangkuang">
        <ul class="fen-lei-lie-biao">
            <?php $this->widget('Widget_Metas_Category_List')->to($choutiFenlei); ?>
            <?php while ($choutiFenlei->next()): ?>
            <li class="fen-lei-xiang">
                <a href="<?php $choutiFenlei->permalink(); ?>" title="<?php $choutiFenlei->name(); ?>">
                    <?php $choutiFenlei->name(); ?>
                </a>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>

    <div class="chouti-neibu-fangkuang">
        <ul class="fen-lei-lie-biao">
            <?php $this->widget('Widget_Contents_Page_List')->to($choutiYemian); ?>
            <?php while ($choutiYemian->next()): ?>
            <li class="fen-lei-xiang">
                <a href="<?php $choutiYemian->permalink(); ?>" title="<?php $choutiYemian->title(); ?>">
                    <?php $choutiYemian->title(); ?>
                </a>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>

</aside>