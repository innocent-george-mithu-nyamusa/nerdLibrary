"use strict";

Dropzone.autoDiscover = !1, $(document).ready((function () {
    var signUpFormData = new FormData();
    var proceed = false;
    var allInformationArray = [];
    var accountType = "";
    var initInfo;
    var passwordInfo;

    $("#user_email").change(function () {

        var value = $(this).val();

        if (value !== "") {
            $.ajax({
                url: "includes/emailSearch.php",
                method: "post",
                data: {email: value},
                dataType: "text",
                failed: function () {
                    $(this).addClass("error_input");
                    console.log("error");
                },
                success: function (data) {
                    console.log(data);
                    if (data) {
                        // $("#errorText").addClass("alert alert-danger d-flex align-items-center");
                        $("#user_email").addClass("error_input");
                        $("#mail_fail").html("Account already exists with that email");
                        $(".process-button").attr({
                            disabled: "true",
                        })
                    } else {
                        $("#mail_fail").html("");
                        $("#user_email").removeClass("error_input");
                        $(".process-button").removeAttr("disabled");
                    }
                },
            });
        }
    });

    $("#user_password").change(function () {

        function checkPassword(str) {
            const reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            return reg.test(str);
        }

        var value = $(this).val();

        if (value !== "") {
            if (!checkPassword(value)) {

                $("#user_password").addClass("error_input");
                $("#mail_fail").html("Invalid Password!.");
                $(".process-button").attr({
                    disabled: "true",
                })

            } else {

                $("#user_password").html("");
                $("#user_email").removeClass("error_input");
                $(".process-button").removeAttr("disabled");
            }
        }
    });

        $("#account-type-1").on("click", function () {
            signUpFormData.append("accountSubscriptionType", "free");
        });

      $("#account-type-2").on("click", function () {

            signUpFormData.append("accountSubscriptionType", "standard");
        });

      $("#account-type-3").on("click", function () {
            signUpFormData.append("accountSubscriptionType", "premium");
        });


    $("#password_confirm").change(function () {

        function checkPassword(str) {
            const reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            return reg.test(str);
        }

        var value = $(this).val();
        var password = $("#user_password").val();

        if (value !== "") {

            if (!checkPassword(value) || (password !== value)) {

                $("#user_password").addClass("error_input");
                $(this).addClass("error_input");
                $(".process-button").attr({
                    disabled: "true",
                })
            } else {
                $("#email_fail").html("");
                $("#user_password").removeClass("error_input");
                $(this).removeClass("error_input");
                $(".process-button").removeAttr("disabled");
            }
        }
    });


    if ($(".progress-wrap .dot").on("click", (function () {
        var e = $(this), t = e.attr("data-step");
        e.closest(".progress-wrap").find(".bar").css("width", t + "%"), e.siblings(".dot").removeClass("is-current"), e.addClass("is-active is-current"), e.prevAll(".dot").addClass("is-active"), e.nextAll(".dot").removeClass("is-active"), $(".process-panel-wrap").removeClass("is-active"), $(".step-title").removeClass("is-active"), "0" == t ? $("#signup-panel-1, #step-title-1").addClass("is-active") : "25" == t ? $("#signup-panel-2, #step-title-2").addClass("is-active") : "50" == t ? $("#signup-panel-3, #step-title-3").addClass("is-active") : "75" == t ? $("#signup-panel-4, #step-title-4").addClass("is-active") : "100" == t && $("#signup-panel-5, #step-title-5").addClass("is-active")

    })), $(".process-button").on("click", (function (i) {
        i.preventDefault();

        var e = $(this), t = e.attr("data-step");

        if ($(this).hasClass("user-account-lecturer")) {
            signUpFormData.append("accountType", "lecturer");
        }

        if ($(this).hasClass("user-account-student")) {
            signUpFormData.append("accountType", "student");
        }

        if ($(this).hasClass("user-account-organization")) {
            signUpFormData.append("accountType", "organization");
        }

        if (t == "step-dot-2") {

            $(".is-next-2").on("click", function (m) {
                m.preventDefault();

                // $("#loginForm").validate();

                var b = !1,
                    c = $("#user_email").val(),
                    f = $("#user_firstname").val(),
                    g = $("#user_lastname").val(),
                    j = $("#account-currency").val(),
                    k = $("#account-payment-option").val();

                if ($("#user_email, #user_firstname, #user_lastname").click(function () {
                    $(this).removeClass("error_input")
                }), 0 == c.length) {
                    var b = !0;
                    $("#user_email").addClass("error_input");
                } else $("#user_email").removeClass("error_input");

                if (0 == f.length) {
                    var b = !0;
                    $("#user_firstname").addClass("error_input");
                } else $("#user_firstname").removeClass("error_input");

                if (0 == g.length) {
                    var b = !0;
                    $("#user_lastname").addClass("error_input");
                } else $("#user_lastname").removeClass("error_input");

                0 == b && ($(".is-next-2").attr({
                    disabled: "true",
                }),

                    signUpFormData.append("user_firstname", f),
                    signUpFormData.append("user_lastname", g),
                    signUpFormData.append("user_email", c),
                    signUpFormData.append("user_account_currency", j),
                    signUpFormData.append("user_account_payment_option_platform", k),

                    proceed = true,
                    $("#mail_success").fadeIn(500),
                    $(".is-next-2").removeAttr("disabled")
                )

            });
        }
        if (t == "step-dot-5") {
            // if ($(this).hasClass(".is-next-4")) {

                function validateNumber(number) {

                    const re = /2637[7-8|1|3][0-9]{7}$/;
                    if (re.test(number)) {
                        return true;
                    }
                    return false
                }

                // v.preventDefault();

                var b = !1,
                    c = $("#user_password").val(),
                    f = $("#password_confirm").val(),
                    g = $("#user_phone").val();

                if ($("#user_password, #password_confirm, #user_phone").click(function () {

                    $(this).removeClass("error_input")
                }), 0 == c.length) {
                    var b = !0;
                    proceed = false;

                    $("#user_password").addClass("error_input");
                } else $("#user_password").removeClass("error_input");

                if (0 == f.length) {
                    var b = !0;
                    proceed = false;

                    $("#password_confirm").addClass("error_input");
                } else $("#password_confirm").removeClass("error_input");

                if (0 == g.length || !validateNumber(g)) {
                    var b = !0;
                    proceed = false;

                    $("#user_phone").addClass("error_input");
                } else $("#user_phone").removeClass("error_input");

                if (c != f) {
                    var b = !0;
                    proceed = false;

                    $("#user_password").addClass("error_input");
                    $("#password_confirm").addClass("error_input");

                } else {
                    $("#user_password").removeClass("error_input");
                    $("#password_confirm").removeClass;
                }

                0 == b && ($(".is-next-4").attr({
                    disabled: "true",
                }), signUpFormData.append("user_password", c), signUpFormData.append("user_phone", g) , $.ajax(
                    {
                        url: "includes/addThirdDetails.php",
                        method: "post",
                        data: signUpFormData,
                        contentType: false,
                        processData: false,
                        failed: function () {
                            $("#mail_fail").fadeIn(500);
                            $(".is-next-4").removeAttr("disabled");
                        },
                        success: function (data) {

                            if (data.toString().indexOf("https://www.paynow.co.zw/payment/link/") != -1) {
                                proceed = true;

                                $("#mail_success").fadeIn(500);
                                $(".is-next-4").attr("disabled", !1).removeAttr("disabled");

                                // $("#pay-paynow").removeClass("hidden").attr({
                                //     "href": data.toString(),
                                //     "target": "_blank"
                                // });

                            } else {
                                $("#mail_fail").fadeIn(500);
                                $("#is-next-2").removeAttr("disabled");
                            }
                        }
                    }
                ));

        }

        if (t == ("step-dot-2")) {
            e.addClass("is-loading");
            setTimeout((function () {
                e.removeClass("is-loading");
                $("#" + t).trigger("click");
            }), 800);

        } else {

            e.addClass("is-loading");
            setTimeout((function () {
                e.removeClass("is-loading");
                console.log(proceed);
                console.log("log here")

                if (proceed) {
                    $("#" + t).trigger("click");
                }
            }), 800);
        }


    })), $("#profile-pic-dz").length) var e = new Dropzone("#profile-pic-dz", {
        maxFilesize: 8, acceptedFiles: ".jpeg,.jpg,.png", clickable: ".upload-button", init: function () {
            this.on("error", (function (e, t) {
                console.log(t), this.removeFile(e)
            })), null != this.files[1] && this.removeFile(this.files[0])

        }, transformFile: function (t, i) {
            $("#crop-modal").addClass("is-active");
            var s = document.createElement("div");
            s.style.position = "absolute", s.style.left = 0, s.style.right = 0, s.style.top = 0, s.style.bottom = 0, s.style.zIndex = 9999, s.style.backgroundColor = "#fff", document.getElementById("cropper-wrapper").appendChild(s);
            var a = document.createElement("button");
            a.style.position = "absolute", a.style.right = "10px", a.style.bottom = "10px", a.style.zIndex = 9999, a.textContent = "Crop", a.classList.add("button"), s.appendChild(a), a.addEventListener("click", (function () {
                n.getCroppedCanvas({width: 256, height: 256}).toBlob((function (s) {
                    e.createThumbnail(s, e.options.thumbnailWidth, e.options.thumbnailHeight, e.options.thumbnailMethod, !1, (function (a) {
                        e.emit("thumbnail", t, a), i(s);
                        var o = new FileReader;
                        o.onload = function (e) {
                            var image = new File([s], "user_image.png", {type: "image/png"});
                            signUpFormData.append("user_image", image);

                            $("#upload-preview").attr("src", s.dataURL), $(".picture-container").webuiPopover({
                                title: "",
                                content: 'Your photo is ready to be uploaded. Hit the "Save Changes" button to complete the upload process.',
                                animation: "pop",
                                width: 300,
                                style: "inverse",
                                placement: "top",
                                offsetTop: -16
                            }).trigger("click")
                        }, o.readAsDataURL(t)
                    }));

                    var a = new FileReader;
                    a.addEventListener("loadend", (function (e) {
                    })), a.readAsBinaryString(s)
                })), document.getElementById("cropper-wrapper").removeChild(s), document.getElementById("crop-modal").classList.remove("is-active")
            }));
            var o = new Image;
            o.src = URL.createObjectURL(t), s.appendChild(o);
            var n = new Cropper(o, {aspectRatio: 1})
        }
    });


    $("#pay-paynow").on("click", (function () {
        var e = $(this);

        $.ajax(
            {
                url: "includes/payments/payment.php",
                method: "post",
                data: signUpFormData,
                contentType: false,
                processData: false,
                failed: function () {
                    $("#mail_fail").fadeIn(500);
                    $(".is-next-4").removeAttr("disabled");
                },
                success: function (data) {

                    if (data.toString().indexOf("https://www.paynow.co.zw/payment/link/") != -1) {
                        proceed = true;

                        $("#mail_success").fadeIn(500);
                        $(".is-next-4").attr("disabled", !1).removeAttr("disabled");

                        // $("#pay-paynow").removeClass("hidden").attr({
                        //     "href": data.toString(),
                        //     "target": "_blank"
                        // });

                    } else {
                        $("#mail_fail").fadeIn(500);
                        $("#is-next-2").removeAttr("disabled");
                    }
                }
            }
        );

        e.addClass("is-loading"), setTimeout((function () {
            // TODO:: FIX THIS ROUTE
            // window.location = "interests"
        }), 800)
    }))
}));