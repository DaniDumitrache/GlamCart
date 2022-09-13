(function() {
    for (var l, a = function() {}, e = ["assert", "clear", "count", "debug", "dir", "dirxml", "error", "exception", "group", "groupCollapsed", "groupEnd", "info", "log", "markTimeline", "profile", "profileEnd", "table", "time", "timeEnd", "timeline", "timelineEnd", "timeStamp", "trace", "warn"], t = e.length, n = window.console = window.console || {}; t--;) n[l = e[t]] || (n[l] = a)
})();
/*!
 * The Final Countdown for jQuery v2.1.0 (http://hilios.github.io/jQuery.countdown/)
 * Copyright (c) 2015 Edson Hilios
 */
(function(l) {
    "use strict";
    typeof define == "function" && define.amd ? define(["jquery"], l) : l(jQuery)
})(function(l) {
    "use strict";

    function a(c) {
        if (c instanceof Date) return c;
        if (String(c).match(s)) return String(c).match(/^[0-9]*$/) && (c = Number(c)), String(c).match(/\-/) && (c = String(c).replace(/\-/g, "/")), new Date(c);
        throw new Error("Couldn't cast `" + c + "` to a date object.")
    }

    function e(c) {
        var r = c.toString().replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
        return new RegExp(r)
    }

    function t(c) {
        return function(r) {
            var u = r.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi);
            if (u)
                for (var h = 0, f = u.length; f > h; ++h) {
                    var v = u[h].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/),
                        k = e(v[0]),
                        y = v[1] || "",
                        w = v[3] || "",
                        g = null;
                    v = v[2], p.hasOwnProperty(v) && (g = p[v], g = Number(c[g])), g !== null && (y === "!" && (g = n(w, g)), y === "" && 10 > g && (g = "0" + g.toString()), r = r.replace(k, g.toString()))
                }
            return r = r.replace(/%%/, "%")
        }
    }

    function n(c, r) {
        var u = "s",
            h = "";
        return c && (c = c.replace(/(:|;|\s)/gi, "").split(/\,/), c.length === 1 ? u = c[0] : (h = c[0], u = c[1])), Math.abs(r) === 1 ? h : u
    }
    var i = [],
        s = [],
        o = {
            precision: 100,
            elapse: !1
        };
    s.push(/^[0-9]*$/.source), s.push(/([0-9]{1,2}\/){2}[0-9]{4}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), s.push(/[0-9]{4}([\/\-][0-9]{1,2}){2}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), s = new RegExp(s.join("|"));
    var p = {
            Y: "years",
            m: "months",
            n: "daysToMonth",
            w: "weeks",
            d: "daysToWeek",
            D: "totalDays",
            H: "hours",
            M: "minutes",
            S: "seconds"
        },
        d = function(c, r, u) {
            this.el = c, this.$el = l(c), this.interval = null, this.offset = {}, this.options = l.extend({}, o), this.instanceNumber = i.length, i.push(this), this.$el.data("countdown-instance", this.instanceNumber), u && (typeof u == "function" ? (this.$el.on("update.countdown", u), this.$el.on("stoped.countdown", u), this.$el.on("finish.countdown", u)) : this.options = l.extend({}, o, u)), this.setFinalDate(r), this.start()
        };
    l.extend(d.prototype, {
        start: function() {
            this.interval !== null && clearInterval(this.interval);
            var c = this;
            this.update(), this.interval = setInterval(function() {
                c.update.call(c)
            }, this.options.precision)
        },
        stop: function() {
            clearInterval(this.interval), this.interval = null, this.dispatchEvent("stoped")
        },
        toggle: function() {
            this.interval ? this.stop() : this.start()
        },
        pause: function() {
            this.stop()
        },
        resume: function() {
            this.start()
        },
        remove: function() {
            this.stop.call(this), i[this.instanceNumber] = null, delete this.$el.data().countdownInstance
        },
        setFinalDate: function(c) {
            this.finalDate = a(c)
        },
        update: function() {
            if (this.$el.closest("html").length === 0) return void this.remove();
            var c, r = l._data(this.el, "events") !== void 0,
                u = new Date;
            c = this.finalDate.getTime() - u.getTime(), c = Math.ceil(c / 1e3), c = !this.options.elapse && 0 > c ? 0 : Math.abs(c), this.totalSecsLeft !== c && r && (this.totalSecsLeft = c, this.elapsed = u >= this.finalDate, this.offset = {
                seconds: this.totalSecsLeft % 60,
                minutes: Math.floor(this.totalSecsLeft / 60) % 60,
                hours: Math.floor(this.totalSecsLeft / 60 / 60) % 24,
                days: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
                daysToWeek: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
                daysToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 % 30.4368),
                totalDays: Math.floor(this.totalSecsLeft / 60 / 60 / 24),
                weeks: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7),
                months: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 30.4368),
                years: Math.abs(this.finalDate.getFullYear() - u.getFullYear())
            }, this.options.elapse || this.totalSecsLeft !== 0 ? this.dispatchEvent("update") : (this.stop(), this.dispatchEvent("finish")))
        },
        dispatchEvent: function(c) {
            var r = l.Event(c + ".countdown");
            r.finalDate = this.finalDate, r.elapsed = this.elapsed, r.offset = l.extend({}, this.offset), r.strftime = t(this.offset), this.$el.trigger(r)
        }
    }), l.fn.countdown = function() {
        var c = Array.prototype.slice.call(arguments, 0);
        return this.each(function() {
            var r = l(this).data("countdown-instance");
            if (r !== void 0) {
                var u = i[r],
                    h = c[0];
                d.prototype.hasOwnProperty(h) ? u[h].apply(u, c.slice(1)) : String(h).match(/^[$A-Z_][0-9A-Z_$]*$/i) === null ? (u.setFinalDate.call(u, h), u.start()) : l.error("Method %s does not exist on jQuery.countdown".replace(/\%s/gi, h))
            } else new d(this, c[0], c[1])
        })
    }
}),
function(l) {
    "use strict";
    typeof define == "function" && define.amd ? define(["jquery"], l) : typeof exports != "undefined" ? module.exports = l(require("jquery")) : l(jQuery)
}(function(l) {
    "use strict";
    var a = window.Slick || {};
    (a = function() {
        var e = 0;
        return function(t, n) {
            var i, s = this;
            s.defaults = {
                accessibility: !0,
                adaptiveHeight: !1,
                appendArrows: l(t),
                appendDots: l(t),
                arrows: !0,
                asNavFor: null,
                prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
                nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
                autoplay: !1,
                autoplaySpeed: 3e3,
                centerMode: !1,
                centerPadding: "50px",
                cssEase: "ease",
                customPaging: function(o, p) {
                    return l('<button type="button" />').text(p + 1)
                },
                dots: !1,
                dotsClass: "slick-dots",
                draggable: !0,
                easing: "linear",
                edgeFriction: .35,
                fade: !1,
                focusOnSelect: !1,
                focusOnChange: !1,
                infinite: !0,
                initialSlide: 0,
                lazyLoad: "ondemand",
                mobileFirst: !1,
                pauseOnHover: !0,
                pauseOnFocus: !0,
                pauseOnDotsHover: !1,
                respondTo: "window",
                responsive: null,
                rows: 1,
                rtl: !1,
                slide: "",
                slidesPerRow: 1,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                swipe: !0,
                swipeToSlide: !1,
                touchMove: !0,
                touchThreshold: 5,
                useCSS: !0,
                useTransform: !0,
                variableWidth: !1,
                vertical: !1,
                verticalSwiping: !1,
                waitForAnimate: !0,
                zIndex: 1e3
            }, s.initials = {
                animating: !1,
                dragging: !1,
                autoPlayTimer: null,
                currentDirection: 0,
                currentLeft: null,
                currentSlide: 0,
                direction: 1,
                $dots: null,
                listWidth: null,
                listHeight: null,
                loadIndex: 0,
                $nextArrow: null,
                $prevArrow: null,
                scrolling: !1,
                slideCount: null,
                slideWidth: null,
                $slideTrack: null,
                $slides: null,
                sliding: !1,
                slideOffset: 0,
                swipeLeft: null,
                swiping: !1,
                $list: null,
                touchObject: {},
                transformsEnabled: !1,
                unslicked: !1
            }, l.extend(s, s.initials), s.activeBreakpoint = null, s.animType = null, s.animProp = null, s.breakpoints = [], s.breakpointSettings = [], s.cssTransitions = !1, s.focussed = !1, s.interrupted = !1, s.hidden = "hidden", s.paused = !0, s.positionProp = null, s.respondTo = null, s.rowCount = 1, s.shouldClick = !0, s.$slider = l(t), s.$slidesCache = null, s.transformType = null, s.transitionType = null, s.visibilityChange = "visibilitychange", s.windowWidth = 0, s.windowTimer = null, i = l(t).data("slick") || {}, s.options = l.extend({}, s.defaults, n, i), s.currentSlide = s.options.initialSlide, s.originalSettings = s.options, document.mozHidden !== void 0 ? (s.hidden = "mozHidden", s.visibilityChange = "mozvisibilitychange") : document.webkitHidden !== void 0 && (s.hidden = "webkitHidden", s.visibilityChange = "webkitvisibilitychange"), s.autoPlay = l.proxy(s.autoPlay, s), s.autoPlayClear = l.proxy(s.autoPlayClear, s), s.autoPlayIterator = l.proxy(s.autoPlayIterator, s), s.changeSlide = l.proxy(s.changeSlide, s), s.clickHandler = l.proxy(s.clickHandler, s), s.selectHandler = l.proxy(s.selectHandler, s), s.setPosition = l.proxy(s.setPosition, s), s.swipeHandler = l.proxy(s.swipeHandler, s), s.dragHandler = l.proxy(s.dragHandler, s), s.keyHandler = l.proxy(s.keyHandler, s), s.instanceUid = e++, s.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, s.registerBreakpoints(), s.init(!0)
        }
    }()).prototype.activateADA = function() {
        this.$slideTrack.find(".slick-active").attr({
            "aria-hidden": "false"
        }).find("a, input, button, select").attr({
            tabindex: "0"
        })
    }, a.prototype.addSlide = a.prototype.slickAdd = function(e, t, n) {
        var i = this;
        if (typeof t == "boolean") n = t, t = null;
        else if (t < 0 || t >= i.slideCount) return !1;
        i.unload(), typeof t == "number" ? t === 0 && i.$slides.length === 0 ? l(e).appendTo(i.$slideTrack) : n ? l(e).insertBefore(i.$slides.eq(t)) : l(e).insertAfter(i.$slides.eq(t)) : n === !0 ? l(e).prependTo(i.$slideTrack) : l(e).appendTo(i.$slideTrack), i.$slides = i.$slideTrack.children(this.options.slide), i.$slideTrack.children(this.options.slide).detach(), i.$slideTrack.append(i.$slides), i.$slides.each(function(s, o) {
            l(o).attr("data-slick-index", s)
        }), i.$slidesCache = i.$slides, i.reinit()
    }, a.prototype.animateHeight = function() {
        var e = this;
        if (e.options.slidesToShow === 1 && e.options.adaptiveHeight === !0 && e.options.vertical === !1) {
            var t = e.$slides.eq(e.currentSlide).outerHeight(!0);
            e.$list.animate({
                height: t
            }, e.options.speed)
        }
    }, a.prototype.animateSlide = function(e, t) {
        var n = {},
            i = this;
        i.animateHeight(), i.options.rtl === !0 && i.options.vertical === !1 && (e = -e), i.transformsEnabled === !1 ? i.options.vertical === !1 ? i.$slideTrack.animate({
            left: e
        }, i.options.speed, i.options.easing, t) : i.$slideTrack.animate({
            top: e
        }, i.options.speed, i.options.easing, t) : i.cssTransitions === !1 ? (i.options.rtl === !0 && (i.currentLeft = -i.currentLeft), l({
            animStart: i.currentLeft
        }).animate({
            animStart: e
        }, {
            duration: i.options.speed,
            easing: i.options.easing,
            step: function(s) {
                s = Math.ceil(s), i.options.vertical === !1 ? (n[i.animType] = "translate(" + s + "px, 0px)", i.$slideTrack.css(n)) : (n[i.animType] = "translate(0px," + s + "px)", i.$slideTrack.css(n))
            },
            complete: function() {
                t && t.call()
            }
        })) : (i.applyTransition(), e = Math.ceil(e), i.options.vertical === !1 ? n[i.animType] = "translate3d(" + e + "px, 0px, 0px)" : n[i.animType] = "translate3d(0px," + e + "px, 0px)", i.$slideTrack.css(n), t && setTimeout(function() {
            i.disableTransition(), t.call()
        }, i.options.speed))
    }, a.prototype.getNavTarget = function() {
        var e = this,
            t = e.options.asNavFor;
        return t && t !== null && (t = l(t).not(e.$slider)), t
    }, a.prototype.asNavFor = function(e) {
        var t = this.getNavTarget();
        t !== null && typeof t == "object" && t.each(function() {
            var n = l(this).slick("getSlick");
            n.unslicked || n.slideHandler(e, !0)
        })
    }, a.prototype.applyTransition = function(e) {
        var t = this,
            n = {};
        t.options.fade === !1 ? n[t.transitionType] = t.transformType + " " + t.options.speed + "ms " + t.options.cssEase : n[t.transitionType] = "opacity " + t.options.speed + "ms " + t.options.cssEase, t.options.fade === !1 ? t.$slideTrack.css(n) : t.$slides.eq(e).css(n)
    }, a.prototype.autoPlay = function() {
        var e = this;
        e.autoPlayClear(), e.slideCount > e.options.slidesToShow && (e.autoPlayTimer = setInterval(e.autoPlayIterator, e.options.autoplaySpeed))
    }, a.prototype.autoPlayClear = function() {
        var e = this;
        e.autoPlayTimer && clearInterval(e.autoPlayTimer)
    }, a.prototype.autoPlayIterator = function() {
        var e = this,
            t = e.currentSlide + e.options.slidesToScroll;
        e.paused || e.interrupted || e.focussed || (e.options.infinite === !1 && (e.direction === 1 && e.currentSlide + 1 === e.slideCount - 1 ? e.direction = 0 : e.direction === 0 && (t = e.currentSlide - e.options.slidesToScroll, e.currentSlide - 1 == 0 && (e.direction = 1))), e.slideHandler(t))
    }, a.prototype.buildArrows = function() {
        var e = this;
        e.options.arrows === !0 && (e.$prevArrow = l(e.options.prevArrow).addClass("slick-arrow"), e.$nextArrow = l(e.options.nextArrow).addClass("slick-arrow"), e.slideCount > e.options.slidesToShow ? (e.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.prependTo(e.options.appendArrows), e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.appendTo(e.options.appendArrows), e.options.infinite !== !0 && e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : e.$prevArrow.add(e.$nextArrow).addClass("slick-hidden").attr({
            "aria-disabled": "true",
            tabindex: "-1"
        }))
    }, a.prototype.buildDots = function() {
        var e, t, n = this;
        if (n.options.dots === !0) {
            for (n.$slider.addClass("slick-dotted"), t = l("<ul />").addClass(n.options.dotsClass), e = 0; e <= n.getDotCount(); e += 1) t.append(l("<li />").append(n.options.customPaging.call(this, n, e)));
            n.$dots = t.appendTo(n.options.appendDots), n.$dots.find("li").first().addClass("slick-active")
        }
    }, a.prototype.buildOut = function() {
        var e = this;
        e.$slides = e.$slider.children(e.options.slide + ":not(.slick-cloned)").addClass("slick-slide"), e.slideCount = e.$slides.length, e.$slides.each(function(t, n) {
            l(n).attr("data-slick-index", t).data("originalStyling", l(n).attr("style") || "")
        }), e.$slider.addClass("slick-slider"), e.$slideTrack = e.slideCount === 0 ? l('<div class="slick-track"/>').appendTo(e.$slider) : e.$slides.wrapAll('<div class="slick-track"/>').parent(), e.$list = e.$slideTrack.wrap('<div class="slick-list"/>').parent(), e.$slideTrack.css("opacity", 0), e.options.centerMode !== !0 && e.options.swipeToSlide !== !0 || (e.options.slidesToScroll = 1), l("img[data-lazy]", e.$slider).not("[src]").addClass("slick-loading"), e.setupInfinite(), e.buildArrows(), e.buildDots(), e.updateDots(), e.setSlideClasses(typeof e.currentSlide == "number" ? e.currentSlide : 0), e.options.draggable === !0 && e.$list.addClass("draggable")
    }, a.prototype.buildRows = function() {
        var e, t, n, i, s, o, p, d = this;
        if (i = document.createDocumentFragment(), o = d.$slider.children(), d.options.rows > 1) {
            for (p = d.options.slidesPerRow * d.options.rows, s = Math.ceil(o.length / p), e = 0; e < s; e++) {
                var c = document.createElement("div");
                for (t = 0; t < d.options.rows; t++) {
                    var r = document.createElement("div");
                    for (n = 0; n < d.options.slidesPerRow; n++) {
                        var u = e * p + (t * d.options.slidesPerRow + n);
                        o.get(u) && r.appendChild(o.get(u))
                    }
                    c.appendChild(r)
                }
                i.appendChild(c)
            }
            d.$slider.empty().append(i), d.$slider.children().children().children().css({
                width: 100 / d.options.slidesPerRow + "%",
                display: "inline-block"
            })
        }
    }, a.prototype.checkResponsive = function(e, t) {
        var n, i, s, o = this,
            p = !1,
            d = o.$slider.width(),
            c = window.innerWidth || l(window).width();
        if (o.respondTo === "window" ? s = c : o.respondTo === "slider" ? s = d : o.respondTo === "min" && (s = Math.min(c, d)), o.options.responsive && o.options.responsive.length && o.options.responsive !== null) {
            i = null;
            for (n in o.breakpoints) o.breakpoints.hasOwnProperty(n) && (o.originalSettings.mobileFirst === !1 ? s < o.breakpoints[n] && (i = o.breakpoints[n]) : s > o.breakpoints[n] && (i = o.breakpoints[n]));
            i !== null ? o.activeBreakpoint !== null ? (i !== o.activeBreakpoint || t) && (o.activeBreakpoint = i, o.breakpointSettings[i] === "unslick" ? o.unslick(i) : (o.options = l.extend({}, o.originalSettings, o.breakpointSettings[i]), e === !0 && (o.currentSlide = o.options.initialSlide), o.refresh(e)), p = i) : (o.activeBreakpoint = i, o.breakpointSettings[i] === "unslick" ? o.unslick(i) : (o.options = l.extend({}, o.originalSettings, o.breakpointSettings[i]), e === !0 && (o.currentSlide = o.options.initialSlide), o.refresh(e)), p = i) : o.activeBreakpoint !== null && (o.activeBreakpoint = null, o.options = o.originalSettings, e === !0 && (o.currentSlide = o.options.initialSlide), o.refresh(e), p = i), e || p === !1 || o.$slider.trigger("breakpoint", [o, p])
        }
    }, a.prototype.changeSlide = function(e, t) {
        var n, i, s, o = this,
            p = l(e.currentTarget);
        switch (p.is("a") && e.preventDefault(), p.is("li") || (p = p.closest("li")), s = o.slideCount % o.options.slidesToScroll != 0, n = s ? 0 : (o.slideCount - o.currentSlide) % o.options.slidesToScroll, e.data.message) {
            case "previous":
                i = n === 0 ? o.options.slidesToScroll : o.options.slidesToShow - n, o.slideCount > o.options.slidesToShow && o.slideHandler(o.currentSlide - i, !1, t);
                break;
            case "next":
                i = n === 0 ? o.options.slidesToScroll : n, o.slideCount > o.options.slidesToShow && o.slideHandler(o.currentSlide + i, !1, t);
                break;
            case "index":
                var d = e.data.index === 0 ? 0 : e.data.index || p.index() * o.options.slidesToScroll;
                o.slideHandler(o.checkNavigable(d), !1, t), p.children().trigger("focus");
                break;
            default:
                return
        }
    }, a.prototype.checkNavigable = function(e) {
        var t, n;
        if (t = this.getNavigableIndexes(), n = 0, e > t[t.length - 1]) e = t[t.length - 1];
        else
            for (var i in t) {
                if (e < t[i]) {
                    e = n;
                    break
                }
                n = t[i]
            }
        return e
    }, a.prototype.cleanUpEvents = function() {
        var e = this;
        e.options.dots && e.$dots !== null && (l("li", e.$dots).off("click.slick", e.changeSlide).off("mouseenter.slick", l.proxy(e.interrupt, e, !0)).off("mouseleave.slick", l.proxy(e.interrupt, e, !1)), e.options.accessibility === !0 && e.$dots.off("keydown.slick", e.keyHandler)), e.$slider.off("focus.slick blur.slick"), e.options.arrows === !0 && e.slideCount > e.options.slidesToShow && (e.$prevArrow && e.$prevArrow.off("click.slick", e.changeSlide), e.$nextArrow && e.$nextArrow.off("click.slick", e.changeSlide), e.options.accessibility === !0 && (e.$prevArrow && e.$prevArrow.off("keydown.slick", e.keyHandler), e.$nextArrow && e.$nextArrow.off("keydown.slick", e.keyHandler))), e.$list.off("touchstart.slick mousedown.slick", e.swipeHandler), e.$list.off("touchmove.slick mousemove.slick", e.swipeHandler), e.$list.off("touchend.slick mouseup.slick", e.swipeHandler), e.$list.off("touchcancel.slick mouseleave.slick", e.swipeHandler), e.$list.off("click.slick", e.clickHandler), l(document).off(e.visibilityChange, e.visibility), e.cleanUpSlideEvents(), e.options.accessibility === !0 && e.$list.off("keydown.slick", e.keyHandler), e.options.focusOnSelect === !0 && l(e.$slideTrack).children().off("click.slick", e.selectHandler), l(window).off("orientationchange.slick.slick-" + e.instanceUid, e.orientationChange), l(window).off("resize.slick.slick-" + e.instanceUid, e.resize), l("[draggable!=true]", e.$slideTrack).off("dragstart", e.preventDefault), l(window).off("load.slick.slick-" + e.instanceUid, e.setPosition)
    }, a.prototype.cleanUpSlideEvents = function() {
        var e = this;
        e.$list.off("mouseenter.slick", l.proxy(e.interrupt, e, !0)), e.$list.off("mouseleave.slick", l.proxy(e.interrupt, e, !1))
    }, a.prototype.cleanUpRows = function() {
        var e, t = this;
        t.options.rows > 1 && ((e = t.$slides.children().children()).removeAttr("style"), t.$slider.empty().append(e))
    }, a.prototype.clickHandler = function(e) {
        this.shouldClick === !1 && (e.stopImmediatePropagation(), e.stopPropagation(), e.preventDefault())
    }, a.prototype.destroy = function(e) {
        var t = this;
        t.autoPlayClear(), t.touchObject = {}, t.cleanUpEvents(), l(".slick-cloned", t.$slider).detach(), t.$dots && t.$dots.remove(), t.$prevArrow && t.$prevArrow.length && (t.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.remove()), t.$nextArrow && t.$nextArrow.length && (t.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.remove()), t.$slides && (t.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function() {
            l(this).attr("style", l(this).data("originalStyling"))
        }), t.$slideTrack.children(this.options.slide).detach(), t.$slideTrack.detach(), t.$list.detach(), t.$slider.append(t.$slides)), t.cleanUpRows(), t.$slider.removeClass("slick-slider"), t.$slider.removeClass("slick-initialized"), t.$slider.removeClass("slick-dotted"), t.unslicked = !0, e || t.$slider.trigger("destroy", [t])
    }, a.prototype.disableTransition = function(e) {
        var t = this,
            n = {};
        n[t.transitionType] = "", t.options.fade === !1 ? t.$slideTrack.css(n) : t.$slides.eq(e).css(n)
    }, a.prototype.fadeSlide = function(e, t) {
        var n = this;
        n.cssTransitions === !1 ? (n.$slides.eq(e).css({
            zIndex: n.options.zIndex
        }), n.$slides.eq(e).animate({
            opacity: 1
        }, n.options.speed, n.options.easing, t)) : (n.applyTransition(e), n.$slides.eq(e).css({
            opacity: 1,
            zIndex: n.options.zIndex
        }), t && setTimeout(function() {
            n.disableTransition(e), t.call()
        }, n.options.speed))
    }, a.prototype.fadeSlideOut = function(e) {
        var t = this;
        t.cssTransitions === !1 ? t.$slides.eq(e).animate({
            opacity: 0,
            zIndex: t.options.zIndex - 2
        }, t.options.speed, t.options.easing) : (t.applyTransition(e), t.$slides.eq(e).css({
            opacity: 0,
            zIndex: t.options.zIndex - 2
        }))
    }, a.prototype.filterSlides = a.prototype.slickFilter = function(e) {
        var t = this;
        e !== null && (t.$slidesCache = t.$slides, t.unload(), t.$slideTrack.children(this.options.slide).detach(), t.$slidesCache.filter(e).appendTo(t.$slideTrack), t.reinit())
    }, a.prototype.focusHandler = function() {
        var e = this;
        e.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*", function(t) {
            t.stopImmediatePropagation();
            var n = l(this);
            setTimeout(function() {
                e.options.pauseOnFocus && (e.focussed = n.is(":focus"), e.autoPlay())
            }, 0)
        })
    }, a.prototype.getCurrent = a.prototype.slickCurrentSlide = function() {
        return this.currentSlide
    }, a.prototype.getDotCount = function() {
        var e = this,
            t = 0,
            n = 0,
            i = 0;
        if (e.options.infinite === !0)
            if (e.slideCount <= e.options.slidesToShow) ++i;
            else
                for (; t < e.slideCount;) ++i, t = n + e.options.slidesToScroll, n += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
        else if (e.options.centerMode === !0) i = e.slideCount;
        else if (e.options.asNavFor)
            for (; t < e.slideCount;) ++i, t = n + e.options.slidesToScroll, n += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
        else i = 1 + Math.ceil((e.slideCount - e.options.slidesToShow) / e.options.slidesToScroll);
        return i - 1
    }, a.prototype.getLeft = function(e) {
        var t, n, i, s, o = this,
            p = 0;
        return o.slideOffset = 0, n = o.$slides.first().outerHeight(!0), o.options.infinite === !0 ? (o.slideCount > o.options.slidesToShow && (o.slideOffset = o.slideWidth * o.options.slidesToShow * -1, s = -1, o.options.vertical === !0 && o.options.centerMode === !0 && (o.options.slidesToShow === 2 ? s = -1.5 : o.options.slidesToShow === 1 && (s = -2)), p = n * o.options.slidesToShow * s), o.slideCount % o.options.slidesToScroll != 0 && e + o.options.slidesToScroll > o.slideCount && o.slideCount > o.options.slidesToShow && (e > o.slideCount ? (o.slideOffset = (o.options.slidesToShow - (e - o.slideCount)) * o.slideWidth * -1, p = (o.options.slidesToShow - (e - o.slideCount)) * n * -1) : (o.slideOffset = o.slideCount % o.options.slidesToScroll * o.slideWidth * -1, p = o.slideCount % o.options.slidesToScroll * n * -1))) : e + o.options.slidesToShow > o.slideCount && (o.slideOffset = (e + o.options.slidesToShow - o.slideCount) * o.slideWidth, p = (e + o.options.slidesToShow - o.slideCount) * n), o.slideCount <= o.options.slidesToShow && (o.slideOffset = 0, p = 0), o.options.centerMode === !0 && o.slideCount <= o.options.slidesToShow ? o.slideOffset = o.slideWidth * Math.floor(o.options.slidesToShow) / 2 - o.slideWidth * o.slideCount / 2 : o.options.centerMode === !0 && o.options.infinite === !0 ? o.slideOffset += o.slideWidth * Math.floor(o.options.slidesToShow / 2) - o.slideWidth : o.options.centerMode === !0 && (o.slideOffset = 0, o.slideOffset += o.slideWidth * Math.floor(o.options.slidesToShow / 2)), t = o.options.vertical === !1 ? e * o.slideWidth * -1 + o.slideOffset : e * n * -1 + p, o.options.variableWidth === !0 && (i = o.slideCount <= o.options.slidesToShow || o.options.infinite === !1 ? o.$slideTrack.children(".slick-slide").eq(e) : o.$slideTrack.children(".slick-slide").eq(e + o.options.slidesToShow), t = o.options.rtl === !0 ? i[0] ? -1 * (o.$slideTrack.width() - i[0].offsetLeft - i.width()) : 0 : i[0] ? -1 * i[0].offsetLeft : 0, o.options.centerMode === !0 && (i = o.slideCount <= o.options.slidesToShow || o.options.infinite === !1 ? o.$slideTrack.children(".slick-slide").eq(e) : o.$slideTrack.children(".slick-slide").eq(e + o.options.slidesToShow + 1), t = o.options.rtl === !0 ? i[0] ? -1 * (o.$slideTrack.width() - i[0].offsetLeft - i.width()) : 0 : i[0] ? -1 * i[0].offsetLeft : 0, t += (o.$list.width() - i.outerWidth()) / 2)), t
    }, a.prototype.getOption = a.prototype.slickGetOption = function(e) {
        return this.options[e]
    }, a.prototype.getNavigableIndexes = function() {
        var e, t = this,
            n = 0,
            i = 0,
            s = [];
        for (t.options.infinite === !1 ? e = t.slideCount : (n = -1 * t.options.slidesToScroll, i = -1 * t.options.slidesToScroll, e = 2 * t.slideCount); n < e;) s.push(n), n = i + t.options.slidesToScroll, i += t.options.slidesToScroll <= t.options.slidesToShow ? t.options.slidesToScroll : t.options.slidesToShow;
        return s
    }, a.prototype.getSlick = function() {
        return this
    }, a.prototype.getSlideCount = function() {
        var e, t, n = this;
        return t = n.options.centerMode === !0 ? n.slideWidth * Math.floor(n.options.slidesToShow / 2) : 0, n.options.swipeToSlide === !0 ? (n.$slideTrack.find(".slick-slide").each(function(i, s) {
            if (s.offsetLeft - t + l(s).outerWidth() / 2 > -1 * n.swipeLeft) return e = s, !1
        }), Math.abs(l(e).attr("data-slick-index") - n.currentSlide) || 1) : n.options.slidesToScroll
    }, a.prototype.goTo = a.prototype.slickGoTo = function(e, t) {
        this.changeSlide({
            data: {
                message: "index",
                index: parseInt(e)
            }
        }, t)
    }, a.prototype.init = function(e) {
        var t = this;
        l(t.$slider).hasClass("slick-initialized") || (l(t.$slider).addClass("slick-initialized"), t.buildRows(), t.buildOut(), t.setProps(), t.startLoad(), t.loadSlider(), t.initializeEvents(), t.updateArrows(), t.updateDots(), t.checkResponsive(!0), t.focusHandler()), e && t.$slider.trigger("init", [t]), t.options.accessibility === !0 && t.initADA(), t.options.autoplay && (t.paused = !1, t.autoPlay())
    }, a.prototype.initADA = function() {
        var e = this,
            t = Math.ceil(e.slideCount / e.options.slidesToShow),
            n = e.getNavigableIndexes().filter(function(o) {
                return o >= 0 && o < e.slideCount
            });
        e.$slides.add(e.$slideTrack.find(".slick-cloned")).attr({
            "aria-hidden": "true",
            tabindex: "-1"
        }).find("a, input, button, select").attr({
            tabindex: "-1"
        }), e.$dots !== null && (e.$slides.not(e.$slideTrack.find(".slick-cloned")).each(function(o) {
            var p = n.indexOf(o);
            l(this).attr({
                role: "tabpanel",
                id: "slick-slide" + e.instanceUid + o,
                tabindex: -1
            }), p !== -1 && l(this).attr({
                "aria-describedby": "slick-slide-control" + e.instanceUid + p
            })
        }), e.$dots.attr("role", "tablist").find("li").each(function(o) {
            var p = n[o];
            l(this).attr({
                role: "presentation"
            }), l(this).find("button").first().attr({
                role: "tab",
                id: "slick-slide-control" + e.instanceUid + o,
                "aria-controls": "slick-slide" + e.instanceUid + p,
                "aria-label": o + 1 + " of " + t,
                "aria-selected": null,
                tabindex: "-1"
            })
        }).eq(e.currentSlide).find("button").attr({
            "aria-selected": "true",
            tabindex: "0"
        }).end());
        for (var i = e.currentSlide, s = i + e.options.slidesToShow; i < s; i++) e.$slides.eq(i).attr("tabindex", 0);
        e.activateADA()
    }, a.prototype.initArrowEvents = function() {
        var e = this;
        e.options.arrows === !0 && e.slideCount > e.options.slidesToShow && (e.$prevArrow.off("click.slick").on("click.slick", {
            message: "previous"
        }, e.changeSlide), e.$nextArrow.off("click.slick").on("click.slick", {
            message: "next"
        }, e.changeSlide), e.options.accessibility === !0 && (e.$prevArrow.on("keydown.slick", e.keyHandler), e.$nextArrow.on("keydown.slick", e.keyHandler)))
    }, a.prototype.initDotEvents = function() {
        var e = this;
        e.options.dots === !0 && (l("li", e.$dots).on("click.slick", {
            message: "index"
        }, e.changeSlide), e.options.accessibility === !0 && e.$dots.on("keydown.slick", e.keyHandler)), e.options.dots === !0 && e.options.pauseOnDotsHover === !0 && l("li", e.$dots).on("mouseenter.slick", l.proxy(e.interrupt, e, !0)).on("mouseleave.slick", l.proxy(e.interrupt, e, !1))
    }, a.prototype.initSlideEvents = function() {
        var e = this;
        e.options.pauseOnHover && (e.$list.on("mouseenter.slick", l.proxy(e.interrupt, e, !0)), e.$list.on("mouseleave.slick", l.proxy(e.interrupt, e, !1)))
    }, a.prototype.initializeEvents = function() {
        var e = this;
        e.initArrowEvents(), e.initDotEvents(), e.initSlideEvents(), e.$list.on("touchstart.slick mousedown.slick", {
            action: "start"
        }, e.swipeHandler), e.$list.on("touchmove.slick mousemove.slick", {
            action: "move"
        }, e.swipeHandler), e.$list.on("touchend.slick mouseup.slick", {
            action: "end"
        }, e.swipeHandler), e.$list.on("touchcancel.slick mouseleave.slick", {
            action: "end"
        }, e.swipeHandler), e.$list.on("click.slick", e.clickHandler), l(document).on(e.visibilityChange, l.proxy(e.visibility, e)), e.options.accessibility === !0 && e.$list.on("keydown.slick", e.keyHandler), e.options.focusOnSelect === !0 && l(e.$slideTrack).children().on("click.slick", e.selectHandler), l(window).on("orientationchange.slick.slick-" + e.instanceUid, l.proxy(e.orientationChange, e)), l(window).on("resize.slick.slick-" + e.instanceUid, l.proxy(e.resize, e)), l("[draggable!=true]", e.$slideTrack).on("dragstart", e.preventDefault), l(window).on("load.slick.slick-" + e.instanceUid, e.setPosition), l(e.setPosition)
    }, a.prototype.initUI = function() {
        var e = this;
        e.options.arrows === !0 && e.slideCount > e.options.slidesToShow && (e.$prevArrow.show(), e.$nextArrow.show()), e.options.dots === !0 && e.slideCount > e.options.slidesToShow && e.$dots.show()
    }, a.prototype.keyHandler = function(e) {
        var t = this;
        e.target.tagName.match("TEXTAREA|INPUT|SELECT") || (e.keyCode === 37 && t.options.accessibility === !0 ? t.changeSlide({
            data: {
                message: t.options.rtl === !0 ? "next" : "previous"
            }
        }) : e.keyCode === 39 && t.options.accessibility === !0 && t.changeSlide({
            data: {
                message: t.options.rtl === !0 ? "previous" : "next"
            }
        }))
    }, a.prototype.lazyLoad = function() {
        function e(r) {
            l("img[data-lazy]", r).each(function() {
                var u = l(this),
                    h = l(this).attr("data-lazy"),
                    f = l(this).attr("data-srcset"),
                    v = l(this).attr("data-sizes") || s.$slider.attr("data-sizes"),
                    k = document.createElement("img");
                k.onload = function() {
                    u.animate({
                        opacity: 0
                    }, 100, function() {
                        f && (u.attr("srcset", f), v && u.attr("sizes", v)), u.attr("src", h).animate({
                            opacity: 1
                        }, 200, function() {
                            u.removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading")
                        }), s.$slider.trigger("lazyLoaded", [s, u, h])
                    })
                }, k.onerror = function() {
                    u.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), s.$slider.trigger("lazyLoadError", [s, u, h])
                }, k.src = h
            })
        }
        var t, n, i, s = this;
        if (s.options.centerMode === !0 ? s.options.infinite === !0 ? i = (n = s.currentSlide + (s.options.slidesToShow / 2 + 1)) + s.options.slidesToShow + 2 : (n = Math.max(0, s.currentSlide - (s.options.slidesToShow / 2 + 1)), i = s.options.slidesToShow / 2 + 1 + 2 + s.currentSlide) : (n = s.options.infinite ? s.options.slidesToShow + s.currentSlide : s.currentSlide, i = Math.ceil(n + s.options.slidesToShow), s.options.fade === !0 && (n > 0 && n--, i <= s.slideCount && i++)), t = s.$slider.find(".slick-slide").slice(n, i), s.options.lazyLoad === "anticipated")
            for (var o = n - 1, p = i, d = s.$slider.find(".slick-slide"), c = 0; c < s.options.slidesToScroll; c++) o < 0 && (o = s.slideCount - 1), t = (t = t.add(d.eq(o))).add(d.eq(p)), o--, p++;
        e(t), s.slideCount <= s.options.slidesToShow ? e(s.$slider.find(".slick-slide")) : s.currentSlide >= s.slideCount - s.options.slidesToShow ? e(s.$slider.find(".slick-cloned").slice(0, s.options.slidesToShow)) : s.currentSlide === 0 && e(s.$slider.find(".slick-cloned").slice(-1 * s.options.slidesToShow))
    }, a.prototype.loadSlider = function() {
        var e = this;
        e.setPosition(), e.$slideTrack.css({
            opacity: 1
        }), e.$slider.removeClass("slick-loading"), e.initUI(), e.options.lazyLoad === "progressive" && e.progressiveLazyLoad()
    }, a.prototype.next = a.prototype.slickNext = function() {
        this.changeSlide({
            data: {
                message: "next"
            }
        })
    }, a.prototype.orientationChange = function() {
        var e = this;
        e.checkResponsive(), e.setPosition()
    }, a.prototype.pause = a.prototype.slickPause = function() {
        var e = this;
        e.autoPlayClear(), e.paused = !0
    }, a.prototype.play = a.prototype.slickPlay = function() {
        var e = this;
        e.autoPlay(), e.options.autoplay = !0, e.paused = !1, e.focussed = !1, e.interrupted = !1
    }, a.prototype.postSlide = function(e) {
        var t = this;
        t.unslicked || (t.$slider.trigger("afterChange", [t, e]), t.animating = !1, t.slideCount > t.options.slidesToShow && t.setPosition(), t.swipeLeft = null, t.options.autoplay && t.autoPlay(), t.options.accessibility === !0 && (t.initADA(), t.options.focusOnChange && l(t.$slides.get(t.currentSlide)).attr("tabindex", 0).focus()))
    }, a.prototype.prev = a.prototype.slickPrev = function() {
        this.changeSlide({
            data: {
                message: "previous"
            }
        })
    }, a.prototype.preventDefault = function(e) {
        e.preventDefault()
    }, a.prototype.progressiveLazyLoad = function(e) {
        e = e || 1;
        var t, n, i, s, o, p = this,
            d = l("img[data-lazy]", p.$slider);
        d.length ? (t = d.first(), n = t.attr("data-lazy"), i = t.attr("data-srcset"), s = t.attr("data-sizes") || p.$slider.attr("data-sizes"), (o = document.createElement("img")).onload = function() {
            i && (t.attr("srcset", i), s && t.attr("sizes", s)), t.attr("src", n).removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading"), p.options.adaptiveHeight === !0 && p.setPosition(), p.$slider.trigger("lazyLoaded", [p, t, n]), p.progressiveLazyLoad()
        }, o.onerror = function() {
            e < 3 ? setTimeout(function() {
                p.progressiveLazyLoad(e + 1)
            }, 500) : (t.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), p.$slider.trigger("lazyLoadError", [p, t, n]), p.progressiveLazyLoad())
        }, o.src = n) : p.$slider.trigger("allImagesLoaded", [p])
    }, a.prototype.refresh = function(e) {
        var t, n, i = this;
        n = i.slideCount - i.options.slidesToShow, !i.options.infinite && i.currentSlide > n && (i.currentSlide = n), i.slideCount <= i.options.slidesToShow && (i.currentSlide = 0), t = i.currentSlide, i.destroy(!0), l.extend(i, i.initials, {
            currentSlide: t
        }), i.init(), e || i.changeSlide({
            data: {
                message: "index",
                index: t
            }
        }, !1)
    }, a.prototype.registerBreakpoints = function() {
        var e, t, n, i = this,
            s = i.options.responsive || null;
        if (l.type(s) === "array" && s.length) {
            i.respondTo = i.options.respondTo || "window";
            for (e in s)
                if (n = i.breakpoints.length - 1, s.hasOwnProperty(e)) {
                    for (t = s[e].breakpoint; n >= 0;) i.breakpoints[n] && i.breakpoints[n] === t && i.breakpoints.splice(n, 1), n--;
                    i.breakpoints.push(t), i.breakpointSettings[t] = s[e].settings
                }
            i.breakpoints.sort(function(o, p) {
                return i.options.mobileFirst ? o - p : p - o
            })
        }
    }, a.prototype.reinit = function() {
        var e = this;
        e.$slides = e.$slideTrack.children(e.options.slide).addClass("slick-slide"), e.slideCount = e.$slides.length, e.currentSlide >= e.slideCount && e.currentSlide !== 0 && (e.currentSlide = e.currentSlide - e.options.slidesToScroll), e.slideCount <= e.options.slidesToShow && (e.currentSlide = 0), e.registerBreakpoints(), e.setProps(), e.setupInfinite(), e.buildArrows(), e.updateArrows(), e.initArrowEvents(), e.buildDots(), e.updateDots(), e.initDotEvents(), e.cleanUpSlideEvents(), e.initSlideEvents(), e.checkResponsive(!1, !0), e.options.focusOnSelect === !0 && l(e.$slideTrack).children().on("click.slick", e.selectHandler), e.setSlideClasses(typeof e.currentSlide == "number" ? e.currentSlide : 0), e.setPosition(), e.focusHandler(), e.paused = !e.options.autoplay, e.autoPlay(), e.$slider.trigger("reInit", [e])
    }, a.prototype.resize = function() {
        var e = this;
        l(window).width() !== e.windowWidth && (clearTimeout(e.windowDelay), e.windowDelay = window.setTimeout(function() {
            e.windowWidth = l(window).width(), e.checkResponsive(), e.unslicked || e.setPosition()
        }, 50))
    }, a.prototype.removeSlide = a.prototype.slickRemove = function(e, t, n) {
        var i = this;
        if (e = typeof e == "boolean" ? (t = e) === !0 ? 0 : i.slideCount - 1 : t === !0 ? --e : e, i.slideCount < 1 || e < 0 || e > i.slideCount - 1) return !1;
        i.unload(), n === !0 ? i.$slideTrack.children().remove() : i.$slideTrack.children(this.options.slide).eq(e).remove(), i.$slides = i.$slideTrack.children(this.options.slide), i.$slideTrack.children(this.options.slide).detach(), i.$slideTrack.append(i.$slides), i.$slidesCache = i.$slides, i.reinit()
    }, a.prototype.setCSS = function(e) {
        var t, n, i = this,
            s = {};
        i.options.rtl === !0 && (e = -e), t = i.positionProp == "left" ? Math.ceil(e) + "px" : "0px", n = i.positionProp == "top" ? Math.ceil(e) + "px" : "0px", s[i.positionProp] = e, i.transformsEnabled === !1 ? i.$slideTrack.css(s) : (s = {}, i.cssTransitions === !1 ? (s[i.animType] = "translate(" + t + ", " + n + ")", i.$slideTrack.css(s)) : (s[i.animType] = "translate3d(" + t + ", " + n + ", 0px)", i.$slideTrack.css(s)))
    }, a.prototype.setDimensions = function() {
        var e = this;
        e.options.vertical === !1 ? e.options.centerMode === !0 && e.$list.css({
            padding: "0px " + e.options.centerPadding
        }) : (e.$list.height(e.$slides.first().outerHeight(!0) * e.options.slidesToShow), e.options.centerMode === !0 && e.$list.css({
            padding: e.options.centerPadding + " 0px"
        })), e.listWidth = e.$list.width(), e.listHeight = e.$list.height(), e.options.vertical === !1 && e.options.variableWidth === !1 ? (e.slideWidth = Math.ceil(e.listWidth / e.options.slidesToShow), e.$slideTrack.width(Math.ceil(e.slideWidth * e.$slideTrack.children(".slick-slide").length))) : e.options.variableWidth === !0 ? e.$slideTrack.width(5e3 * e.slideCount) : (e.slideWidth = Math.ceil(e.listWidth), e.$slideTrack.height(Math.ceil(e.$slides.first().outerHeight(!0) * e.$slideTrack.children(".slick-slide").length)));
        var t = e.$slides.first().outerWidth(!0) - e.$slides.first().width();
        e.options.variableWidth === !1 && e.$slideTrack.children(".slick-slide").width(e.slideWidth - t)
    }, a.prototype.setFade = function() {
        var e, t = this;
        t.$slides.each(function(n, i) {
            e = t.slideWidth * n * -1, t.options.rtl === !0 ? l(i).css({
                position: "relative",
                right: e,
                top: 0,
                zIndex: t.options.zIndex - 2,
                opacity: 0
            }) : l(i).css({
                position: "relative",
                left: e,
                top: 0,
                zIndex: t.options.zIndex - 2,
                opacity: 0
            })
        }), t.$slides.eq(t.currentSlide).css({
            zIndex: t.options.zIndex - 1,
            opacity: 1
        })
    }, a.prototype.setHeight = function() {
        var e = this;
        if (e.options.slidesToShow === 1 && e.options.adaptiveHeight === !0 && e.options.vertical === !1) {
            var t = e.$slides.eq(e.currentSlide).outerHeight(!0);
            e.$list.css("height", t)
        }
    }, a.prototype.setOption = a.prototype.slickSetOption = function() {
        var e, t, n, i, s, o = this,
            p = !1;
        if (l.type(arguments[0]) === "object" ? (n = arguments[0], p = arguments[1], s = "multiple") : l.type(arguments[0]) === "string" && (n = arguments[0], i = arguments[1], p = arguments[2], arguments[0] === "responsive" && l.type(arguments[1]) === "array" ? s = "responsive" : arguments[1] !== void 0 && (s = "single")), s === "single") o.options[n] = i;
        else if (s === "multiple") l.each(n, function(d, c) {
            o.options[d] = c
        });
        else if (s === "responsive")
            for (t in i)
                if (l.type(o.options.responsive) !== "array") o.options.responsive = [i[t]];
                else {
                    for (e = o.options.responsive.length - 1; e >= 0;) o.options.responsive[e].breakpoint === i[t].breakpoint && o.options.responsive.splice(e, 1), e--;
                    o.options.responsive.push(i[t])
                }
        p && (o.unload(), o.reinit())
    }, a.prototype.setPosition = function() {
        var e = this;
        e.setDimensions(), e.setHeight(), e.options.fade === !1 ? e.setCSS(e.getLeft(e.currentSlide)) : e.setFade(), e.$slider.trigger("setPosition", [e])
    }, a.prototype.setProps = function() {
        var e = this,
            t = document.body.style;
        e.positionProp = e.options.vertical === !0 ? "top" : "left", e.positionProp === "top" ? e.$slider.addClass("slick-vertical") : e.$slider.removeClass("slick-vertical"), t.WebkitTransition === void 0 && t.MozTransition === void 0 && t.msTransition === void 0 || e.options.useCSS === !0 && (e.cssTransitions = !0), e.options.fade && (typeof e.options.zIndex == "number" ? e.options.zIndex < 3 && (e.options.zIndex = 3) : e.options.zIndex = e.defaults.zIndex), t.OTransform !== void 0 && (e.animType = "OTransform", e.transformType = "-o-transform", e.transitionType = "OTransition", t.perspectiveProperty === void 0 && t.webkitPerspective === void 0 && (e.animType = !1)), t.MozTransform !== void 0 && (e.animType = "MozTransform", e.transformType = "-moz-transform", e.transitionType = "MozTransition", t.perspectiveProperty === void 0 && t.MozPerspective === void 0 && (e.animType = !1)), t.webkitTransform !== void 0 && (e.animType = "webkitTransform", e.transformType = "-webkit-transform", e.transitionType = "webkitTransition", t.perspectiveProperty === void 0 && t.webkitPerspective === void 0 && (e.animType = !1)), t.msTransform !== void 0 && (e.animType = "msTransform", e.transformType = "-ms-transform", e.transitionType = "msTransition", t.msTransform === void 0 && (e.animType = !1)), t.transform !== void 0 && e.animType !== !1 && (e.animType = "transform", e.transformType = "transform", e.transitionType = "transition"), e.transformsEnabled = e.options.useTransform && e.animType !== null && e.animType !== !1
    }, a.prototype.setSlideClasses = function(e) {
        var t, n, i, s, o = this;
        if (n = o.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true"), o.$slides.eq(e).addClass("slick-current"), o.options.centerMode === !0) {
            var p = o.options.slidesToShow % 2 == 0 ? 1 : 0;
            t = Math.floor(o.options.slidesToShow / 2), o.options.infinite === !0 && (e >= t && e <= o.slideCount - 1 - t ? o.$slides.slice(e - t + p, e + t + 1).addClass("slick-active").attr("aria-hidden", "false") : (i = o.options.slidesToShow + e, n.slice(i - t + 1 + p, i + t + 2).addClass("slick-active").attr("aria-hidden", "false")), e === 0 ? n.eq(n.length - 1 - o.options.slidesToShow).addClass("slick-center") : e === o.slideCount - 1 && n.eq(o.options.slidesToShow).addClass("slick-center")), o.$slides.eq(e).addClass("slick-center")
        } else e >= 0 && e <= o.slideCount - o.options.slidesToShow ? o.$slides.slice(e, e + o.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : n.length <= o.options.slidesToShow ? n.addClass("slick-active").attr("aria-hidden", "false") : (s = o.slideCount % o.options.slidesToShow, i = o.options.infinite === !0 ? o.options.slidesToShow + e : e, o.options.slidesToShow == o.options.slidesToScroll && o.slideCount - e < o.options.slidesToShow ? n.slice(i - (o.options.slidesToShow - s), i + s).addClass("slick-active").attr("aria-hidden", "false") : n.slice(i, i + o.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false"));
        o.options.lazyLoad !== "ondemand" && o.options.lazyLoad !== "anticipated" || o.lazyLoad()
    }, a.prototype.setupInfinite = function() {
        var e, t, n, i = this;
        if (i.options.fade === !0 && (i.options.centerMode = !1), i.options.infinite === !0 && i.options.fade === !1 && (t = null, i.slideCount > i.options.slidesToShow)) {
            for (n = i.options.centerMode === !0 ? i.options.slidesToShow + 1 : i.options.slidesToShow, e = i.slideCount; e > i.slideCount - n; e -= 1) t = e - 1, l(i.$slides[t]).clone(!0).attr("id", "").attr("data-slick-index", t - i.slideCount).prependTo(i.$slideTrack).addClass("slick-cloned");
            for (e = 0; e < n + i.slideCount; e += 1) t = e, l(i.$slides[t]).clone(!0).attr("id", "").attr("data-slick-index", t + i.slideCount).appendTo(i.$slideTrack).addClass("slick-cloned");
            i.$slideTrack.find(".slick-cloned").find("[id]").each(function() {
                l(this).attr("id", "")
            })
        }
    }, a.prototype.interrupt = function(e) {
        var t = this;
        e || t.autoPlay(), t.interrupted = e
    }, a.prototype.selectHandler = function(e) {
        var t = this,
            n = l(e.target).is(".slick-slide") ? l(e.target) : l(e.target).parents(".slick-slide"),
            i = parseInt(n.attr("data-slick-index"));
        i || (i = 0), t.slideCount <= t.options.slidesToShow ? t.slideHandler(i, !1, !0) : t.slideHandler(i)
    }, a.prototype.slideHandler = function(e, t, n) {
        var i, s, o, p, d, c = null,
            r = this;
        if (t = t || !1, !(r.animating === !0 && r.options.waitForAnimate === !0 || r.options.fade === !0 && r.currentSlide === e))
            if (t === !1 && r.asNavFor(e), i = e, c = r.getLeft(i), p = r.getLeft(r.currentSlide), r.currentLeft = r.swipeLeft === null ? p : r.swipeLeft, r.options.infinite === !1 && r.options.centerMode === !1 && (e < 0 || e > r.getDotCount() * r.options.slidesToScroll)) r.options.fade === !1 && (i = r.currentSlide, n !== !0 ? r.animateSlide(p, function() {
                r.postSlide(i)
            }) : r.postSlide(i));
            else if (r.options.infinite === !1 && r.options.centerMode === !0 && (e < 0 || e > r.slideCount - r.options.slidesToScroll)) r.options.fade === !1 && (i = r.currentSlide, n !== !0 ? r.animateSlide(p, function() {
            r.postSlide(i)
        }) : r.postSlide(i));
        else {
            if (r.options.autoplay && clearInterval(r.autoPlayTimer), s = i < 0 ? r.slideCount % r.options.slidesToScroll != 0 ? r.slideCount - r.slideCount % r.options.slidesToScroll : r.slideCount + i : i >= r.slideCount ? r.slideCount % r.options.slidesToScroll != 0 ? 0 : i - r.slideCount : i, r.animating = !0, r.$slider.trigger("beforeChange", [r, r.currentSlide, s]), o = r.currentSlide, r.currentSlide = s, r.setSlideClasses(r.currentSlide), r.options.asNavFor && (d = (d = r.getNavTarget()).slick("getSlick")).slideCount <= d.options.slidesToShow && d.setSlideClasses(r.currentSlide), r.updateDots(), r.updateArrows(), r.options.fade === !0) return n !== !0 ? (r.fadeSlideOut(o), r.fadeSlide(s, function() {
                r.postSlide(s)
            })) : r.postSlide(s), void r.animateHeight();
            n !== !0 ? r.animateSlide(c, function() {
                r.postSlide(s)
            }) : r.postSlide(s)
        }
    }, a.prototype.startLoad = function() {
        var e = this;
        e.options.arrows === !0 && e.slideCount > e.options.slidesToShow && (e.$prevArrow.hide(), e.$nextArrow.hide()), e.options.dots === !0 && e.slideCount > e.options.slidesToShow && e.$dots.hide(), e.$slider.addClass("slick-loading")
    }, a.prototype.swipeDirection = function() {
        var e, t, n, i, s = this;
        return e = s.touchObject.startX - s.touchObject.curX, t = s.touchObject.startY - s.touchObject.curY, n = Math.atan2(t, e), (i = Math.round(180 * n / Math.PI)) < 0 && (i = 360 - Math.abs(i)), i <= 45 && i >= 0 || i <= 360 && i >= 315 ? s.options.rtl === !1 ? "left" : "right" : i >= 135 && i <= 225 ? s.options.rtl === !1 ? "right" : "left" : s.options.verticalSwiping === !0 ? i >= 35 && i <= 135 ? "down" : "up" : "vertical"
    }, a.prototype.swipeEnd = function(e) {
        var t, n, i = this;
        if (i.dragging = !1, i.swiping = !1, i.scrolling) return i.scrolling = !1, !1;
        if (i.interrupted = !1, i.shouldClick = !(i.touchObject.swipeLength > 10), i.touchObject.curX === void 0) return !1;
        if (i.touchObject.edgeHit === !0 && i.$slider.trigger("edge", [i, i.swipeDirection()]), i.touchObject.swipeLength >= i.touchObject.minSwipe) {
            switch (n = i.swipeDirection()) {
                case "left":
                case "down":
                    t = i.options.swipeToSlide ? i.checkNavigable(i.currentSlide + i.getSlideCount()) : i.currentSlide + i.getSlideCount(), i.currentDirection = 0;
                    break;
                case "right":
                case "up":
                    t = i.options.swipeToSlide ? i.checkNavigable(i.currentSlide - i.getSlideCount()) : i.currentSlide - i.getSlideCount(), i.currentDirection = 1
            }
            n != "vertical" && (i.slideHandler(t), i.touchObject = {}, i.$slider.trigger("swipe", [i, n]))
        } else i.touchObject.startX !== i.touchObject.curX && (i.slideHandler(i.currentSlide), i.touchObject = {})
    }, a.prototype.swipeHandler = function(e) {
        var t = this;
        if (!(t.options.swipe === !1 || "ontouchend" in document && t.options.swipe === !1 || t.options.draggable === !1 && e.type.indexOf("mouse") !== -1)) switch (t.touchObject.fingerCount = e.originalEvent && e.originalEvent.touches !== void 0 ? e.originalEvent.touches.length : 1, t.touchObject.minSwipe = t.listWidth / t.options.touchThreshold, t.options.verticalSwiping === !0 && (t.touchObject.minSwipe = t.listHeight / t.options.touchThreshold), e.data.action) {
            case "start":
                t.swipeStart(e);
                break;
            case "move":
                t.swipeMove(e);
                break;
            case "end":
                t.swipeEnd(e)
        }
    }, a.prototype.swipeMove = function(e) {
        var t, n, i, s, o, p, d = this;
        return o = e.originalEvent !== void 0 ? e.originalEvent.touches : null, !(!d.dragging || d.scrolling || o && o.length !== 1) && (t = d.getLeft(d.currentSlide), d.touchObject.curX = o !== void 0 ? o[0].pageX : e.clientX, d.touchObject.curY = o !== void 0 ? o[0].pageY : e.clientY, d.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(d.touchObject.curX - d.touchObject.startX, 2))), p = Math.round(Math.sqrt(Math.pow(d.touchObject.curY - d.touchObject.startY, 2))), !d.options.verticalSwiping && !d.swiping && p > 4 ? (d.scrolling = !0, !1) : (d.options.verticalSwiping === !0 && (d.touchObject.swipeLength = p), n = d.swipeDirection(), e.originalEvent !== void 0 && d.touchObject.swipeLength > 4 && (d.swiping = !0, e.preventDefault()), s = (d.options.rtl === !1 ? 1 : -1) * (d.touchObject.curX > d.touchObject.startX ? 1 : -1), d.options.verticalSwiping === !0 && (s = d.touchObject.curY > d.touchObject.startY ? 1 : -1), i = d.touchObject.swipeLength, d.touchObject.edgeHit = !1, d.options.infinite === !1 && (d.currentSlide === 0 && n === "right" || d.currentSlide >= d.getDotCount() && n === "left") && (i = d.touchObject.swipeLength * d.options.edgeFriction, d.touchObject.edgeHit = !0), d.options.vertical === !1 ? d.swipeLeft = t + i * s : d.swipeLeft = t + i * (d.$list.height() / d.listWidth) * s, d.options.verticalSwiping === !0 && (d.swipeLeft = t + i * s), d.options.fade !== !0 && d.options.touchMove !== !1 && (d.animating === !0 ? (d.swipeLeft = null, !1) : void d.setCSS(d.swipeLeft))))
    }, a.prototype.swipeStart = function(e) {
        var t, n = this;
        if (n.interrupted = !0, n.touchObject.fingerCount !== 1 || n.slideCount <= n.options.slidesToShow) return n.touchObject = {}, !1;
        e.originalEvent !== void 0 && e.originalEvent.touches !== void 0 && (t = e.originalEvent.touches[0]), n.touchObject.startX = n.touchObject.curX = t !== void 0 ? t.pageX : e.clientX, n.touchObject.startY = n.touchObject.curY = t !== void 0 ? t.pageY : e.clientY, n.dragging = !0
    }, a.prototype.unfilterSlides = a.prototype.slickUnfilter = function() {
        var e = this;
        e.$slidesCache !== null && (e.unload(), e.$slideTrack.children(this.options.slide).detach(), e.$slidesCache.appendTo(e.$slideTrack), e.reinit())
    }, a.prototype.unload = function() {
        var e = this;
        l(".slick-cloned", e.$slider).remove(), e.$dots && e.$dots.remove(), e.$prevArrow && e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.remove(), e.$nextArrow && e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.remove(), e.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "")
    }, a.prototype.unslick = function(e) {
        var t = this;
        t.$slider.trigger("unslick", [t, e]), t.destroy()
    }, a.prototype.updateArrows = function() {
        var e = this;
        Math.floor(e.options.slidesToShow / 2), e.options.arrows === !0 && e.slideCount > e.options.slidesToShow && !e.options.infinite && (e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), e.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), e.currentSlide === 0 ? (e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : (e.currentSlide >= e.slideCount - e.options.slidesToShow && e.options.centerMode === !1 || e.currentSlide >= e.slideCount - 1 && e.options.centerMode === !0) && (e.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")))
    }, a.prototype.updateDots = function() {
        var e = this;
        e.$dots !== null && (e.$dots.find("li").removeClass("slick-active").end(), e.$dots.find("li").eq(Math.floor(e.currentSlide / e.options.slidesToScroll)).addClass("slick-active"))
    }, a.prototype.visibility = function() {
        var e = this;
        e.options.autoplay && (document[e.hidden] ? e.interrupted = !0 : e.interrupted = !1)
    }, l.fn.slick = function() {
        var e, t, n = this,
            i = arguments[0],
            s = Array.prototype.slice.call(arguments, 1),
            o = n.length;
        for (e = 0; e < o; e++)
            if (typeof i == "object" || i === void 0 ? n[e].slick = new a(n[e], i) : t = n[e].slick[i].apply(n[e].slick, s), t !== void 0) return t;
        return n
    }
}),
function(l) {
    l.fn.slickAnimation = function() {
        function a(c, r, u, h, f) {
            f = typeof f != "undefined" ? f : !1, r.opacity == 1 ? (c.addClass(u), c.addClass(h)) : (c.removeClass(u), c.removeClass(h)), f && c.css(r)
        }

        function e(c, r) {
            return c ? 1e3 * c + 1e3 : r ? 1e3 * r : c || r ? 1e3 * c + 1e3 * r : 1e3
        }

        function t(c, r, u) {
            var h = ["animation-" + r, "-webkit-animation-" + r, "-moz-animation-" + r, "-o-animation-" + r, "-ms-animation-" + r],
                f = {};
            h.forEach(function(v) {
                f[v] = u + "s"
            }), c.css(f)
        }
        var n = l(this),
            i = n.find(".slick-list .slick-track > div"),
            s = n.find('[data-slick-index="0"]'),
            o = "animated",
            p = {
                opacity: "1"
            },
            d = {
                opacity: "0"
            };
        return i.each(function() {
            var c = l(this);
            c.find("[data-animation-in]").each(function() {
                var r = l(this);
                r.css(d);
                var u = r.attr("data-animation-in"),
                    h = r.attr("data-animation-out"),
                    f = r.attr("data-delay-in"),
                    v = r.attr("data-duration-in"),
                    k = r.attr("data-delay-out"),
                    y = r.attr("data-duration-out");
                h ? (s.length > 0 && c.hasClass("slick-current") && (a(r, p, u, o, !0), f && t(r, "delay", f), v && t(r, "duration", v), setTimeout(function() {
                    a(r, d, u, o), a(r, p, h, o), k && t(r, "delay", k), y && t(r, "duration", y)
                }, e(f, v))), n.on("afterChange", function(w, g, S) {
                    c.hasClass("slick-current") && (a(r, p, u, o, !0), f && t(r, "delay", f), v && t(r, "duration", v), setTimeout(function() {
                        a(r, d, u, o), a(r, p, h, o), k && t(r, "delay", k), y && t(r, "duration", y)
                    }, e(f, v)))
                }), n.on("beforeChange", function(w, g, S) {
                    a(r, d, h, o, !0)
                })) : (s.length > 0 && c.hasClass("slick-current") && (a(r, p, u, o, !0), f && t(r, "delay", f), v && t(r, "duration", v)), n.on("afterChange", function(w, g, S) {
                    c.hasClass("slick-current") && (a(r, p, u, o, !0), f && t(r, "delay", f), v && t(r, "duration", v))
                }), n.on("beforeChange", function(w, g, S) {
                    a(r, d, u, o, !0)
                }))
            })
        }), this
    }
}(jQuery);
/*!
 * scrollup v2.4.1
 * Url: http://markgoodyear.com/labs/scrollup/
 * Copyright (c) Mark Goodyear — @markgdyr — http://markgoodyear.com
 * License: MIT
 */
