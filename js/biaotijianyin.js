document.addEventListener("DOMContentLoaded", function () {
    var daohanglan = document.querySelector('.daohanglan');
    var biaotiFangkuai = document.querySelector('.wenzhang-biaoti');

    var shangciGundong = 0;
    var daohanglanDonghuaZhong = false;
    var daohanglanYincang = false;

    var biaotiYuzhi = 0;
    if (biaotiFangkuai) {
        biaotiYuzhi = Math.max(biaotiFangkuai.offsetHeight * 1.2, 250);
    }

    var zhengzaiDonghua = false;

    function chuliDaohanglan(gundongJuli) {
        if (!daohanglan) return;

        if (gundongJuli > shangciGundong) {
            if (!daohanglanYincang && !daohanglanDonghuaZhong) {
                daohanglan.style.transform = 'translateY(-120%)';
                daohanglan.style.opacity = '0';
                daohanglanYincang = true;
            }
        } else {
            if (daohanglanYincang && !daohanglanDonghuaZhong) {
                daohanglan.style.transform = 'translateY(0) scale(1)';
                daohanglan.style.opacity = '1';
                daohanglanYincang = false;
            }
        }
        shangciGundong = gundongJuli;
    }

    function chuliBiaotiFangkuai(gundongJuli) {
        if (!biaotiFangkuai) return;
        var jindu = Math.min(Math.max(gundongJuli / biaotiYuzhi, 0), 1);
        var suofang = 1 - jindu * 0.4 * Math.pow(jindu, 0.7);
        var toumingdu = 1 - jindu;
        var weiyi = -(jindu * biaotiYuzhi * 0.5);
        biaotiFangkuai.style.transform = 'translateY(' + weiyi + 'px) scale(' + suofang + ')';
        biaotiFangkuai.style.opacity = toumingdu;
    }

    function gengxinSuoyou() {
        var gundongJuli = window.pageYOffset || document.documentElement.scrollTop;
        chuliDaohanglan(gundongJuli);
        chuliBiaotiFangkuai(gundongJuli);
        zhengzaiDonghua = false;
    }

    gengxinSuoyou();

    function chuliGundong() {
        if (!zhengzaiDonghua) {
            zhengzaiDonghua = true;
            window.requestAnimationFrame(gengxinSuoyou);
        }
    }
    window.addEventListener('scroll', chuliGundong, { passive: true });

    var fangdouDingshiqi = null;
    window.addEventListener('resize', function () {
        if (fangdouDingshiqi) clearTimeout(fangdouDingshiqi);
        fangdouDingshiqi = setTimeout(function () {
            if (biaotiFangkuai) {
                biaotiYuzhi = Math.max(biaotiFangkuai.offsetHeight * 1.2, 250);
            }
            gengxinSuoyou();
        }, 150);
    });
});