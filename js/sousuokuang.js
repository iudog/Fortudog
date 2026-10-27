document.addEventListener('DOMContentLoaded', function () {
    var sousuoAnNiu = document.getElementById('id-sousuo-anniu');
    var sousuoTiaoRongqi = document.getElementById('id-daohang-sousuo');
    var sousuoShuRuKuang = sousuoTiaoRongqi ? sousuoTiaoRongqi.querySelector('.daohang-sousuo-shu-ru') : null;

    // 安全兜底：如果页面没有按钮或搜索条容器，就直接退出，不绑定任何东西
    if (!sousuoAnNiu || !sousuoTiaoRongqi) {
        return;
    }

    // 判断搜索条当前是否已打开：靠 yi-da-kai 类是否存在
    function yiDaKai() {
        return sousuoTiaoRongqi.classList.contains('yi-da-kai');
    }

    // 打开搜索条：加类 + 聚焦输入框
    function daKai() {
        sousuoTiaoRongqi.classList.add('yi-da-kai');
        if (sousuoShuRuKuang) {
            setTimeout(function () {
                sousuoShuRuKuang.focus();
            }, 200);
        }
    }

    // 关闭搜索条：移除 yi-da-kai，CSS 会让它滑回右侧外面
    function guanBi() {
        sousuoTiaoRongqi.classList.remove('yi-da-kai');
    }

    // 切换开合状态：打开就关，关闭就开
    function qieHuan() {
        yiDaKai() ? guanBi() : daKai();
    }

    // 判断一次点击是否发生在“搜索按钮或搜索条外部：外部就关闭，内部就不处理
    function shiFouDianJiWaiBu(shiJian) {
        var mubiao = shiJian.target;
        return !sousuoAnNiu.contains(mubiao) && !sousuoTiaoRongqi.contains(mubiao);
    }

    // 绑定事件1：点击搜索图标按钮切换开合，并阻止冒泡避免马上被外部点击关闭
    sousuoAnNiu.addEventListener('click', function (e) {
        e.stopPropagation();
        qieHuan();
    });

    // 绑定事件2：点击页面任意位置，若在搜索条外部且当前打开则关闭
    document.addEventListener('click', function (e) {
        yiDaKai() && shiFouDianJiWaiBu(e) && guanBi();
    });

    // 绑定事件3：按下 Esc 键关闭搜索条
    document.addEventListener('keydown', function (e) {
        var jian = e.key;
        if ((jian === 'Escape' || jian === 'Esc' || jian === 27) && yiDaKai()) {
            guanBi();
        }
    });

    // 绑定事件4：窗口尺寸变化时，如果切到 PC 宽度（>800px）自动关闭移动端搜索条
    window.addEventListener('resize', function () {
        var kuan = window.innerWidth || document.documentElement.clientWidth;
        kuan > 800 && yiDaKai() && guanBi();
    });
});