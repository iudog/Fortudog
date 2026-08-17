document.addEventListener('DOMContentLoaded', function () {

    var DAZI_SUDU = 100; // 打字阶段每个字符的间隔（毫秒），建议 80–120
    var TINGLIU_SHIJIAN = 1800; // 完整显示后停留的时长（毫秒），建议 1500–2000
    var SHANCHU_SUDU = 50; // 删除阶段每个字符的间隔（毫秒），建议 40–60，略快于打字
    var CUOFENG_YANCHI = 500; // 第二行相对第一行的错峰启动延迟（毫秒）

    var riyeYusu = document.querySelector('.riye');
    var mengxiangYusu = document.querySelector('.mengxiang');

    if (!riyeYusu || !mengxiangYusu) {
        return;
    }

    var riyeWenben = riyeYusu.textContent.trim();
    var mengxiangWenben = mengxiangYusu.textContent.trim();

    function yuluDonghua(yuanSu, wenBen, yanChi) {
        var wenBenChangdu = wenBen.length;
        var dangQianChangdu = 0;
        var zhuangTai = 'daizi';
        var shangCiShijian = 0;
        var jishiLeiji = 0;
        var dongHuaZhengzaiYunxing = false;
        var yiJingZaiCiDaZi = false;

        yuanSu.textContent = '';

        setTimeout(function () {
            dongHuaZhengzaiYunxing = true;
            shangCiShijian = performance.now();
            window.requestAnimationFrame(yiZhenXunHuan);
        }, yanChi);

        function yiZhenXunHuan(shiJianChuo) {
            if (!dongHuaZhengzaiYunxing) {
                return;
            }

            var shiJianChai = shiJianChuo - shangCiShijian;
            shangCiShijian = shiJianChuo;
            jishiLeiji += shiJianChai;

            if (zhuangTai === 'daizi') {
                while (jishiLeiji >= DAZI_SUDU && dangQianChangdu < wenBenChangdu) {
                    jishiLeiji -= DAZI_SUDU;
                    dangQianChangdu++;
                    yuanSu.textContent = wenBen.slice(0, dangQianChangdu);
                }
                if (dangQianChangdu >= wenBenChangdu) {
                    if (yiJingZaiCiDaZi) {
                        dongHuaZhengzaiYunxing = false;
                        return;
                    }
                    zhuangTai = 'tingliu';
                    jishiLeiji = 0;
                }
            } else if (zhuangTai === 'tingliu') {
                if (jishiLeiji >= TINGLIU_SHIJIAN) {
                    zhuangTai = 'shanchu';
                    jishiLeiji = 0;
                }
            } else if (zhuangTai === 'shanchu') {
                while (jishiLeiji >= SHANCHU_SUDU && dangQianChangdu > 0) {
                    jishiLeiji -= SHANCHU_SUDU;
                    dangQianChangdu--;
                    yuanSu.textContent = wenBen.slice(0, dangQianChangdu);
                }
                if (dangQianChangdu <= 0) {
                    yiJingZaiCiDaZi = true;
                    zhuangTai = 'daizi';
                    jishiLeiji = 0;
                }
            }

            window.requestAnimationFrame(yiZhenXunHuan);
        }
    }

    yuluDonghua(riyeYusu, riyeWenben, 0);
    yuluDonghua(mengxiangYusu, mengxiangWenben, CUOFENG_YANCHI);
});