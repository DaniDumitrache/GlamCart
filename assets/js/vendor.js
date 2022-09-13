/*!
 * The Final Countdown for jQuery v2.2.0 (http://hilios.github.io/jQuery.countdown/)
 * Copyright (c) 2016 Edson Hilios
 * 
 */
! function(a) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], a) : a(jQuery)
}(function(a) {
    "use strict";

    function b(a) {
        if (a instanceof Date) return a;
        if (String(a).match(g)) return String(a).match(/^[0-9]*$/) && (a = Number(a)), String(a).match(/\-/) && (a = String(a).replace(/\-/g, "/")), new Date(a);
        throw new Error("Couldn't cast `" + a + "` to a date object.")
    }

    function c(a) {
        var b = a.toString().replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
        return new RegExp(b)
    }

    function d(a) {
        return function(b) {
            var d = b.match(/%(-|!)?[A-Z]{1}(:[^;]+;)?/gi);
            if (d)
                for (var f = 0, g = d.length; f < g; ++f) {
                    var h = d[f].match(/%(-|!)?([a-zA-Z]{1})(:[^;]+;)?/),
                        j = c(h[0]),
                        k = h[1] || "",
                        l = h[3] || "",
                        m = null;
                    h = h[2], i.hasOwnProperty(h) && (m = i[h], m = Number(a[m])), null !== m && ("!" === k && (m = e(l, m)), "" === k && m < 10 && (m = "0" + m.toString()), b = b.replace(j, m.toString()))
                }
            return b = b.replace(/%%/, "%")
        }
    }

    function e(a, b) {
        var c = "s",
            d = "";
        return a && (a = a.replace(/(:|;|\s)/gi, "").split(/\,/), 1 === a.length ? c = a[0] : (d = a[0], c = a[1])), Math.abs(b) > 1 ? c : d
    }
    var f = [],
        g = [],
        h = {
            precision: 100,
            elapse: !1,
            defer: !1
        };
    g.push(/^[0-9]*$/.source), g.push(/([0-9]{1,2}\/){2}[0-9]{4}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), g.push(/[0-9]{4}([\/\-][0-9]{1,2}){2}( [0-9]{1,2}(:[0-9]{2}){2})?/.source), g = new RegExp(g.join("|"));
    var i = {
            Y: "years",
            m: "months",
            n: "daysToMonth",
            d: "daysToWeek",
            w: "weeks",
            W: "weeksToMonth",
            H: "hours",
            M: "minutes",
            S: "seconds",
            D: "totalDays",
            I: "totalHours",
            N: "totalMinutes",
            T: "totalSeconds"
        },
        j = function(b, c, d) {
            this.el = b, this.$el = a(b), this.interval = null, this.offset = {}, this.options = a.extend({}, h), this.instanceNumber = f.length, f.push(this), this.$el.data("countdown-instance", this.instanceNumber), d && ("function" == typeof d ? (this.$el.on("update.countdown", d), this.$el.on("stoped.countdown", d), this.$el.on("finish.countdown", d)) : this.options = a.extend({}, h, d)), this.setFinalDate(c), this.options.defer === !1 && this.start()
        };
    a.extend(j.prototype, {
        start: function() {
            null !== this.interval && clearInterval(this.interval);
            var a = this;
            this.update(), this.interval = setInterval(function() {
                a.update.call(a)
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
            this.stop.call(this), f[this.instanceNumber] = null, delete this.$el.data().countdownInstance
        },
        setFinalDate: function(a) {
            this.finalDate = b(a)
        },
        update: function() {
            if (0 === this.$el.closest("html").length) return void this.remove();
            var b, c = void 0 !== a._data(this.el, "events"),
                d = new Date;
            b = this.finalDate.getTime() - d.getTime(), b = Math.ceil(b / 1e3), b = !this.options.elapse && b < 0 ? 0 : Math.abs(b), this.totalSecsLeft !== b && c && (this.totalSecsLeft = b, this.elapsed = d >= this.finalDate, this.offset = {
                seconds: this.totalSecsLeft % 60,
                minutes: Math.floor(this.totalSecsLeft / 60) % 60,
                hours: Math.floor(this.totalSecsLeft / 60 / 60) % 24,
                days: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
                daysToWeek: Math.floor(this.totalSecsLeft / 60 / 60 / 24) % 7,
                daysToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 % 30.4368),
                weeks: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7),
                weeksToMonth: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 7) % 4,
                months: Math.floor(this.totalSecsLeft / 60 / 60 / 24 / 30.4368),
                years: Math.abs(this.finalDate.getFullYear() - d.getFullYear()),
                totalDays: Math.floor(this.totalSecsLeft / 60 / 60 / 24),
                totalHours: Math.floor(this.totalSecsLeft / 60 / 60),
                totalMinutes: Math.floor(this.totalSecsLeft / 60),
                totalSeconds: this.totalSecsLeft
            }, this.options.elapse || 0 !== this.totalSecsLeft ? this.dispatchEvent("update") : (this.stop(), this.dispatchEvent("finish")))
        },
        dispatchEvent: function(b) {
            var c = a.Event(b + ".countdown");
            c.finalDate = this.finalDate, c.elapsed = this.elapsed, c.offset = a.extend({}, this.offset), c.strftime = d(this.offset), this.$el.trigger(c)
        }
    }), a.fn.countdown = function() {
        var b = Array.prototype.slice.call(arguments, 0);
        return this.each(function() {
            var c = a(this).data("countdown-instance");
            if (void 0 !== c) {
                var d = f[c],
                    e = b[0];
                j.prototype.hasOwnProperty(e) ? d[e].apply(d, b.slice(1)) : null === String(e).match(/^[$A-Z_][0-9A-Z_$]*$/i) ? (d.setFinalDate.call(d, e), d.start()) : a.error("Method %s does not exist on jQuery.countdown".replace(/\%s/gi, e))
            } else new j(this, b[0], b[1])
        })
    }
});



