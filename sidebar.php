<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$stat = Typecho_Widget::widget('Widget_Stat'); 
?>
<div class="cebianlan-rongqi">
    <div class="cebianlan-touxiang">
        <div class="touxiang-quyu">
            <a href="<?php $this->options->siteUrl(); ?>">
                <img src="https://pic1.zhimg.com/v2-ed99ef114846496b779b9a5a59ba8e28" alt="头像" class="touxiang-tu"> <!-- 头像图片 -->
            </a>
        </div>
        <div class="geren-jianjie">
            <h1 class="zuozhe-mingcheng"><?php $this->author->screenName(); ?></h1>
            <?php $this->widget('Widget_Stat')->to($tongji); ?>
            <div class="touxiang-tongji">
                <div class="">
                    <span class="tongji-shuzi"><?php echo number_format($stat->publishedPostsNum); ?></span>
                    <span class="tongji-wenzi">文章</span>
                </div>
                <div class="">
                    <span class="tongji-shuzi"><?php echo number_format($stat->publishedCommentsNum); ?></span>
                    <span class="tongji-wenzi">评论</span>
                </div>
            </div>
        </div>
    </div>

    <!-- 备用模块：电脑端侧边栏以后想加卡片（标签云、公告、热评文章等）都写在这里，
         这样 PC 端就只有头像 + 你后面自定义的备用模块，手机端抽屉完全独立渲染。 -->
    <!-- 备用
    <div class="beiyong-mokuai">
        <h4 class="mo-kuai-biao-ti">备用模块</h4>
        <p>占位内容，后续自己往这里追加即可</p>
    </div>
    -->

</div>