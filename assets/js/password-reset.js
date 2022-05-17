"use strict";

$(document).ready((function () {

    $("#reset-email").change(function () {
        var value = $(this).val();

        if (value !== "") {
            $.ajax({
                url: "includes/emailSearch.php",
                method: "post",
                data: {email: value},
                dataType: "text",
                failed: function () {
                    $(this).addClass("error_input");
                },
                success: function (data) {
                    if (data) {
                        console.log(data);
                        $("#mail_fail").html("");
                        $("#reset-email").removeClass("error_input");
                        $("#reset-button").removeAttr("disabled");
                    } else {
                        console.log("data");
                        $("#mail_fail").fadeIn(500);
                        $("#user-email").addClass("error_input");
                        $("#mail_fail").html("Account email Does not exist. Try <a href='signup.php'>Sign Up</a>");
                        $("#reset-button").attr({
                            disabled: "true",
                        })
                    }
                },
            });
        }
    });


    $("#reset-button").on("click", function (a) {
        a.preventDefault();

        var b = !1,
            c = $("#reset-email").val();

        if ($("#reset-email").click(function () {
            $(this).removeClass("error_input")
        }), 0 == c.length) {
            var b = !0;
            $("#reset-email").addClass("error_input");
        } else $("#reset-email").removeClass("error_input");


        0 == b && ($("#reset-button").attr({
            disabled: "true",
            value: "Sending Password Reset Email..."
        }), $.ajax(
            {
                url: "includes/passwordReset.php",
                method: "post",
                data: {password_reset_email: c},
                dataType: "text",
                failed: function () {
                    $("#mail_fail").fadeIn(500);
                    $("#reset-button").removeAttr("disabled").attr("value", "Password Reset");
                },
                success: function (data) {
                    if (data == 1) {
                        $("#mail_success").fadeIn(500);
                        $("#password_reset_button").attr({
                            disabled: "true",
                        });
                    } else {
                        $("#mail_fail").fadeIn(500);
                        $("#password_reset_button").removeAttr("disabled").attr("value", "Reset Password");
                    }

                }
            }
        ));
    })


    $("#password_update_button").on("click", function (a) {
        a.preventDefault();

        var b = !1,
            c = $("#confirm_password").val(),
            d = $("#new_password").val();

        if ($("#confirm_password").click(function () {
            $(this).removeClass("error_input")
        }), 0 == c.length) {
            var b = !0;
            $("#confirm_password").addClass("error_input");
        } else $("#confirm_password").removeClass("error_input");

        if (0 == d.length) {
            var b = !0;
            $("#new_password").addClass("error_input");
        } else $("#new_password").removeClass("error_input");


        0 == b && ($("#password_update_button").attr({
            disabled: "true",
            value: "Updating Password ..."
        }), $.ajax(
            {
                url: "includes/passwordUpdate.php",
                method: "post",
                data: {new_password: d},
                dataType: "text",
                failed: function () {
                    $("#mail_fail").fadeIn(500);
                    $("#password_update_button").removeAttr("disabled").attr("value", "Reset Password");
                },
                success: function (data) {
                    if (data == 1) {
                        $("#mail_success").fadeIn(500);
                        $("#password_update_button").remove()

                    } else {
                        $("#mail_fail").fadeIn(500);
                        $("#password_reset_button").removeAttr("disabled").attr("value", "Reset Password");
                        setInterval(function () {
                            window.location = 'http://localhost/nerdLibary/login.php';
                        }, 1000)
                    }

                }
            }
        ));
    })

}));