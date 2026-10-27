document.addEventListener('DOMContentLoaded', function () {
    var hanbaoCaidanAnNiu = document.getElementById('id-hanbao-caidan-anniu');
    var zheZhaoCeng = document.getElementById('id-zhe-zhao-ceng');
    var choutiRongqi = document.getElementById('id-cebianlan-chouti');
    var bodyYuanbenOverflow = '';
    var yiJingSuoDing = false;

    // 安全兜底：三个关键元素缺一不可，否则直接退出不绑定任何事件，避免控制台报错
    if (!hanbaoCaidanAnNiu || !zheZhaoCeng || !choutiRongqi) {
        return;
    }

    // 判断当前抽屉是否打开：靠抽屉是否有yi-da-kai类判断
    function yiDaKai() {
        return choutiRongqi.classList.contains('yi-da-kai');
    }

    // 锁定 body 滚动：打开抽屉时调用，防止手机端滑动抽屉时后面的页面跟着一起滚（滚动穿透）
    function suoDingGunDong() {
        if (!yiJingSuoDing) {
            bodyYuanbenOverflow = document.body.style.overflow || '';
            document.body.style.overflow = 'hidden';
            yiJingSuoDing = true;
        }
    }

    // 恢复 body 滚动：关闭抽屉时调用，还原到打开前的 overflow 值
    function huiFuGunDong() {
        if (yiJingSuoDing) {
            document.body.style.overflow = bodyYuanbenOverflow;
            yiJingSuoDing = false;
        }
    }

    // 打开抽屉：给遮罩和抽屉都加 yi-da-kai，CSS 自动做滑入和遮罩淡入
    function daKai() {
        zheZhaoCeng.classList.add('yi-da-kai');
        choutiRongqi.classList.add('yi-da-kai');
        suoDingGunDong();
    }

    // 关闭抽屉：移除 yi-da-kai，CSS 自动做滑出和遮罩淡出
    function guanBi() {
        zheZhaoCeng.classList.remove('yi-da-kai');
        choutiRongqi.classList.remove('yi-da-kai');
        huiFuGunDong();
    }

    // 绑定事件1：点击汉堡按钮直接打开（因为你删掉了关闭按钮，这里按钮只负责“打开”）
    hanbaoCaidanAnNiu.addEventListener('click', function (e) {
        e.stopPropagation();
        daKai();
    });

    // 绑定事件2：点击遮罩层关闭（代替被你删掉的关闭按钮）
    zheZhaoCeng.addEventListener('click', guanBi);

    // 绑定事件3：点击抽屉容器“空白背景”也能关闭（但点击分类/头像等内部元素时不关闭）
    choutiRongqi.addEventListener('click', function (e) {
        if (e.target === choutiRongqi) {
            guanBi();
        }
    });

    // 绑定事件4：按 Esc 键关闭
    document.addEventListener('keydown', function (e) {
        var jian = e.key;
        if ((jian === 'Escape' || jian === 'Esc' || jian === 27) && yiDaKai()) {
            guanBi();
        }
    });

    // 绑定事件5：窗口宽度变化时，切到 PC 宽度（>800px）自动关闭移动端抽屉
    window.addEventListener('resize', function () {
        var kuan = window.innerWidth || document.documentElement.clientWidth;
        if (kuan > 800 && yiDaKai()) {
            guanBi();
        }
    });
});