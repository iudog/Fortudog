document.addEventListener('DOMContentLoaded', function() {
    function hashStr(str) {
        var hash = 0;
        for (var i = 0; i < str.length; i++) {
            hash = ((hash << 5) - hash + str.charCodeAt(i)) | 0;
        }
        return Math.abs(hash);
    }

    document.querySelectorAll('img.avatar').forEach(function(img) {
        var name = img.getAttribute('alt') || img.getAttribute('title') || '';
        name = name.trim();

        if (!name) return;

        var firstChar = [...name][0];
        var colors = ['#ff190069','#b300ff69','#ff660069','#0099ff69','#00ff6a69','#00ffcc69','#ff190069','#0080ff69'];

        var color = colors[hashStr(name) % colors.length];

        var span = document.createElement('span');
        span.textContent = firstChar;
        span.style.cssText = 'display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:50%;background:' + color + ';color:#fff;font-size:16px;font-weight:bold;line-height:1;vertical-align:middle;text-shadow:0 1px 2px rgba(0,0,0,0.2);';

        img.parentNode.replaceChild(span, img);
    });
});