(function(l, a, e) {
    "use strict";
    l.fn.scrollUp = function(t) {
        l.data(e.body, "scrollUp") || (l.data(e.body, "scrollUp", !0), l.fn.scrollUp.init(t))
    }, l.fn.scrollUp.init = function(t) {
        var n, i, s, o, p, d, c, r = l.fn.scrollUp.settings = l.extend({}, l.fn.scrollUp.defaults, t),
            u = !1;
        switch (c = r.scrollTrigger ? l(r.scrollTrigger) : l("<a/>", {
            id: r.scrollName,
            href: "#top"
        }), r.scrollTitle && c.attr("title", r.scrollTitle), c.appendTo("body"), r.scrollImg || r.scrollTrigger || c.html(r.scrollText), c.css({
            display: "none",
            position: "fixed",
            zIndex: r.zIndex
        }), r.activeOverlay && l("<div/>", {
            id: r.scrollName + "-active"
        }).css({
            position: "absolute",
            top: r.scrollDistance + "px",
            width: "100%",
            borderTop: "1px dotted" + r.activeOverlay,
            zIndex: r.zIndex
        }).appendTo("body"), r.animation) {
            case "fade":
                n = "fadeIn", i = "fadeOut", s = r.animationSpeed;
                break;
            case "slide":
                n = "slideDown", i = "slideUp", s = r.animationSpeed;
                break;
            default:
                n = "show", i = "hide", s = 0
        }
        o = r.scrollFrom === "top" ? r.scrollDistance : l(e).height() - l(a).height() - r.scrollDistance, p = l(a).scroll(function() {
            l(a).scrollTop() > o ? u || (c[n](s), u = !0) : u && (c[i](s), u = !1)
        }), r.scrollTarget ? typeof r.scrollTarget == "number" ? d = r.scrollTarget : typeof r.scrollTarget == "string" && (d = Math.floor(l(r.scrollTarget).offset().top)) : d = 0, c.click(function(h) {
            h.preventDefault(), l("html, body").animate({
                scrollTop: d
            }, r.scrollSpeed, r.easingType)
        })
    }, l.fn.scrollUp.defaults = {
        scrollName: "scrollUp",
        scrollDistance: 300,
        scrollFrom: "top",
        scrollSpeed: 300,
        easingType: "linear",
        animation: "fade",
        animationSpeed: 200,
        scrollTrigger: !1,
        scrollTarget: !1,
        scrollText: "Scroll to top",
        scrollTitle: !1,
        scrollImg: !1,
        activeOverlay: !1,
        zIndex: 2147483647
    }, l.fn.scrollUp.destroy = function(t) {
        l.removeData(e.body, "scrollUp"), l("#" + l.fn.scrollUp.settings.scrollName).remove(), l("#" + l.fn.scrollUp.settings.scrollName + "-active").remove(), l.fn.jquery.split(".")[1] >= 7 ? l(a).off("scroll", t) : l(a).unbind("scroll", t)
    }, l.scrollUp = l.fn.scrollUp
})(jQuery, window, document);
//# sourceMappingURL=/s/files/1/0016/9626/8348/t/8/assets/plugins.js.map?v=130388353295227686641636534428