/*
 * jQuery Storage API Plugin
 *
 * Copyright (c) 2013 Julien Maurel
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 * https://github.com/julien-maurel/jQuery-Storage-API
 *
 * Version: 1.9.4
 */
! function(e) {
    "function" == typeof define && define.amd ? define(["jquery"], e) : e("object" == typeof exports ? require("jquery") : jQuery)
}(function(e) {
    function t() {
        var t, r, i, o = this._type,
            n = arguments.length,
            s = window[o],
            a = arguments,
            f = a[0];
        if (1 > n) throw new Error("Minimum 1 argument must be given");
        if (e.isArray(f)) {
            r = {};
            for (var l in f) {
                t = f[l];
                try {
                    r[t] = JSON.parse(s.getItem(t))
                } catch (c) {
                    r[t] = s.getItem(t)
                }
            }
            return r
        }
        if (1 != n) {
            try {
                r = JSON.parse(s.getItem(f))
            } catch (c) {
                throw new ReferenceError(f + " is not defined in this storage")
            }
            for (var l = 1; n - 1 > l; l++)
                if (r = r[a[l]], void 0 === r) throw new ReferenceError([].slice.call(a, 1, l + 1).join(".") + " is not defined in this storage");
            if (e.isArray(a[l])) {
                i = r, r = {};
                for (var u in a[l]) r[a[l][u]] = i[a[l][u]];
                return r
            }
            return r[a[l]]
        }
        try {
            return JSON.parse(s.getItem(f))
        } catch (c) {
            return s.getItem(f)
        }
    }

    function r() {
        var t, r, i, o = this._type,
            n = arguments.length,
            s = window[o],
            a = arguments,
            f = a[0],
            l = a[1],
            c = isNaN(l) ? {} : [];
        if (1 > n || !e.isPlainObject(f) && 2 > n) throw new Error("Minimum 2 arguments must be given or first parameter must be an object");
        if (e.isPlainObject(f)) {
            for (var u in f) t = f[u], e.isPlainObject(t) || this.alwaysUseJson ? s.setItem(u, JSON.stringify(t)) : s.setItem(u, t);
            return f
        }
        if (2 == n) return "object" == typeof l || this.alwaysUseJson ? s.setItem(f, JSON.stringify(l)) : s.setItem(f, l), l;
        try {
            i = s.getItem(f), null != i && (c = JSON.parse(i))
        } catch (h) {}
        i = c;
        for (var u = 1; n - 2 > u; u++) t = a[u], r = isNaN(a[u + 1]) ? "object" : "array", (!i[t] || "object" == r && !e.isPlainObject(i[t]) || "array" == r && !e.isArray(i[t])) && ("array" == r ? i[t] = [] : i[t] = {}), i = i[t];
        return i[a[u]] = a[u + 1], s.setItem(f, JSON.stringify(c)), c
    }

    function i() {
        var t, r, i = this._type,
            o = arguments.length,
            n = window[i],
            s = arguments,
            a = s[0];
        if (1 > o) throw new Error("Minimum 1 argument must be given");
        if (e.isArray(a)) {
            for (var f in a) n.removeItem(a[f]);
            return !0
        }
        if (1 == o) return n.removeItem(a), !0;
        try {
            t = r = JSON.parse(n.getItem(a))
        } catch (l) {
            throw new ReferenceError(a + " is not defined in this storage")
        }
        for (var f = 1; o - 1 > f; f++)
            if (r = r[s[f]], void 0 === r) throw new ReferenceError([].slice.call(s, 1, f).join(".") + " is not defined in this storage");
        if (e.isArray(s[f]))
            for (var c in s[f]) delete r[s[f][c]];
        else delete r[s[f]];
        return n.setItem(a, JSON.stringify(t)), !0
    }

    function o(t) {
        var r = a.call(this);
        for (var o in r) i.call(this, r[o]);
        if (t)
            for (var o in e.namespaceStorages) f(o)
    }

    function n() {
        var r = arguments.length,
            i = arguments,
            o = i[0];
        if (0 == r) return 0 == a.call(this).length;
        if (e.isArray(o)) {
            for (var s = 0; s < o.length; s++)
                if (!n.call(this, o[s])) return !1;
            return !0
        }
        try {
            var f = t.apply(this, arguments);
            e.isArray(i[r - 1]) || (f = {
                totest: f
            });
            for (var s in f)
                if (!(e.isPlainObject(f[s]) && e.isEmptyObject(f[s]) || e.isArray(f[s]) && !f[s].length) && f[s]) return !1;
            return !0
        } catch (l) {
            return !0
        }
    }

    function s() {
        var r = arguments.length,
            i = arguments,
            o = i[0];
        if (1 > r) throw new Error("Minimum 1 argument must be given");
        if (e.isArray(o)) {
            for (var n = 0; n < o.length; n++)
                if (!s.call(this, o[n])) return !1;
            return !0
        }
        try {
            var a = t.apply(this, arguments);
            e.isArray(i[r - 1]) || (a = {
                totest: a
            });
            for (var n in a)
                if (void 0 === a[n] || null === a[n]) return !1;
            return !0
        } catch (f) {
            return !1
        }
    }

    function a() {
        var e = this._type,
            r = arguments.length,
            i = window[e],
            o = arguments,
            n = [],
            s = {};
        if (s = r > 0 ? t.apply(this, o) : i, s && s._cookie)
            for (var a in Cookies.get()) "" != a && n.push(a.replace(s._prefix, ""));
        else
            for (var f in s) s.hasOwnProperty(f) && n.push(f);
        return n
    }

    function f(t) {
        if (!t || "string" != typeof t) throw new Error("First parameter must be a string");
        h ? (window.localStorage.getItem(t) || window.localStorage.setItem(t, "{}"), window.sessionStorage.getItem(t) || window.sessionStorage.setItem(t, "{}")) : (window.localCookieStorage.getItem(t) || window.localCookieStorage.setItem(t, "{}"), window.sessionCookieStorage.getItem(t) || window.sessionCookieStorage.setItem(t, "{}"));
        var r = {
            localStorage: e.extend({}, e.localStorage, {
                _ns: t
            }),
            sessionStorage: e.extend({}, e.sessionStorage, {
                _ns: t
            })
        };
        return "undefined" != typeof Cookies && (window.cookieStorage.getItem(t) || window.cookieStorage.setItem(t, "{}"), r.cookieStorage = e.extend({}, e.cookieStorage, {
            _ns: t
        })), e.namespaceStorages[t] = r, r
    }

    function l(e) {
        var t = "jsapi";
        try {
            return window[e] ? (window[e].setItem(t, t), window[e].removeItem(t), !0) : !1
        } catch (r) {
            return !1
        }
    }
    var c = "ls_",
        u = "ss_",
        h = l("localStorage"),
        g = {
            _type: "",
            _ns: "",
            _callMethod: function(e, t) {
                var r = [],
                    t = Array.prototype.slice.call(t),
                    i = t[0];
                return this._ns && r.push(this._ns), "string" == typeof i && -1 !== i.indexOf(".") && (t.shift(), [].unshift.apply(t, i.split("."))), [].push.apply(r, t), e.apply(this, r)
            },
            alwaysUseJson: !1,
            get: function() {
                return this._callMethod(t, arguments)
            },
            set: function() {
                var t = arguments.length,
                    i = arguments,
                    o = i[0];
                if (1 > t || !e.isPlainObject(o) && 2 > t) throw new Error("Minimum 2 arguments must be given or first parameter must be an object");
                if (e.isPlainObject(o) && this._ns) {
                    for (var n in o) this._callMethod(r, [n, o[n]]);
                    return o
                }
                var s = this._callMethod(r, i);
                return this._ns ? s[o.split(".")[0]] : s
            },
            remove: function() {
                if (arguments.length < 1) throw new Error("Minimum 1 argument must be given");
                return this._callMethod(i, arguments)
            },
            removeAll: function(e) {
                return this._ns ? (this._callMethod(r, [{}]), !0) : this._callMethod(o, [e])
            },
            isEmpty: function() {
                return this._callMethod(n, arguments)
            },
            isSet: function() {
                if (arguments.length < 1) throw new Error("Minimum 1 argument must be given");
                return this._callMethod(s, arguments)
            },
            keys: function() {
                return this._callMethod(a, arguments)
            }
        };
    if ("undefined" != typeof Cookies) {
        window.name || (window.name = Math.floor(1e8 * Math.random()));
        var m = {
            _cookie: !0,
            _prefix: "",
            _expires: null,
            _path: null,
            _domain: null,
            setItem: function(e, t) {
                Cookies.set(this._prefix + e, t, {
                    expires: this._expires,
                    path: this._path,
                    domain: this._domain
                })
            },
            getItem: function(e) {
                return Cookies.get(this._prefix + e)
            },
            removeItem: function(e) {
                return Cookies.remove(this._prefix + e, {
                    path: this._path
                })
            },
            clear: function() {
                for (var e in Cookies.get()) "" != e && (!this._prefix && -1 === e.indexOf(c) && -1 === e.indexOf(u) || this._prefix && 0 === e.indexOf(this._prefix)) && Cookies.remove(e)
            },
            setExpires: function(e) {
                return this._expires = e, this
            },
            setPath: function(e) {
                return this._path = e, this
            },
            setDomain: function(e) {
                return this._domain = e, this
            },
            setConf: function(e) {
                return e.path && (this._path = e.path), e.domain && (this._domain = e.domain), e.expires && (this._expires = e.expires), this
            },
            setDefaultConf: function() {
                this._path = this._domain = this._expires = null
            }
        };
        h || (window.localCookieStorage = e.extend({}, m, {
            _prefix: c,
            _expires: 3650
        }), window.sessionCookieStorage = e.extend({}, m, {
            _prefix: u + window.name + "_"
        })), window.cookieStorage = e.extend({}, m), e.cookieStorage = e.extend({}, g, {
            _type: "cookieStorage",
            setExpires: function(e) {
                return window.cookieStorage.setExpires(e), this
            },
            setPath: function(e) {
                return window.cookieStorage.setPath(e), this
            },
            setDomain: function(e) {
                return window.cookieStorage.setDomain(e), this
            },
            setConf: function(e) {
                return window.cookieStorage.setConf(e), this
            },
            setDefaultConf: function() {
                return window.cookieStorage.setDefaultConf(), this
            }
        })
    }
    e.initNamespaceStorage = function(e) {
        return f(e)
    }, h ? (e.localStorage = e.extend({}, g, {
        _type: "localStorage"
    }), e.sessionStorage = e.extend({}, g, {
        _type: "sessionStorage"
    })) : (e.localStorage = e.extend({}, g, {
        _type: "localCookieStorage"
    }), e.sessionStorage = e.extend({}, g, {
        _type: "sessionCookieStorage"
    })), e.namespaceStorages = {}, e.removeAllStorages = function(t) {
        e.localStorage.removeAll(t), e.sessionStorage.removeAll(t), e.cookieStorage && e.cookieStorage.removeAll(t), t || (e.namespaceStorages = {})
    }, e.alwaysUseJsonInStorage = function(t) {
        g.alwaysUseJson = t, e.localStorage.alwaysUseJson = t, e.sessionStorage.alwaysUseJson = t, e.cookieStorage && (e.cookieStorage.alwaysUseJson = t)
    }
});




