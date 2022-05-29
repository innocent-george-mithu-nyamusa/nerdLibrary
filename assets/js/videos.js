"use strict";
/*! videos.js | Friendkit | © Css Ninja. 2019-2020 */
$(document).ready((function () {
    if ($(".videos-sidebar").length) {
        var e = function () {
            window.matchMedia("(max-width: 767px)").matches || window.matchMedia("(max-width: 768px)").matches ? $(".videos-sidebar").removeClass("is-active") : $(".videos-sidebar").addClass("is-active")
        };
        $(".mobile-sidebar-trigger").on("click", (function () {
            $(".videos-sidebar").addClass("is-active")
        })), $(".close-videos-sidebar").on("click", (function () {
            $(this).closest(".videos-sidebar").removeClass("is-active")
        })), e(), $(window).on("resize", (function () {
            e()
        }))
    }$(".search-button-initiate-focus").on("click", function (){
        $("#open-mobile-search, .mobile-search .close-icon").click();
    });$(".related-side").length && ($(".related-trigger").on("click", (function () {
        $(".related-side").addClass("is-opened")
    })), $(".close-related-videos").on("click", (function () {
        $(".related-side").removeClass("is-opened")
    }))), $(".videos-wrapper.is-home").length && $(".video-header-wrap").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: !0,
        autoplay: !0,
        autoplaySpeed: 8e3,
        fade: !0,
        dots: !0,
        pauseOnFocus: !0,
        arrows: !1,
        prevArrow: "<div class='slick-custom is-prev'><i class='fa fa-chevron-left'></i></div>",
        nextArrow: "<div class='slick-custom is-next'><i class='fa fa-chevron-right'></i></div>"
    }), $(".videos-wrapper.has-player").length && ($("#description-show-more").on("click", (function () {
        $(".additional-description").slideToggle("fast"), "Show More" == $(this).text() ? $(this).html("Show Less") : $(this).html("Show More")
    })), $(".nested-replies .header").on("click", (function () {
        $(this).toggleClass("is-active"), $(this).siblings(".nested-comments").slideToggle("fast")
    })))

    $("#enrollment-btn,#enrollment-btn-1,#enrollment-btn-2").click(function () {
        var courserId = $("#enrollment-btn").attr("value");
        var firstLecture = $("#enrollment-btn").attr("cust-first-lecture")
        var button = $(this);

        $.ajax({
            url: "/includes/enrollCourse.php",
            method: "post",
            data: {courseId: courserId},
            dataType: "text",
            failed: function () {
                console.log("Failed to unfollow user")
            },
            success: function (data) {
                if (firstLecture !== 0) {
                    button.attr("href", "../watch/" + firstLecture);
                }
            },
        });

    });

    $("#add-comment-btn").on("click", function (e) {
        e.preventDefault();

        var commentData = $("#comment-content").val();
        var episodeId = $("#comment-content").data("episode-id");
        $("#comment-content").val("")

        $.ajax({
            url: "/includes/addComment.php",
            method: "post",
            data: {
                commentContent: commentData,
                episodeId: episodeId
            },
            dataType: "text",
            failed: function () {
                console.log("Failed to unfollow user")
            },
            success: function (data) {

                $("#comment-parent").after(`${data}`);
            },
        });

    });

    $(".like-episode").on("click", function () {
        var id = $(this).data("item-id"), itemOwner = $(this).data("episode-owner");

        $.ajax({
            url: "/includes/updateSpecialResources.php",
            method: "post",
            data: {
                episodeLikeState: "like",
                itemId: id,
                itemOwner: itemOwner
            },
            dataType: "text",
            failed: function () {
                console.log("Failed to like episode");
            },
            success: function (data) {
                if(data == 1) {
                    toasts.service.success("", "mdi mdi-thumb-up", "Liked Episode", "bottomRight", 2000);
                }
            },
        });

    });

    $(".dislike-episode").on("click", function () {
        var id = $(this).data("item-id"), itemOwner = $(this).data("episode-owner");

        $.ajax({
            url: "/includes/updateSpecialResources.php",
            method: "post",
            data: {
                episodeLikeState: "dislike",
                itemId: id,
                itemOwner: itemOwner
            },
            dataType: "text",
            failed: function () {
                console.log("Failed to dislike episode");
            },
            success: function (data) {
                if(data == 2) {
                    toasts.service.error("", "mdi mdi-thumb-down", "Disliked Episode", "bottomRight", 2000);
                }
            },
        });

    });

    $(".favorite-episode").on("click", function () {
        var id = $(this).data("item-id"), itemOwner = $(this).data("episode-owner");

        $.ajax({
            url: "/includes/updateSpecialResources.php",
            method: "post",
            data: {
                episodeLikeState: "favorite",
                itemId: id,
                itemOwner: itemOwner
            },
            dataType: "text",
            failed: function () {
                console.log("Failed to favorite episode");
            },
            success: function (data) {
                if(data == 1) {
                    toasts.service.success("", "mdi mdi-heart", "Favorite Episode", "bottomRight", 2000);
                }
            },
        });

    });

    $(".watch-later").on("click", function () {
        var id = $(this).data("item-id"), itemOwner = $(this).data("episode-owner");

        $.ajax({
            url: "/includes/updateSpecialResources.php",
            method: "post",
            data: {
                episodeLikeState: "watch-later",
                itemId: id,
                itemOwner: itemOwner
            },
            dataType: "text",
            failed: function () {
                console.log("Failed to unfollow user");
            },
            success: function (data) {
                if(data == 1) {
                    toasts.service.info("", "mdi mdi-watch", "Saved to Watch Later", "bottomRight", 2000);
                }
            },
        });

    });

    $("#video-episode").on("ended", function () {
        var id = $(this).data("episode-id");

        $.ajax({
            url: "/includes/recordCompletion.php",
            method: "post",
            data: {episodeId: id},
            dataType: "text",
            failed: function () {
                console.log("Failed to unfollow user");
            },
            success: function (data) {
                // console.log("stuff "+ data)
                console.log(data);
            },
        });

    });

    $(".add-subscription").length && $(".add-subscription").on("click", function () {

        var subscription = $(this).data("subscription"), subscriberId = $(this).data("subscriber-id"), successUrl = $(this).data("success-url");

        $.ajax({
            url: "/includes/updateSpecialResources.php",
            method: "post",
            data: {
                addSubscription: "addSubscription",
                subscriberId: subscriberId,
                subscription: subscription
            },
            dataType: "text",
            failed: function () {
                console.log("Failed to unfollow user");
            },
            success: function (data) {
                if(data == 1) {
                    toasts.service.success("", "mdi mdi-info", "Subscription Update Request sent", "bottomRight", 3000);
                    setTimeout(function (){
                        window.location = `${successUrl}`;
                    }, 4000);
                }else {
                    toasts.service.error("", "mdi mdi-frown", "Retry! Failed to create new subscription", "bottomRight", 1000);
                }
            },
        });

    });


    $("#setting-allow-autoplay").on("change", function () {
        var setting = $(this).data("setting-value");
        $.ajax({
            url: "/includes/updateSecuritySettings.php",
            method: "post",
            data: {settingAutoPlayValue: setting},
            dataType: "text",
            failed: function () {
            },
            success: function (data) {
                toasts.service.info("", "mdi mdi-info", "Autoplay Setting Saved", "bottomRight", 2000);
            },
        })
    });

}));