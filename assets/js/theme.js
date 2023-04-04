$(document).on("shopify:section:load", function(e) {
        $("#" + e.target.id).find("[data-section]").sectionJs()
    }).ready(function() {
        $("[data-section]").each(function() {
            $(this).sectionJs()
        })
    }), $.fn.sectionJs = function() {
        var e = this;
        e.data("section") == "SlideShow" ? e.find(".main-slider").SlideShow() : e.data("section") == "TabProduct" ? e.find(".product-slider-init").TabProduct() : e.data("section") == "FeatureCollection" ? e.find(".product-slider-init-2").FeatureCollection() : e.data("section") == "LatestBlog" ? e.find(".blog-init").LatestBlog() : e.data("section") == "BrandLogo" ? e.find(".brand-init").BrandLogo() : e.data("section") == "CategoryProduct" ? e.find(".popular-slider-init").CategoryProduct() : e.data("section") == "FeatureCollection_2" ? e.find(".featured-init").FeatureCollection_2() : e.data("section") == "ListCollection" ? e.find(".product-slider-init-3").ListCollection() : e.data("section") == "Instagram" ? e.InstagramSection() : e.data("section") == "CustomCollection" ? e.find(".product-slider-init-4").CustomCollection() : e.data("section") == "RelatedCollection" ? e.find(".product-slider-init-5").RelatedCollection() : e.data("section") == "single_product" && e.single_product()
    }, $.fn.SlideShow = function() {
        var e = this;
        e.slick({
            speed: 800,
            dots: !0,
            fade: !0,
            arrows: !0,
            prevArrow: '<button class="slick-prev"><i class="ion-chevron-left"></i></button>',
            nextArrow: '<button class="slick-next"><i class="ion-chevron-right"></i></button>',
            responsive: [{
                breakpoint: 767
            }]
        }).slickAnimation()
    }, $.fn.TabProduct = function() {
        var e = this;
        e.slick({
            speed: 1e3,
            dots: !1,
            arrows: !0,
            prevArrow: '<button class="slick-prev"><i class="ion-chevron-left"></i></button>',
            nextArrow: '<button class="slick-next"><i class="ion-chevron-right"></i></button>'
        })
    }, $.fn.FeatureCollection = function() {
        var e = this;
        e.slick({
            speed: 1e3,
            dots: !1,
            arrows: !0,
            prevArrow: '<button class="slick-prev"><i class="ion-chevron-left"></i></button>',
            nextArrow: '<button class="slick-next"><i class="ion-chevron-right"></i></button>'
        })
    }, $.fn.LatestBlog = function() {
        var e = this;
        e.slick({
            speed: 1e3,
            dots: !1,
            arrows: !0,
            prevArrow: '<button class="slick-prev"><i class="ion-chevron-left"></i></button>',
            nextArrow: '<button class="slick-next"><i class="ion-chevron-right"></i></button>'
        })
    }, $.fn.BrandLogo = function() {
        var e = this;
        e.slick({
            speed: 1e3,
            dots: !1,
            arrows: !0,
            prevArrow: '<button class="slick-prev"><i class="ion-chevron-left"></i></button>',
            nextArrow: '<button class="slick-next"><i class="ion-chevron-right"></i></button>'
        })
    }, $.fn.CategoryProduct = function() {
        var e = this;
        e.slick({
            speed: 1e3,
            dots: !0,
            arrows: !1,
            prevArrow: '<button class="slick-prev"><i class="ion-chevron-left"></i></button>',
            nextArrow: '<button class="slick-next"><i class="ion-chevron-right"></i></button>'
        })
    }, $.fn.FeatureCollection_2 = function() {
        var e = this;
        e.slick({
            speed: 1e3,
            dots: !1,
            arrows: !0,
            prevArrow: '<button class="slick-prev"><i class="ion-chevron-left"></i></button>',
            nextArrow: '<button class="slick-next"><i class="ion-chevron-right"></i></button>'
        })
    }, $.fn.ListCollection = function() {
        var e = this;
        e.slick({
            speed: 1e3,
            dots: !1,
            arrows: !0,
            prevArrow: '<button class="slick-prev"><i class="ion-chevron-left"></i></button>',
            nextArrow: '<button class="slick-next"><i class="ion-chevron-right"></i></button>'
        })
    }, $.fn.InstagramSection = function() {
        var e = this.find("[data-username]"),
            i = e.attr("id"),
            o = e.attr("data-username"),
            r = e.attr("data-hashtag"),
            l = e.attr("data-limit"),
            a = e.attr("data-size"),
            c = ".instagram-carousel";
        $.instagramFeed({
            tag: r,
            username: o,
            container: "#" + i,
            display_profile: !1,
            display_biography: !1,
            display_gallery: !0,
            styling: !1,
            items: l,
            margin: 1,
            image_size: a
        })
    }, $.fn.CustomCollection = function() {
        var e = this;
        e.slick({
            speed: 1e3,
            dots: !1,
            arrows: !0,
            prevArrow: '<button class="slick-prev"><i class="ion-chevron-left"></i></button>',
            nextArrow: '<button class="slick-next"><i class="ion-chevron-right"></i></button>'
        })
    }, $.fn.RelatedCollection = function() {
        var e = this;
        e.slick({
            speed: 1e3,
            dots: !1,
            arrows: !0,
            prevArrow: '<button class="slick-prev"><i class="ion-chevron-left"></i></button>',
            nextArrow: '<button class="slick-next"><i class="ion-chevron-right"></i></button>'
        })
    }, $.fn.single_product = function() {
        var e = $(".product-sync-nav");
        e.slick({
            dots: !1,
            infinite: !1,
            arrows: !0,
            speed: 1e3,
            prevArrow: '<button class="slick-prev"><i class="ion-chevron-left"></i></button>',
            nextArrow: '<button class="slick-next"><i class="ion-chevron-right"></i></button>'
        });
        var i = $(".product-large-slider");
        i.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: !0,
            arrows: !0,
            prevArrow: '<button class="slick-next"><i class="ion-chevron-right"></i></button>',
            nextArrow: '<button class="slick-prev"><i class="ion-chevron-left"></i></button>',
            asNavFor: ".pro-nav"
        });
        var o = $(".pro-nav");
        o.slick({
            slidesToShow: 4,
            asNavFor: ".product-large-slider",
            speed: 1e3,
            centerPadding: 0,
            focusOnSelect: !0,
            prevArrow: '<button class="slick-next"><i class="ion-chevron-right"></i></button>',
            nextArrow: '<button class="slick-prev"><i class="ion-chevron-left"></i></button>',
            responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 767,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 575,
                settings: {
                    slidesToShow: 3
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2
                }
            }]
        }), $("img.lazyload").lazyload(), $("#buy-now-check").on("click", function() {
            $(this).parent(".dynmiac_checkout--button").toggleClass("disabled")
        })
    },
    function(e) {
        "use strict";
        jQuery(document).ready(function() {
            var i = e(".search-toggle"),
                o = e(".scale"),
                r = e(".searching button"),
                l = e("body"),
                a = o.add(r);
            i.length > 0 && i.on("click", function() {
                return l.toggleClass("open"), !1
            }), a.length > 0 && a.on("click", function() {
                return l.removeClass("open"), !1
            }), e(".close").on("click", function() {
                e("body").removeClass("open")
            });
            var c = e(window),
                d = e("body");
            e(c).on("scroll", function() {
                var t = e(c).scrollTop();
                t < 150 ? e("#sticky").removeClass("is-isticky") : e("#sticky").addClass("is-isticky")
            });
            var v = e(".offcanvas-toggle"),
                p = e(".offcanvas"),
                f = e(".offcanvas-overlay"),
                g = e(".mobile-menu-toggle");
            v.on("click", function(t) {
                t.preventDefault();
                var n = e(this),
                    u = n.attr("href");
                d.addClass("offcanvas-open"), e(u).addClass("offcanvas-open"), f.fadeIn(), n.parent().hasClass("mobile-menu-toggle") && n.addClass("close")
            }), e(".offcanvas-close, .offcanvas-overlay").on("click", function(t) {
                t.preventDefault(), d.removeClass("offcanvas-open"), p.removeClass("offcanvas-open"), f.fadeOut(), g.find("a").removeClass("close")
            });

            function h() {
                var t = e(".offcanvas-menu, .overlay-menu"),
                    n = t.find(".offcanvas-submenu");
                n.parent().prepend('<span class="menu-expand"></span>'), t.on("click", "li a, .menu-expand", function(u) {
                    var s = e(this);
                    (s.attr("href") === "#" || s.hasClass("menu-expand")) && (u.preventDefault(), s.siblings("ul:visible").length ? (s.parent("li").removeClass("active"), s.siblings("ul").slideUp(), s.parent("li").find("li").removeClass("active"), s.parent("li").find("ul:visible").slideUp()) : (s.parent("li").addClass("active"), s.closest("li").siblings("li").removeClass("active").find("li").removeClass("active"), s.closest("li").siblings("li").find("ul:visible").slideUp(), s.siblings("ul").slideDown()))
                })
            }
            h();
            var b = e("#offcanvas-menu2 li a");
            b.on("click", function(t) {
                e(this).closest("li").toggleClass("active"), e(this).closest("li").siblings().removeClass("active"), e(this).closest("li").siblings().children(".category-sub-menu").slideUp(), e(this).closest("li").siblings().children(".category-sub-menu").children("li").toggleClass("active"), e(this).closest("li").siblings().children(".category-sub-menu").children("li").removeClass("active"), e(this).parent().children(".category-sub-menu").slideToggle()
            }), e('a[data-toggle="pill"]').on("shown.bs.tab", function(t) {
                t.target, t.relatedTarget, e(".slick-slider").slick("setPosition")
            }), e(".modal").on("shown.bs.modal", function(t) {
                e(".slick-slider").slick("setPosition")
            }), e("#write-comment").on("click", function(t) {
                t.preventDefault(), e("html, body").animate({
                    scrollTop: e(".btn-dark ").offset().top + 750
                }, 500, "linear")
            }), e.scrollUp({
                scrollName: "scrollUp",
                scrollDistance: 400,
                scrollFrom: "top",
                scrollSpeed: 800,
                easingType: "linear",
                animation: "fade",
                animationSpeed: 400,
                scrollTrigger: !1,
                scrollTarget: !1,
                scrollText: '<i class="fa fa-arrow-up"></i>',
                scrollTitle: !1,
                scrollImg: !1,
                activeOverlay: !1,
                zIndex: 214
            }), e(".product-color li label").click(function() {
                var t = jQuery(this).parent().find(".hidden a").attr("href");
                return jQuery(this).parents(".product-wrapper").find(".popup_cart_image").attr({
                    src: t
                }), !1
            })
        })
    }(jQuery);
//# sourceMappingURL=/s/files/1/0016/9626/8348/t/8/assets/theme.js.map?v=157086564405513351031636534455