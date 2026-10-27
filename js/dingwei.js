if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
}

document.addEventListener('DOMContentLoaded', function () {
    const shifouShouciJiazai = sessionStorage.getItem('yifangwen') === null;
    sessionStorage.setItem('yifangwen', '1');

    function dingweiIndex() {
        const biaoti = document.querySelector('.index-biaoti');
        if (!biaoti) return;
        const top = biaoti.getBoundingClientRect().top + window.scrollY - 100;
        window.scrollTo(0, top);
    }

    if (shifouShouciJiazai) {
        window.scrollTo(0, 0);
        return;
    }

    dingweiIndex();
    window.addEventListener('load', dingweiIndex, { once: true });
});
