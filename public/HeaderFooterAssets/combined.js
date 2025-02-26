/*
 * Bootstrap v3.4.1 (https://getbootstrap.com/)
 * Copyright 2011-2019 Twitter, Inc.
 * Licensed under the MIT license
 *
 * Updated 07/28/2021 by Vizergy for popover fix. Replaced
 * var n=window.SVGElement&&e instanceof window.SVGElement
 * with
 * var n=false
 * https://stackoverflow.com/questions/42315216/bootstrap-tooltip-wrong-position-on-svg-element-when-page-is-scrolled-down
 */
if ("undefined" == typeof jQuery) {
    throw new Error("Bootstrap's JavaScript requires jQuery")
}

$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
        $("body").addClass("scrolled").removeClass("notScrolled")
    } else {
        $("body").removeClass("scrolled").addClass("notScrolled")
    }
});

$(document).ready(function () {
    $("#myModal .bookingWidget").show();
    $("#myModal").detach().appendTo("#contentShell");
    $("#myModal").on("shown.bs.modal", function () {
        $(".checkinControlGroup input").focus();
        $.trapKeyboard(".bookingModal")
    });
    $("#myModal").on("hidden.bs.modal", function () {
        $.untrapKeyboard()
    });
    $(".bookingWidget label small").contents().unwrap();
    $(".bookingWidget .submitControlGroup button").removeClass("btn-primary").addClass("btn-default");
    $(function () {
        $(".bookingWidget #checkinField").attr("placeholder", "ARRIVAL");
        $(".bookingWidget #checkoutField").attr("placeholder", "DEPARTURE");
        $(".bookingWidget #adultsField").prepend('<option selected value="">ADULTS</option>');
        $(".bookingWidget #childrenField").prepend('<option selected value="">KIDS</option>')
    });
    var mainNavLinks = $("#mainNavLinks");
    mainNavLinks.show();
    mainNavLinks.addClass("nav navbar-nav");
    mainNavLinks.find("ul").addClass("dropdown-menu fadeout");
    mainNavLinks.find("li.parent").addClass("dropdown");
    mainNavLinks.find("li.dropdown > a").addClass("dropdown-toggle");
    mainNavLinks.find("> li.dropdown > a.dropdown-toggle").after('<button><span class="far fa-plus visible-xs visible-sm" aria-hidden="true"></span><span class="fal fa-angle-down hidden-xs hidden-sm" aria-hidden="true"></span><span class="sr-only">open sub menu</span></button>');
    mainNavLinks.find("> li.dropdown .dropdown-menu a.dropdown-toggle").after('<button><span class="far fa-plus visible-xs visible-sm" aria-hidden="true"></span><span class="fal fa-angle-right hidden-xs hidden-sm" aria-hidden="true"></span><span class="sr-only">open sub menu</span></button>');
    mainNavLinks.find(".dropdown > button").each(function () {
        $(this).on("click", function () {
            $(this).next().addClass("fadein")
        })
    });
    $("#mainNavLinks .dropdown-menu .lastItem").focusout(function () {
        $(this).parent().removeClass("fadein").addClass("fadeout")
    });
    $("#mainNavLinks li.dropdown").hover(function () {
        if (!$("#mainNavigation .navbar-toggle").is(":visible")) {
            $(this).find("> .dropdown-menu").removeClass("fadeout").addClass("fadein")
        }
    }, function () {
        if (!$("#mainNavigation .navbar-toggle").is(":visible")) {
            $(this).find("> .dropdown-menu").removeClass("fadein").addClass("fadeout")
        }
    });
    mainNavLinks.find(".parent > button").click(function (e) {
        var thisBtn = $(this);
        if ($("#mainNavigation .navbar-toggle").is(":visible")) {
            e.preventDefault();
            if (thisBtn.next().hasClass("fadeout")) {
                if (thisBtn.parent().parent().attr("id") == "mainNavLinks") {
                    mainNavLinks.find(".parent > button > span:first-child").removeClass("fa-minus").addClass("fa-plus");
                    mainNavLinks.find(".dropdown-menu").removeClass("fadein").addClass("fadeout")
                } else {
                    thisBtn.parent().siblings().find(" > button > span:first-child").removeClass("fa-minus").addClass("fa-plus");
                    thisBtn.parent().siblings().find(".dropdown-menu").removeClass("fadein").addClass("fadeout")
                }
                thisBtn.next().removeClass("fadeout").addClass("fadein");
                thisBtn.find("> span:first-child").removeClass("fa-plus").addClass("fa-minus")
            } else {
                thisBtn.find("> span:first-child").removeClass("fa-minus").addClass("fa-plus");
                thisBtn.next().removeClass("fadein").addClass("fadeout")
            }
        }
    });
});