/*
 * compare-product.min.js
 */
(function($) {
    'use strict';

    jQuery(document).ready(function($) {

        $('.compare-modal-close').on('click', function() {
            $('#moda-compare').fadeOut();

            return false;
        });

        /*currency*/
        function convert_currency(value) {
            var newCurrency = Currency.currentCurrency;
            var oldCurrency = shopCurrency;
            if (isNaN(value)) {
                value = 0.0;
            }

            var cents = 0.0;
            var oldFormat = Currency.moneyFormats['USD'][Currency.format] || '';
            var newFormat = Currency.moneyFormats[newCurrency][Currency.format] || '';
            if (oldFormat.indexOf('amount_no_decimals') !== -1) {
                cents = Currency.convert(parseInt(value, 10) * 100, oldCurrency, newCurrency);
            } else if (oldCurrency === 'JOD' || oldCurrency == 'KWD' || oldCurrency == 'BHD') {
                cents = Currency.convert(parseInt(value, 10) / 10, oldCurrency, newCurrency);
            } else {
                cents = Currency.convert(parseInt(value, 10), oldCurrency, newCurrency);
            }
            var my_data = Currency.formatMoney(cents, newFormat);
            return my_data;


        }
        /* end currency */

        /* Compare Product*/
        var storage = $.localStorage;
        var compare = {};
        var total_compare = 100;
        if (storage.isSet('compare')) {
            compare = storage.get('compare');
        } else {
            storage.set('compare', {});
        }

        function compare_to_table(data) {
            if (Object.keys(data).length <= 0) {
                return '';
            }
            var html = '';
            var i = 0;

            var end_check = (Object.keys(data).length - 1);
            var width_tr = (end_check > 0) ? (90 / (Object.keys(data).length)) : 90;
            var data_html = '';
            for (i = 0; i <= end_check; i++) {
                var el = data[i];
                var is_sale = false;
                if (el.compare_at_price > el.price) {
                    is_sale = true
                }
                data_html = data_html + '<th class=" ' + el.handle + '"><button type="button" class="close remove-compare center-block" aria-label="Close" data-handle="' + el.handle + '"><i class="fa fa-times"></i></button></th>';
                //Start title 
                if (i == 0) {
                    html = html + '<tr>';
                    html = html + '<th width="15%" class="product-name" > Product name </th>';
                }
                html = html + '<td width="' + width_tr + '%"  class="' + el.handle + '"> ' + el.title + '  </td>';
                if (i >= end_check) {
                    html = html + '</tr>';
                }
                // End Title 
            }
            for (i = 0; i <= end_check; i++) {
                var el = data[i];
                var is_sale = false;
                if (el.compare_at_price > el.price) {
                    is_sale = true
                }
                if (i == 0) {
                    html = html + '<tr>';
                    html = html + '<th width="15%" class="product-name" > Product image </th>';

                }
                // start product image
                html = html + '<td width="' + width_tr + '%" class="item-row ' + el.handle + '" id="product-' + el.variants[0].id + '"> <img src="' + el.featured_image + '"  width="150"/> ' + '<div class="product-price"> ';
                if (is_sale) {
                    html = html + '<strong>On Sale</strong>' + '<span class="price-sale"><span class="money" data-currency-' + Currency.currentCurrency + '="' + convert_currency(el.price, '11') + '">' + convert_currency(el.price, '11') + '</span></span>';
                } else {
                    html = html + '<span class="price-sale"><span class="money" data-currency-' + Currency.currentCurrency + '="' + convert_currency(el.price, '11') + '">' + convert_currency(el.price, '11') + '</span></span>';
                }
                if (convert_currency(el.compare_at_price, 'nosymbol') > 0) {
                    html = html + '<span class="visually-hidden">Regular price</span> <s>' + convert_currency(el.compare_at_price, '11') + '</s>';
                }
                html = html + '</div>';
                //convert_currency(el.price,'3');

                html = html + '<a href="javascript:void(0);" onclick="location.href=\'/products/' + el.handle + '\'">view Product</a>';

                html = html + ' </td>';

                if (i >= end_check) {
                    html = html + '</tr>';
                }
                // End product image
            }
            for (i = 0; i <= end_check; i++) {
                var el = data[i];
                var is_sale = false;
                if (el.compare_at_price > el.price) {
                    is_sale = true
                }
                if (i == 0) {
                    html = html + '<tr>';
                    html = html + '<th width="15%" class="product-name" > Product description </th>';

                }
                html = html + '<td width="' + width_tr + '%" class="' + el.handle + ' "> <p class="description-compare"> ' + el.description.replace(/(<([^>]+)>)/ig, "").split(" ").splice(0, 40).join(" ") + "..." + ' </p> </td>';
                if (i >= end_check) {
                    html = html + '<tr>';
                }

            }
            for (i = 0; i <= end_check; i++) {
                var el = data[i];
                var is_sale = false;
                if (el.compare_at_price > el.price) {
                    is_sale = true
                }
                if (i == 0) {
                    html = html + '<tr>';
                    html = html + '<th width="15%" class="product-name" > AVAILABILITY </th>';

                }

                var avai_stock = (el.available) ? 'Available In stock' : 'Unavailable In stock';
                html = html + '<td   width="' + width_tr + '%" class="available-stock ' + el.handle + '"> <p> ' + avai_stock + ' </p> </td>';
                if (i >= end_check) {
                    html = html + '<tr>';
                }

            }
            $(".th-compare").html('<td>Action</td>' + data_html);
            $("#table-compare").html(html);
        }

        function modal_compare() {
            if (!$.isEmptyObject(compare)) {
                // $(".error-compare").hide(20);
                var list_id = '';
                var json_compare = [];
                var check_end = 0;
                var compare_size = (Object.keys(compare).length - 1);
                $.each(compare, function(index, el) {
                    var json_url = "/products/" + el + ".js";
                    if ($.trim(el) != "") {
                        jQuery.getJSON(json_url, function(product) {
                            json_compare[check_end] = product;
                            if (check_end >= compare_size) {
                                compare_to_table(json_compare);
                            }
                            check_end += 1;
                        });

                    }

                });
                $("#moda-compare").fadeIn();
            }

        }
        $(document).on('click', '.compare', function(event) {

            event.preventDefault();
            $(".loading-modal").fadeIn();
            /* Act on the event */
            var $this = $(this);
            var pid = $(this).data('pid');

            compare = storage.get('compare');

            if ($.isEmptyObject(compare)) {
                compare = {};
            }
            var check_compare = true;
            if (Object.keys(compare).length >= total_compare) {
                swal({
                        title: "info",
                        text: "Product Added over 8 product !. Do you want to compare 8 added product ?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#4cae4c",
                        confirmButtonText: "Yes,I want view it!",
                        timer: 3000,
                        cancelButtonText: "Continue",
                        closeOnConfirm: true
                    },
                    function() {

                        modal_compare(compare);

                    });
            } else {
                for (var i = 1; i <= 8; i++) {
                    if (compare['p' + i] == "" || compare['p' + i] == undefined) {
                        compare['p' + i] = pid;
                        break;
                    } else if (compare['p' + i] == pid) {
                        $this.addClass('added');
                        check_compare = false;
                        modal_compare(compare);

                        break;
                    }
                }
                if (check_compare) {
                    storage.set('compare', compare);
                    modal_compare(compare);
                    $this.addClass('add-success');
                    $("[data-pid='" + pid + "']").addClass('added').html('<span class="icon-shuffle"></span>');
                }
            }
            $(".loading-modal").hide(500);
        });

        $(document).on('click', '.remove-compare', function(event) {
            event.preventDefault();
            /* Act on the event */

            var id = $(this).data('handle');
            $("." + id).fadeOut(600).remove();
            $("[data-pid='" + id + "']").removeClass('added add-success').html('<span class="icon-shuffle"></span>');
            $.each(compare, function(index, el) {
                if (el == id) {
                    compare[index] = "";
                    delete compare[index];
                }
            });
            storage.set('compare', compare);

        });

        /** End compare */


        if (!$.isEmptyObject(compare)) {
            $(".error-compare").hide(20);
            var list_id = '';
            var json_compare = [];
            var check_end = 0;
            var compare_size = (Object.keys(compare).length - 1);
            $.each(compare, function(index, el) {
                $("[data-pid='" + el + "']").addClass('added').html('<span class="icon-shuffle"></span>');
                var json_url = "/products/" + el + ".js";
                if ($.trim(el) != "") {
                    jQuery.getJSON(json_url, function(product) {
                        json_compare[check_end] = product;
                        if (check_end >= compare_size) {
                            compare_to_table(json_compare);
                        }
                        check_end += 1;
                    });

                }

            });
        } else {
            $(".error-compare").fadeIn();
        }


    });
})(jQuery);




