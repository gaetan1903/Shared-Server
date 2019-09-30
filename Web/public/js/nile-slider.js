function setREVStartSize(e) {
    try {
        e.c = jQuery(e.c);
        var i = jQuery(window).width(),
            t = 9999,
            r = 0,
            n = 0,
            l = 0,
            f = 0,
            s = 0,
            h = 0;
        if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function (e, f) {
                f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
            }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
            var u = (e.c.width(), jQuery(window).height());
            if (void 0 != e.fullScreenOffsetContainer) {
                var c = e.fullScreenOffsetContainer.split(",");
                if (c) jQuery.each(c, function (e, i) {
                    u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
            }
            f = u
        } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
        e.c.closest(".rev_slider_wrapper").css({
            height: f
        })
    } catch (d) {
        console.log("Failure at Presize of Slider:" + d)
    }
};


var revapi3,
    tpj;
(function () {
    if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
    else onLoad();

    function onLoad() {
        if (tpj === undefined) {
            tpj = jQuery;
            if ("off" == "on") tpj.noConflict();
        }
        if (tpj("#rev_slider_3_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_3_1");
        } else {
            revapi3 = tpj("#rev_slider_3_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "//localhost/slider/revslider/public/assets/js/",
                sliderLayout: "fullwidth",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    onHoverStop: "off",
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1120, 1024, 778, 480],
                gridheight: [868, 768, 960, 720],
                lazyType: "none",
                shadow: 0,
                spinner: "spinner0",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }; /* END OF revapi call */
    }; /* END OF ON LOAD FUNCTION */
}()); /* END OF WRAPPING FUNCTION */

var revapi4,
    tpj;
(function () {
    if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
    else onLoad();

    function onLoad() {
        if (tpj === undefined) {
            tpj = jQuery;
            if ("off" == "on") tpj.noConflict();
        }
        if (tpj("#rev_slider_4_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_4_1");
        } else {
            revapi4 = tpj("#rev_slider_4_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "//localhost/slider/revslider/public/assets/js/",
                sliderLayout: "fullwidth",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    onHoverStop: "off",
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1100, 1024, 778, 480],
                gridheight: [680, 668, 660, 620],
                lazyType: "none",
                shadow: 0,
                spinner: "spinner0",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }; /* END OF revapi call */
    }; /* END OF ON LOAD FUNCTION */
}()); /* END OF WRAPPING FUNCTION */


var revapi5,
    tpj;
(function () {
    if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
    else onLoad();

    function onLoad() {
        if (tpj === undefined) {
            tpj = jQuery;
            if ("off" == "on") tpj.noConflict();
        }
        if (tpj("#rev_slider_5_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_5_1");
        } else {
            revapi5 = tpj("#rev_slider_5_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "//localhost/slider/revslider/public/assets/js/",
                sliderLayout: "fullwidth",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    onHoverStop: "off",
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1100, 1024, 778, 480],
                gridheight: [550, 600, 600, 600],
                lazyType: "none",
                shadow: 0,
                spinner: "spinner0",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }; /* END OF revapi call */
    }; /* END OF ON LOAD FUNCTION */
}()); /* END OF WRAPPING FUNCTION */


var revapi6,
    tpj;
(function () {
    if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
    else onLoad();

    function onLoad() {
        if (tpj === undefined) {
            tpj = jQuery;
            if ("off" == "on") tpj.noConflict();
        }
        if (tpj("#rev_slider_6_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_6_1");
        } else {
            revapi6 = tpj("#rev_slider_6_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "//localhost/slider/revslider/public/assets/js/",
                sliderLayout: "fullwidth",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    onHoverStop: "off",
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1120, 1024, 778, 480],
                gridheight: [700, 700, 700, 700],
                lazyType: "none",
                shadow: 0,
                spinner: "spinner0",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }; /* END OF revapi call */
    }; /* END OF ON LOAD FUNCTION */
}()); /* END OF WRAPPING FUNCTION */


var revapi7,
    tpj;
(function () {
    if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
    else onLoad();

    function onLoad() {
        if (tpj === undefined) {
            tpj = jQuery;
            if ("off" == "on") tpj.noConflict();
        }
        if (tpj("#rev_slider_7_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_7_1");
        } else {
            revapi7 = tpj("#rev_slider_7_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "//localhost/slider/revslider/public/assets/js/",
                sliderLayout: "fullwidth",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    onHoverStop: "off",
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1120, 1024, 778, 480],
                gridheight: [550, 600, 600, 600],
                lazyType: "none",
                shadow: 0,
                spinner: "spinner0",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }; /* END OF revapi call */
    }; /* END OF ON LOAD FUNCTION */
}()); /* END OF WRAPPING FUNCTION */


var revapi8,
    tpj;
(function () {
    if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
    else onLoad();

    function onLoad() {
        if (tpj === undefined) {
            tpj = jQuery;
            if ("off" == "on") tpj.noConflict();
        }
        if (tpj("#rev_slider_8_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_8_1");
        } else {
            revapi8 = tpj("#rev_slider_8_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "//localhost/slider/revslider/public/assets/js/",
                sliderLayout: "fullwidth",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    onHoverStop: "off",
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1120, 1024, 778, 480],
                gridheight: [868, 768, 960, 720],
                lazyType: "none",
                shadow: 0,
                spinner: "spinner0",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }; /* END OF revapi call */
    }; /* END OF ON LOAD FUNCTION */
}()); /* END OF WRAPPING FUNCTION */





var revapi10,
    tpj;
(function () {
    if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
    else onLoad();

    function onLoad() {
        if (tpj === undefined) {
            tpj = jQuery;
            if ("off" == "on") tpj.noConflict();
        }
        if (tpj("#rev_slider_10_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_10_1");
        } else {
            revapi10 = tpj("#rev_slider_10_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "//localhost/slider/revslider/public/assets/js/",
                sliderLayout: "fullwidth",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    onHoverStop: "off",
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1014, 1024, 778, 480],
                gridheight: [868, 768, 960, 720],
                lazyType: "none",
                shadow: 0,
                spinner: "spinner0",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }; /* END OF revapi call */
    }; /* END OF ON LOAD FUNCTION */
}()); /* END OF WRAPPING FUNCTION */
