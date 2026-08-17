<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$stat = Typecho_Widget::widget('Widget_Stat'); 
?>
<div class="cebianlan-rongqi">
    <div class="cebianlan-touxiang">
        <div class="touxiang-quyu">
            <img src="https://pic1.zhimg.com/v2-ed99ef114846496b779b9a5a59ba8e28" alt="头像" class="touxiang-tu"> <!-- 头像图片 -->
        </div>
        <div class="geren-jianjie">
            <h1 class="zuozhe-mingcheng"><?php $this->author->screenName(); ?></h1>
            <?php $this->widget('Widget_Stat')->to($tongji); ?>
            <div class="touxiang-tongji">
                <div class="">
                    <span class="tongji-shuzi"><?php echo number_format($stat->publishedPostsNum); ?></span>
                    <span class="tongji-wenzi">文章</span>
                </div>
                <div class="tongji-xiangmu">
                    <span class="tongji-shuzi"><?php echo number_format($stat->publishedCommentsNum); ?></span>
                    <span class="tongji-wenzi">评论</span>
                </div>
            </div>
        </div>
    </div>

    <div class="cebianlan-sousuo">
        <form method="post" action="<?php $this->options->searchUrl(); ?>" role="search" class="cebianlan-sousuo-biaodan">
            <input type="text" name="s" class="cebianlan-sousuo-shurukuang" placeholder="搜索文章..." required />
            <button type="submit" class="cebianlan-sousuo-anniu" aria-label="搜索">
                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>
        </form>
    </div>

    <!-- 备用
    <div class="">
        <h4>备用模块</h4>
    </div> -->

</div>