/**
 * Cookie plugin
 *
 * Copyright (c) 2006 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */

jQuery.cookie = function(b, j, m) {
    if (typeof j != "undefined") {
        m = m || {};
        if (j === null) {
            j = "";
            m.expires = -1
        }
        var e = "";
        if (m.expires && (typeof m.expires == "number" || m.expires.toUTCString)) {
            var f;
            if (typeof m.expires == "number") {
                f = new Date();
                f.setTime(f.getTime() + (m.expires * 24 * 60 * 60 * 1000))
            } else {
                f = m.expires
            }
            e = "; expires=" + f.toUTCString()
        }
        var l = m.path ? "; path=" + (m.path) : "";
        var g = m.domain ? "; domain=" + (m.domain) : "";
        var a = m.secure ? "; secure" : "";
        document.cookie = [b, "=", encodeURIComponent(j), e, l, g, a].join("")
    } else {
        var d = null;
        if (document.cookie && document.cookie != "") {
            var k = document.cookie.split(";");
            for (var h = 0; h < k.length; h++) {
                var c = jQuery.trim(k[h]);
                if (c.substring(0, b.length + 1) == (b + "=")) {
                    d = decodeURIComponent(c.substring(b.length + 1));
                    break
                }
            }
        }
        return d
    }
};

