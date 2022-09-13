(function(t) {
    t.fn.prepareTransition = function() {
        return this.each(function() {
            var i = t(this);
            i.one("TransitionEnd webkitTransitionEnd transitionend oTransitionEnd", function() {
                i.removeClass("is-transitioning")
            });
            var e = ["transition-duration", "-moz-transition-duration", "-webkit-transition-duration", "-o-transition-duration"],
                r = 0;
            t.each(e, function(a, n) {
                r = parseFloat(i.css(n)) || r
            }), r != 0 && (i.addClass("is-transitioning"), i[0].offsetWidth)
        })
    }
})(jQuery);

function replaceUrlParam(t, i, e) {
    var r = new RegExp("(" + i + "=).*?(&|$)"),
        a = t;
    return a = t.search(r) >= 0 ? t.replace(r, "$1" + e + "$2") : a + (a.indexOf("?") > 0 ? "&" : "?") + i + "=" + e
}
typeof Shopify == "undefined" && (Shopify = {}), Shopify.formatMoney || (Shopify.formatMoney = function(t, i) {
    var e = "",
        r = /\{\{\s*(\w+)\s*\}\}/,
        a = i || this.money_format;
    typeof t == "string" && (t = t.replace(".", ""));

    function n(s, c) {
        return typeof s == "undefined" ? c : s
    }

    function u(s, c, d, m) {
        if (c = n(c, 2), d = n(d, ","), m = n(m, "."), isNaN(s) || s == null) return 0;
        s = (s / 100).toFixed(c);
        var h = s.split("."),
            o = h[0].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1" + d),
            f = h[1] ? m + h[1] : "";
        return o + f
    }
    switch (a.match(r)[1]) {
        case "amount":
            e = u(t, 2);
            break;
        case "amount_no_decimals":
            e = u(t, 0);
            break;
        case "amount_with_comma_separator":
            e = u(t, 2, ".", ",");
            break;
        case "amount_no_decimals_with_comma_separator":
            e = u(t, 0, ".", ",");
            break
    }
    return a.replace(r, e)
}), window.timber = window.timber || {}, timber.cacheSelectors = function() {
    timber.cache = {
        $html: $("html"),
        $body: $(document.body),
        $navigation: $("#AccessibleNav"),
        $mobileSubNavToggle: $(".mobile-nav__toggle"),
        $changeView: $(".change-view"),
        $productImage: $("#ProductPhotoImg"),
        $thumbImages: $("#ProductThumbs").find("a.product-single__thumbnail"),
        $recoverPasswordLink: $("#RecoverPassword"),
        $hideRecoverPasswordLink: $("#HideRecoverPasswordLink"),
        $recoverPasswordForm: $("#RecoverPasswordForm"),
        $customerLoginForm: $("#CustomerLoginForm"),
        $passwordResetSuccess: $("#ResetSuccess")
    }
}, timber.init = function() {
    FastClick.attach(document.body), timber.cacheSelectors(), timber.accessibleNav(), timber.mobileNavToggle(), timber.productImageSwitch(), timber.responsiveVideos(), timber.collectionViews(), timber.loginForms()
}, timber.accessibleNav = function() {
    var t = timber.cache.$navigation,
        i = t.find("a"),
        e = t.children("li").find("a"),
        r = t.find(".site-nav--has-dropdown"),
        a = t.find(".site-nav__dropdown").find("a"),
        n = "nav-hover",
        u = "nav-focus";
    r.on("mouseenter touchstart", function(o) {
        var f = $(this);
        f.hasClass(n) || o.preventDefault(), c(f)
    }), r.on("mouseleave", function() {
        d($(this))
    }), a.on("touchstart", function(o) {
        o.stopImmediatePropagation()
    }), i.focus(function() {
        s($(this))
    }), i.blur(function() {
        h(e)
    });

    function s(o) {
        var f = o.next("ul"),
            l = !!f.hasClass("sub-nav"),
            b = $(".site-nav__dropdown").has(o).length,
            p = null;
        b ? (p = o.closest(".site-nav--has-dropdown").find("a"), m(p)) : (h(e), m(o))
    }

    function c(o) {
        o.addClass(n), setTimeout(function() {
            timber.cache.$body.on("touchstart", function() {
                d(o)
            })
        }, 250)
    }

    function d(o) {
        o.removeClass(n), timber.cache.$body.off("touchstart")
    }

    function m(o) {
        o.addClass(u)
    }

    function h(o) {
        o.removeClass(u)
    }
}, timber.mobileNavToggle = function() {
    timber.cache.$mobileSubNavToggle.on("click", function() {
        $(this).parent().toggleClass("mobile-nav--expanded")
    })
}, timber.getHash = function() {
    return window.location.hash
}, timber.productPage = function(t) {
    var i = t.money_format,
        e = t.variant,
        r = t.selector,
        a = $("#ProductPhotoImg"),
        n = $("#AddToCart"),
        u = $("#ProductPrice"),
        s = $("#ComparePrice"),
        c = $(".quantity-selector, label + .js-qty"),
        d = $("#AddToCartText"),
        m = $(".unit_price_box"),
        h = $("#product__unit_price"),
        o = $("#product__unit_price_value");
    if (e) {
        if (e.featured_image) {
            var f = e.featured_image,
                l = a[0];
            Shopify.Image.switchImage(f, l, timber.switchImage)
        }
        e.available ? (n.removeClass("disabled").prop("disabled", !1), d.html("Add to cart"), c.show()) : (n.addClass("disabled").prop("disabled", !0), d.html("Soldout"), c.hide()), "unit_price" in e ? (m.removeClass("hidden"), h.html(Shopify.formatMoney(e.unit_price, i)), o.html("".concat(e.unit_price_measurement.reference_value, " ").concat(e.unit_price_measurement.reference_unit))) : m.addClass("hidden"), u.html(Shopify.formatMoney(e.price, i)), e.compare_at_price > e.price ? s.html(" " + Shopify.formatMoney(e.compare_at_price, i)).show() : s.hide()
    } else n.addClass("disabled").prop("disabled", !0), d.html("Unavailable"), c.hide()
}, timber.productImageSwitch = function() {
    timber.cache.$thumbImages.length && timber.cache.$thumbImages.on("click", function(t) {
        t.preventDefault();
        var i = $(this).attr("href");
        timber.switchImage(i, null, timber.cache.$productImage)
    })
}, timber.switchImage = function(t, i, e) {
    var r = $(e);
    r.attr("src", t)
}, timber.responsiveVideos = function() {
    var t = $('iframe[src*="youtube.com/embed"], iframe[src*="player.vimeo"]'),
        i = t.add("iframe#admin_bar_iframe");
    t.each(function() {
        $(this).wrap('<div class="video-wrapper"></div>')
    }), i.each(function() {
        this.src = this.src
    })
}, timber.collectionViews = function() {
    timber.cache.$changeView.length && timber.cache.$changeView.on("click", function() {
        var t = $(this).data("view"),
            i = document.URL,
            e = i.indexOf("?") > -1;
        e ? window.location = replaceUrlParam(i, "view", t) : window.location = i + "?view=" + t
    })
}, timber.loginForms = function() {
    function t() {
        timber.cache.$recoverPasswordForm.show(), timber.cache.$customerLoginForm.hide()
    }

    function i() {
        timber.cache.$recoverPasswordForm.hide(), timber.cache.$customerLoginForm.show()
    }
    timber.cache.$recoverPasswordLink.on("click", function(e) {
        e.preventDefault(), t()
    }), timber.cache.$hideRecoverPasswordLink.on("click", function(e) {
        e.preventDefault(), i()
    }), timber.getHash() == "#recover" && t()
}, timber.resetPasswordSuccess = function() {
    timber.cache.$passwordResetSuccess.show()
}, timber.Drawers = function() {
    var t = function(i, e, r) {
        var a = {
            close: ".js-drawer-close",
            open: ".js-drawer-open-" + e,
            openClass: "js-drawer-open",
            dirOpenClass: "js-drawer-open-" + e
        };
        if (this.$nodes = {
                parent: $("body, html"),
                page: $("#PageContainer"),
                moved: $(".is-moved-by-drawer")
            }, this.config = $.extend(a, r), this.position = e, this.$drawer = $("#" + i), !this.$drawer.length) return !1;
        this.drawerIsOpen = !1, this.init()
    };
    return t.prototype.init = function() {
        $(this.config.open).on("click", $.proxy(this.open, this)), this.$drawer.find(this.config.close).on("click", $.proxy(this.close, this))
    }, t.prototype.open = function(i) {
        var e = !1;
        if (i ? i.preventDefault() : e = !0, i && i.stopPropagation && (i.stopPropagation(), this.$activeSource = $(i.currentTarget)), this.drawerIsOpen && !e) return this.close();
        timber.cache.$body.trigger("beforeDrawerOpen.timber", this), this.$nodes.moved.addClass("is-transitioning"), this.$drawer.prepareTransition(), this.$nodes.parent.addClass(this.config.openClass + " " + this.config.dirOpenClass), this.drawerIsOpen = !0, this.trapFocus(this.$drawer, "drawer_focus"), this.config.onDrawerOpen && typeof this.config.onDrawerOpen == "function" && (e || this.config.onDrawerOpen()), this.$activeSource && this.$activeSource.attr("aria-expanded") && this.$activeSource.attr("aria-expanded", "true"), this.$nodes.page.on("touchmove.drawer", function() {
            return !1
        }), this.$nodes.page.on("click.drawer", $.proxy(function() {
            return this.close(), !1
        }, this)), timber.cache.$body.trigger("afterDrawerOpen.timber", this)
    }, t.prototype.close = function() {
        !this.drawerIsOpen || (timber.cache.$body.trigger("beforeDrawerClose.timber", this), $(document.activeElement).trigger("blur"), this.$nodes.moved.prepareTransition({
            disableExisting: !0
        }), this.$drawer.prepareTransition({
            disableExisting: !0
        }), this.$nodes.parent.removeClass(this.config.dirOpenClass + " " + this.config.openClass), this.drawerIsOpen = !1, this.removeTrapFocus(this.$drawer, "drawer_focus"), this.$nodes.page.off(".drawer"), timber.cache.$body.trigger("afterDrawerClose.timber", this))
    }, t.prototype.trapFocus = function(i, e) {
        var r = e ? "focusin." + e : "focusin";
        i.attr("tabindex", "-1"), i.focus(), $(document).on(r, function(a) {
            i[0] !== a.target && !i.has(a.target).length && i.focus()
        })
    }, t.prototype.removeTrapFocus = function(i, e) {
        var r = e ? "focusin." + e : "focusin";
        i.removeAttr("tabindex"), $(document).off(r)
    }, t
}(), $(timber.init);
//# sourceMappingURL=/s/files/1/0016/9626/8348/t/8/assets/timber.js.map?v=147794995694520970281636534455