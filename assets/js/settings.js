/*! settings.js | Friendkit | © Css Ninja. 2019-2020 */
"use strict";
$(document).ready((function () {

    function validateNumber(number) {

        const re = /2637[7-8|1|3][0-9]{7}$/;
        if (re.test(number)) {
            return true;
        }
        return false
    }

    if ($(".settings-wrapper").length) {
        if ($(".settings-sidebar").length) {
            var t = function () {
                window.matchMedia("(max-width: 767px)").matches || window.matchMedia("(max-width: 768px)").matches ? $(".settings-sidebar").removeClass("is-active") : $(".settings-sidebar").addClass("is-active")
            };
            $(".mobile-sidebar-trigger").on("click", (function () {
                $(".settings-sidebar").addClass("is-active")
            })), $(".close-settings-sidebar").on("click", (function () {
                $(this).closest(".settings-sidebar").removeClass("is-active")
            })), t(), $(window).on("resize", (function () {
                t()
            }))
        }
        $("#back-to-general").on("click", function () {
            $("#general-list-tag").click();
        })


        if ($(".settings-sidebar .menu-block li, #advanced-option-button").on("click", (function () {
            var t = $(this).attr("data-section");

            t == "advanced" ? 1 : $(".settings-sidebar .menu-block li").removeClass("is-active") , $(this).addClass("is-active"),
                $(".settings-wrapper .settings-section, .tip-group").removeClass("is-active"), $("#" + t + "-settings").addClass("is-active"), $("#" + t + "-tips").addClass("is-active")
        })), $("#country-autocpl").length) {
            // TODO::CHANGE THIS URL
            var s = {
                url: "/assets/data/api/countries/countries.json",
                getValue: "name",
                template: {
                    type: "custom", method: function (t, s) {
                        return "<div class=template-wrapper><div class=avatar-wrapper><img class=autocpl-avatar src='" + s.pic + "' /></div><div class=entry-text>" + t + "<br><span>" + s.code + "</span></div></div> "
                    }
                },
                highlightPhrase: !1,
                list: {
                    maxNumberOfElements: 3, showAnimation: {
                        type: "fade", time: 400, callback: function () {
                        }
                    }, match: {enabled: !0}, onChooseEvent: function () {
                        $("#country-autocpl").val()
                    }
                }
            };
            $("#country-autocpl").easyAutocomplete(s)
        }

        $("#save-general-settings").on("click", function (e) {
            e.preventDefault();

            $.ajax({
                url: "/includes/updateGeneralUserDetails.php",
                method: "post",
                data: $("#general-settings-form").serialize(),
                dataType: "text",
                failed: function () {
                    iziToast.show({
                        maxWidth: "280px",
                        class: "success-toast",
                        icon: "mdi mdi-bell-off",
                        title: "",
                        message: `Failed to update information`,
                        titleColor: "#fff",
                        messageColor: "#fff",
                        iconColor: "#fff",
                        backgroundColor: "#7F00FF",
                        progressBarColor: "#b975ff",
                        position: "bottomRight",
                        transitionIn: "fadeInUp",
                        close: !1,
                        timeout: 2500,
                        zindex: 99999
                    })
                },
                success: function (data) {
                    if (data == 1) {
                        iziToast.show({
                            maxWidth: "280px",
                            class: "success-toast",
                            icon: "mdi mdi-bell-ring",
                            title: "",
                            message: "You successfully updated your details",
                            titleColor: "#fff",
                            messageColor: "#fff",
                            iconColor: "#fff",
                            backgroundColor: "#7F00FF",
                            progressBarColor: "#b975ff",
                            position: "bottomRight",
                            transitionIn: "fadeInUp",
                            close: !1,
                            timeout: 2500,
                            zindex: 99999
                        })
                    } else {
                        iziToast.show({
                            maxWidth: "280px",
                            class: "success-toast",
                            icon: "mdi mdi-bell-off",
                            title: "",
                            message: `Failed to update your details`,
                            titleColor: "#fff",
                            messageColor: "#fff",
                            iconColor: "#fff",
                            backgroundColor: "#7F00FF",
                            progressBarColor: "#b975ff",
                            position: "bottomRight",
                            transitionIn: "fadeInUp",
                            close: !1,
                            timeout: 2500,
                            zindex: 99999
                        })
                    }
                },
            })
        })

        $("#save-advanced-settings").on("click", function (e) {
            e.preventDefault();

            $.ajax({
                url: "/includes/updateAdvancedUserDetails.php",
                method: "post",
                data: $("#advanced-settings-form").serialize(),
                dataType: "text",
                failed: function () {
                    iziToast.show({
                        maxWidth: "280px",
                        class: "success-toast",
                        icon: "mdi mdi-bell-off",
                        title: "",
                        message: `Failed to update information`,
                        titleColor: "#fff",
                        messageColor: "#fff",
                        iconColor: "#fff",
                        backgroundColor: "#7F00FF",
                        progressBarColor: "#b975ff",
                        position: "bottomRight",
                        transitionIn: "fadeInUp",
                        close: !1,
                        timeout: 2500,
                        zindex: 99999
                    })
                },
                success: function (data) {
                    if (data == 1) {
                        iziToast.show({
                            maxWidth: "280px",
                            class: "success-toast",
                            icon: "mdi mdi-bell-ring",
                            title: "",
                            message: "You successfully updated your details",
                            titleColor: "#fff",
                            messageColor: "#fff",
                            iconColor: "#fff",
                            backgroundColor: "#7F00FF",
                            progressBarColor: "#b975ff",
                            position: "bottomRight",
                            transitionIn: "fadeInUp",
                            close: !1,
                            timeout: 2500,
                            zindex: 99999
                        })
                    } else {
                        iziToast.show({
                            maxWidth: "280px",
                            class: "success-toast",
                            icon: "mdi mdi-bell-off",
                            title: "",
                            message: `Failed to update your details`,
                            titleColor: "#fff",
                            messageColor: "#fff",
                            iconColor: "#fff",
                            backgroundColor: "#7F00FF",
                            progressBarColor: "#b975ff",
                            position: "bottomRight",
                            transitionIn: "fadeInUp",
                            close: !1,
                            timeout: 2500,
                            zindex: 99999
                        })
                    }
                },
            })
        })

        $("#confirm-password").change(function () {
            var confirmPass = $(this).val();
            var password = $("#password").val();

            if (confirmPass !== "") {
                if (confirmPass !== password) {
                    $("#save-button").attr({
                        disabled: "true",
                    });
                    $(".password-control").addClass("has-error");
                    // $("#re-password").addClass("error_input");
                    // $("#errText").html("Passwords do not match");
                } else {
                    $(".password-control").removeClass("has-error").addClass("has-success");

                    // $("#re-password").removeClass("error_input");
                    // $("#errorText").removeClass("alert alert-danger d-flex align-items-center");
                }
            } else {
                $("#save-button").removeAttr("disabled");
                // $("#re-password").removeClass("has-error");
                // $("#errorText").removeClass("alert alert-danger d-flex align-items-center");
            }
        })

        $("#phone-number").on("change", function (){

            if (!validateNumber($(this).val())) {
                $("#two-factor-auth").attr("disabled", true);
                $(".phone-control").addClass("has-error");
                // $("#errText").html("Invalid OneMoney Number");
            } else {
                $("#two-factor-auth").attr("disabled", false);
                $(".phone-control").removeClass("has-error");
                // $("#errorText").removeClass("alert alert-danger d-flex align-items-center");
            }
        })

        $("#save-button").on("click", function (e){
            e.preventDefault();
            $.ajax({
                url: "/includes/updateSecuritySettings.php",
                method: "post",
                data: $("#security-form").serialize(),
                dataType: "text",
                failed: function () {
                    iziToast.show({
                        maxWidth: "280px",
                        class: "success-toast",
                        icon: "mdi mdi-bell-off",
                        title: "",
                        message: `Failed to update security settings`,
                        titleColor: "#fff",
                        messageColor: "#fff",
                        iconColor: "#fff",
                        backgroundColor: "#7F00FF",
                        progressBarColor: "#ff7f00",
                        position: "bottomRight",
                        transitionIn: "fadeInUp",
                        close: !1,
                        timeout: 2500,
                        zindex: 99999
                    })
                },
                success: function (data) {
                    console.log(data)
                    if (data == 1) {
                        iziToast.show({
                            maxWidth: "280px",
                            class: "success-toast",
                            icon: "mdi mdi-bell-ring",
                            title: "",
                            message: "You successfully updated your security details",
                            titleColor: "#fff",
                            messageColor: "#fff",
                            iconColor: "#fff",
                            backgroundColor: "#7F00FF",
                            progressBarColor: "#80ff00",
                            position: "bottomRight",
                            transitionIn: "fadeInUp",
                            close: !1,
                            timeout: 2500,
                            zindex: 99999
                        })
                    } else {
                        iziToast.show({
                            maxWidth: "280px",
                            class: "success-toast",
                            icon: "mdi mdi-bell-off",
                            title: "",
                            message: `Failed to update security settings`,
                            titleColor: "#fff",
                            messageColor: "#fff",
                            iconColor: "#fff",
                            backgroundColor: "#7F00FF",
                            progressBarColor: "#ff7f00",
                            position: "bottomRight",
                            transitionIn: "fadeInUp",
                            close: !1,
                            timeout: 2500,
                            zindex: 99999
                        })
                    }
                },
            })
        })

        $("#setting-allow-public-profile").on("change",function (){
            var setting = $(this).data("setting-value");
            $.ajax({
                url: "/includes/updateSecuritySettings.php",
                method: "post",
                data: {settingPublicProfileValue: setting },
                dataType: "text",
                failed: function () {
                },
                success: function (data) {
                    console.log(data)
                },
            })
        });

        $("#setting-allow-public-posts").on("change",function (){
            var setting = $(this).data("setting-value");

            $.ajax({
                url: "/includes/updateSecuritySettings.php",
                method: "post",
                data: {settingAllowPublicPostsValue: setting},
                dataType: "text",
                failed: function () {
                },
                success: function (data) {
                    console.log(data)
                },
            })
        });

        $("#setting-public-friend-list").on("change",function (){
            var setting = $(this).data("setting-value");

            $.ajax({
                url: "/includes/updateSecuritySettings.php",
                method: "post",
                data: {settingAllowPublicFriendListValue: setting},
                dataType: "text",
                failed: function () {
                },
                success: function (data) {
                    console.log(data)
                },
            })
        });

        $("#setting-tag-verification").on("change",function (){
            var setting = $(this).data("setting-value");

            $.ajax({
                url: "/includes/updateSecuritySettings.php",
                method: "post",
                data: {settingAllowTagVerificationValue: setting},
                dataType: "text",
                failed: function () {
                },
                success: function (data) {
                    console.log(data)
                },
            })
        });

        $("#setting-profile-indexed").on("change",function (){

            var setting = $(this).data("setting-value");

            $.ajax({
                url: "/includes/updateSecuritySettings.php",
                method: "post",
                data: {settingProfileIndexedValue: setting},
                dataType: "text",
                failed: function () {
                },
                success: function (data) {
                    console.log(data)
                },
            })
        });

        $("#notification-setting-enable").on("change",function (){

            var setting = $(this).data("setting-value");

            $.ajax({
                url: "/includes/updateSecuritySettings.php",
                method: "post",
                data: {notificationSettingEnable: setting},
                dataType: "text",
                failed: function () {
                },
                success: function (data) {
                    console.log(data)
                },
            })
        });

        $("#notification-setting-comment").on("change",function (){

            var setting = $(this).data("setting-value");

            $.ajax({
                url: "/includes/updateSecuritySettings.php",
                method: "post",
                data: {notificationSettingComment: setting},
                dataType: "text",
                failed: function () {
                },
                success: function (data) {
                    console.log(data)
                },
            })
        });

        $("#notification-setting-follower").on("change",function (){

            var setting = $(this).data("setting-value");

            $.ajax({
                url: "/includes/updateSecuritySettings.php",
                method: "post",
                data: {notificationSettingFollower: setting},
                dataType: "text",
                failed: function () {
                },
                success: function (data) {
                    console.log(data)
                },
            })
        });

        $("#notification-setting-friend-request").on("change",function (){

            var setting = $(this).data("setting-value");

            $.ajax({
                url: "/includes/updateSecuritySettings.php",
                method: "post",
                data: {notificationSettingFriendRequest: setting},
                dataType: "text",
                failed: function () {
                },
                success: function (data) {
                    console.log(data)
                },
            })
        });

        $("#notification-setting-message").on("change",function (){

            var setting = $(this).data("setting-value");

            $.ajax({
                url: "/includes/updateSecuritySettings.php",
                method: "post",
                data: {notificationSettingMessage: setting},
                dataType: "text",
                failed: function () {
                },
                success: function (data) {
                    console.log(data)
                },
            })
        });

        $("#notification-setting-payment").on("change",function (){

            var setting = $(this).data("setting-value");

            $.ajax({
                url: "/includes/updateSecuritySettings.php",
                method: "post",
                data: {notificationSettingPayment: setting},
                dataType: "text",
                failed: function () {
                },
                success: function (data) {
                    console.log(data)
                },
            })
        });

        $("#notification-setting-sound").on("change",function (){

            var setting = $(this).data("setting-value");

            $.ajax({
                url: "/includes/updateSecuritySettings.php",
                method: "post",
                data: {notificationSettingSound: setting},
                dataType: "text",
                failed: function () {
                },
                success: function (data) {
                    console.log(data)
                },
            })
        });
    }
}));