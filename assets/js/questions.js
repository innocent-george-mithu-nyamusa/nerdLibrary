"use strict";
/*! questions.js | Friendkit | © Css Ninja. 2019-2020 */
$(document).ready((function () {
    var allMyInterests = [];
    if ($(".questions-menu, .questions-nav-menu").length) {
        var s = window.location.href;
        "" == (s = (s = (s = s.substring(0, -1 == s.indexOf("#") ? s.length : s.indexOf("#"))).substring(0, -1 == s.indexOf("?") ? s.length : s.indexOf("?"))).substr(s.lastIndexOf("/") + 1)) && (s = "index.php"), $(".questions-menu li a").each((function () {
            var e = $(this).attr("href");
            s == e && $(this).closest("li").addClass("is-active")
        })), $(".questions-nav-menu .menu-item").each((function () {
            var e = $(this).attr("href");
            s == e && $(this).addClass("is-active")
        }))
    }
    $(".questions-nav").length && $(window).scroll((function () {
        $(window).scrollTop() > 160 ? $(".questions-nav").addClass("is-active") : $(".questions-nav").removeClass("is-active")
    })), $(".questions-menu").length && $(window).scroll((function () {
        $(window).scrollTop() > 450 ? $(".questions-menu-fixed").addClass("is-faded") : $(".questions-menu-fixed").removeClass("is-faded")
    })), $(".question-tabs").length && $(".question-tabs ul li").on("click", (function () {
        $(this).siblings("li").removeClass("is-active"), $(this).addClass("is-active")
    })), $(".achievements-loader").length && setTimeout((function () {
        $(".achievements-loader").removeClass("is-active")
    }), 4e3), $(".achievements-carousel").length && $(".achievements-carousel").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: !0,
        autoplay: !0,
        centerMode: !0,
        centerPadding: "0",
        arrows: !1,
        prevArrow: "<div class='slick-custom is-prev'><i class='fa fa-chevron-left'></i></div>",
        nextArrow: "<div class='slick-custom is-next'><i class='fa fa-chevron-right'></i></div>",
        responsive: [{breakpoint: 1600, settings: {slidesToShow: 3}}, {
            breakpoint: 1300,
            settings: {slidesToShow: 2}
        }, {breakpoint: 1130, settings: {slidesToShow: 2}}, {
            breakpoint: 768,
            settings: {slidesToShow: 2}
        }, {breakpoint: 767, settings: {slidesToShow: 1}}]
    }), $(".questions-settings").length && $(".switch-block .f-switch input").on("change", (function () {
        toasts.service.info("", "mdi mdi-progress-check", "Settings saved successfully", "bottomRight", 2500)
    })), $(".select-category").on("click", function () {
        var catName = $(this).data("category-name");

        (allMyInterests.indexOf($(this).data("category-id")) == -1) ? (allMyInterests.push($(this).data("category-id")), toasts.service.info("", "mdi mdi-progress-check", `${catName} Selected Successfully`, "bottomRight", 2500)) : toasts.service.error("", "mdi mdi-progress-check", `${catName} Already Selected `, "bottomRight", 2500);


    }), $(".enter-app").length && $(".enter-app").on("click", function (){
            var url = $(this).data("url");

            console.log(allMyInterests.length);

            if(allMyInterests.length < 6) {
                toasts.service.error("Please select at least 7 categories", "mdi mdi-thumb-down", "", "bottomRight", 2500)

            }else {
                $.ajax({
                    url: "/includes/recordMyInterests.php",
                    method: "post",
                    data: {
                        userData: allMyInterests.toString(),
                    },
                    dataType: "text",
                    failed: function () {
                        console.log("failed to send like item information");
                    },
                    success: function (response) {
                        console.log(response);
                        if (response == 1) {
                            toasts.service.info("Saved: successfully added all interest", "mdi mdi-thumb-up", "", "bottomRight", 2500)
                            setTimeout((function () {
                                // TODO:: FIX THIS ROUTE
                                window.location = `${url}`
                            }), 1000)

                        }
                    },
                });
            }
            allMyInterests = [];
    });
}));