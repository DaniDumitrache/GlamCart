(function(n) {
    "use strict";
    n.fn.firstVisitPopup = function(s) {
        var r, u = function(o, t) {
                var i = new Date,
                    e = "expires=";
                i.setTime(i.getTime() + 864e5), e += i.toGMTString(), document.cookie = o + "=" + t + "; " + e + "; path=/"
            },
            a = function(o) {
                var t = document.cookie.split(";"),
                    i = 0,
                    e = "";
                for (i = 0; i < t.length; i++) {
                    for (e = t[i]; e.charAt(0) === " ";) e = e.substring(1, e.length);
                    if (e.indexOf(o + "=") === 0) return e.substring(o.length + 1, e.length)
                }
                return !1
            },
            c = function() {
                setTimeout(function() {
                    r.css({
                        opacity: "1",
                        visibility: "visible",
                        transition: ".5s"
                    }).fadeIn(500)
                }, 5e3)
            },
            p = function() {
                r.fadeOut(500), u("fvpp" + s.cookieName, "true")
            };
        r = n(".popup_wrapper"), a("fvpp" + s.cookieName) ? p() : c(), n(".popup_off").on("click", p)
    }
})(jQuery);
//# sourceMappingURL=/s/files/1/0016/9626/8348/t/8/assets/newsletter-js.js.map?v=94940036483672074171636534423