/**
 * Module to show Recently Viewed Products
 *
 * Copyright (c) 2014 Caroline Schnapp (11heavens.com)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */

Shopify.Products = (function() {
    var a = {
        howManyToShow: 3,
        howManyToStoreInMemory: 10,
        wrapperId: "recently-viewed-products",
        templateId: "recently-viewed-product-template",
        onComplete: null
    };
    var c = [];
    var h = null;
    var d = null;
    var e = 0;
    var b = {
        configuration: {
            expires: 90,
            path: "/",
            domain: window.location.hostname
        },
        name: "shopify_recently_viewed",
        write: function(i) {
            jQuery.cookie(this.name, i.join(" "), this.configuration)
        },
        read: function() {
            var i = [];
            var j = jQuery.cookie(this.name);
            if (j !== null) {
                i = j.split(" ")
            }
            return i
        },
        destroy: function() {
            jQuery.cookie(this.name, null, this.configuration)
        },
        remove: function(k) {
            var j = this.read();
            var i = jQuery.inArray(k, j);
            if (i !== -1) {
                j.splice(i, 1);
                this.write(j)
            }
        }
    };
    var f = function() {
        h.show();
        if (a.onComplete) {
            try {
                a.onComplete()
            } catch (i) {}
        }
    };
    var g = function() {
        if (c.length && e < a.howManyToShow) {
            jQuery.ajax({
                dataType: "json",
                url: "/products/" + c[0] + ".js",
                cache: false,
                success: function(i) {
                    d.tmpl(i).appendTo(h);
                    c.shift();
                    e++;
                    g()
                },
                error: function() {
                    b.remove(c[0]);
                    c.shift();
                    g()
                }
            })
        } else {
            f()
        }
    };
    return {
        resizeImage: function(m, j) {
            if (j == null) {
                return m
            }
            if (j == "master") {
                return m.replace(/http(s)?:/, "")
            }
            var i = m.match(/\.(jpg|jpeg|gif|png|bmp|bitmap|tiff|tif)(\?v=\d+)?/i);
            if (i != null) {
                var k = m.split(i[0]);
                var l = i[0];
                return (k[0] + "_" + j + l).replace(/http(s)?:/, "")
            } else {
                return null
            }
        },
        showRecentlyViewed: function(i) {
            var i = i || {};
            jQuery.extend(a, i);
            c = b.read();
            d = jQuery("#" + a.templateId);
            h = jQuery("#" + a.wrapperId);
            a.howManyToShow = Math.min(c.length, a.howManyToShow);
            if (a.howManyToShow && d.length && h.length) {
                g()
            }
        },
        getConfig: function() {
            return a
        },
        clearList: function() {
            b.destroy()
        },
        recordRecentlyViewed: function(l) {
            var l = l || {};
            jQuery.extend(a, l);
            var j = b.read();
            if (window.location.pathname.indexOf("/products/") !== -1) {
                var k = window.location.pathname.match(/\/products\/([a-z0-9\-]+)/)[1];
                var i = jQuery.inArray(k, j);
                if (i === -1) {
                    j.unshift(k);
                    j = j.splice(0, a.howManyToStoreInMemory)
                } else {
                    j.splice(i, 1);
                    j.unshift(k)
                }
                b.write(j)
            }
        }
    }
})();


