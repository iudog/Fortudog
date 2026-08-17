document.addEventListener("DOMContentLoaded", function () {
    const isInitialLoad = sessionStorage.getItem('visited') === null;
    sessionStorage.setItem('visited', 'true');

    function scrollToContent() {
        const content = document.getElementById('id-neirong-quyu');
        if (content) {
            const y = content.getBoundingClientRect().top + window.scrollY - 100;
            window.scrollTo(0, y);
        }
    }

    if (!isInitialLoad) {
        scrollToContent();
    }

    document.addEventListener('click', function(e) {
        const link = e.target.closest('a');
        if (link && (link.href.includes('/page/') || link.href.includes('/category/'))) {
            setTimeout(scrollToContent, 100);
        }
    });

    window.addEventListener('hashchange', scrollToContent);
});