/*
     jQuery LazyLoadAnything - 2013-03-04
     (c) 2013 Shawn Welch http://shrimpwagon.wordpress.com/jquery-lazyloadanything
     license: http://www.opensource.org/licenses/mit-license.php

     Last updated 08/24/2016 by Kyle Peterson for Vizergy
*/
(function ($) {
    var $listenTo;
    var force_load_flag = false;
    var methods = {
        init: function (options) {
            var defaults = {
                auto: true,
                cache: false,
                timeout: 1000,
                includeMargin: false,
                viewportMargin: 0,
                repeatLoad: false,
                listenTo: window,
                onLoadingStart: function (e, llelements, indexes) {
                    return true
                },
                onLoad: function (e, llelement) {
                    return true
                },
                onLoadingComplete: function (e, llelements, indexes) {
                    return true
                }
            };
            var settings = $.extend({}, defaults, options);
            $listenTo = $(settings.listenTo);
            var timeout = 0;
            var llelements = [];
            var $selector = this;
            $listenTo.bind("scroll.lla", function (e) {
                if (!force_load_flag && !settings.auto) {
                    return false
                }
                force_load_flag = false;
                clearTimeout(timeout);
                timeout = setTimeout(function () {
                    var viewport_left = $listenTo.scrollLeft();
                    var viewport_top = $listenTo.scrollTop();
                    var viewport_width = $listenTo.innerWidth();
                    var viewport_height = $listenTo.innerHeight();
                    var viewport_x1 = viewport_left - settings.viewportMargin;
                    var viewport_x2 = viewport_left + viewport_width + settings.viewportMargin;
                    var viewport_y1 = viewport_top - settings.viewportMargin;
                    var viewport_y2 = viewport_top + viewport_height + settings.viewportMargin;
                    var load_elements = [];
                    var i, llelem_top, llelem_bottom;
                    for (i = 0; i < llelements.length; i++) {
                        llelem_x1 = llelements[i].getLeft();
                        llelem_x2 = llelements[i].getRight();
                        llelem_y1 = llelements[i].getTop();
                        llelem_y2 = llelements[i].getBottom();
                        if (llelements[i].$element.is(":visible")) {
                            if ((viewport_x1 < llelem_x2) && (viewport_x2 > llelem_x1) && (viewport_y1 < llelem_y2) && (viewport_y2 > llelem_y1)) {
                                if (settings.repeatLoad || !llelements[i].loaded) {
                                    load_elements.push(i)
                                }
                            }
                        }
                    }
                    if (settings.onLoadingStart.call(undefined, e, llelements, load_elements)) {
                        for (i = 0; i < load_elements.length; i++) {
                            llelements[load_elements[i]].loaded = true;
                            if (settings.onLoad.call(undefined, e, llelements[load_elements[i]]) === false) {
                                break
                            }
                        }
                        settings.onLoadingComplete.call(undefined, e, llelements, load_elements)
                    }
                }, settings.timeout)
            });

            function LazyLoadElement($element) {
                var self = this;
                this.loaded = false;
                this.$element = $element;
                this.top = undefined;
                this.bottom = undefined;
                this.left = undefined;
                this.right = undefined;
                this.getTop = function () {
                    if (self.top) {
                        return self.top
                    }
                    return self.$element.offset().top
                };
                this.getBottom = function () {
                    if (self.bottom) {
                        return self.bottom
                    }
                    var top = (self.top) ? self.top : this.getTop();
                    return top + self.$element.outerHeight(settings.includeMargin)
                };
                this.getLeft = function () {
                    if (self.left) {
                        return self.left
                    }
                    return self.$element.offset().left
                };
                this.getRight = function () {
                    if (self.right) {
                        return self.right
                    }
                    var left = (self.left) ? self.left : this.getLeft();
                    return left + self.$element.outerWidth(settings.includeMargin)
                };
                if (settings.cache) {
                    this.top = this.getTop();
                    this.bottom = this.getBottom();
                    this.left = this.getLeft();
                    this.right = this.getRight()
                }
            }

            var chain = $selector.each(function () {
                llelements.push(new LazyLoadElement($(this)))
            });
            return chain
        }, destroy: function () {
            $listenTo.unbind("scroll.lla")
        }, load: function () {
            if (typeof ($listenTo) != "undefined") {
                force_load_flag = true;
                $listenTo.trigger("scroll.lla")
            }
        }
    };
    $.fn.lazyloadanything = function (method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1))
        } else {
            if (typeof method === "object" || !method) {
                return methods.init.apply(this, arguments)
            } else {
                $.error("Method " + method + " does not exist on jQuery.lazyloadanything")
            }
        }
    }
})(jQuery);/* Combined JS End */