/*! Lazy Load 2.0.0-rc.2 - MIT license - Copyright 2007-2019 Mika Tuupola */
! function(t, e) {
    "object" == typeof exports ? module.exports = e(t) : "function" == typeof define && define.amd ? define([], e) : t.LazyLoad = e(t)
}("undefined" != typeof global ? global : this.window || this.global, function(t) {
    "use strict";

    function e(t, e) {
        this.settings = s(r, e || {}), this.images = t || document.querySelectorAll(this.settings.selector), this.observer = null, this.init()
    }
    "function" == typeof define && define.amd && (t = window);
    const r = {
            src: "data-src",
            srcset: "data-srcset",
            selector: ".lazyload",
            root: null,
            rootMargin: "0px",
            threshold: 0
        },
        s = function() {
            let t = {},
                e = !1,
                r = 0,
                o = arguments.length;
            "[object Boolean]" === Object.prototype.toString.call(arguments[0]) && (e = arguments[0], r++);
            for (; r < o; r++) ! function(r) {
                for (let o in r) Object.prototype.hasOwnProperty.call(r, o) && (e && "[object Object]" === Object.prototype.toString.call(r[o]) ? t[o] = s(!0, t[o], r[o]) : t[o] = r[o])
            }(arguments[r]);
            return t
        };
    if (e.prototype = {
            init: function() {
                if (!t.IntersectionObserver) return void this.loadImages();
                let e = this,
                    r = {
                        root: this.settings.root,
                        rootMargin: this.settings.rootMargin,
                        threshold: [this.settings.threshold]
                    };
                this.observer = new IntersectionObserver(function(t) {
                    Array.prototype.forEach.call(t, function(t) {
                        if (t.isIntersecting) {
                            e.observer.unobserve(t.target);
                            let r = t.target.getAttribute(e.settings.src),
                                s = t.target.getAttribute(e.settings.srcset);
                            "img" === t.target.tagName.toLowerCase() ? (r && (t.target.src = r), s && (t.target.srcset = s)) : t.target.style.backgroundImage = "url(" + r + ")"
                        }
                    })
                }, r), Array.prototype.forEach.call(this.images, function(t) {
                    e.observer.observe(t)
                })
            },
            loadAndDestroy: function() {
                this.settings && (this.loadImages(), this.destroy())
            },
            loadImages: function() {
                if (!this.settings) return;
                let t = this;
                Array.prototype.forEach.call(this.images, function(e) {
                    let r = e.getAttribute(t.settings.src),
                        s = e.getAttribute(t.settings.srcset);
                    "img" === e.tagName.toLowerCase() ? (r && (e.src = r), s && (e.srcset = s)) : e.style.backgroundImage = "url('" + r + "')"
                })
            },
            destroy: function() {
                this.settings && (this.observer.disconnect(), this.settings = null)
            }
        }, t.lazyload = function(t, r) {
            return new e(t, r)
        }, t.jQuery) {
        const r = t.jQuery;
        r.fn.lazyload = function(t) {
            return t = t || {}, t.attribute = t.attribute || "data-src", new e(r.makeArray(this), t), this
        }
    }
    return e
});