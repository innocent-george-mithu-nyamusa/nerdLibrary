"use strict";
/*! login.js | nerdLibrary | © Pixels. 2019-2020 */
$(document).ready((function () {

    $("#loginBtn").on("click", function (a) {

        a.preventDefault();

        var b = !1,
            c = $("#user_email").val(),
            d = $("#user_password").val();

        if ($("#user_email, #user_password").click(function () {
            $(this).removeClass("error_input")
        }), 0 == c.length) {
            var b = !0;
            $("#user_email").addClass("error_input");
        } else $("#user_email").removeClass("error_input");

        if (0 == d.length) {
            var b = !0;
            $("#user_password").addClass("error_input");
        } else $("#user_password").removeClass("error_input");

        0 == b && ($("#loginBtn").attr({
            disabled: "true",
            value: "Login in..."
        }), $.ajax(
            {
                url: "/includes/loginUser.php",
                method: "post",
                data: $("#loginForm").serialize(),
                dataType: "text",
                failed: function () {
                    $("#mail_fail").fadeIn(500);
                    $("#loginBtn").removeAttr("disabled").attr("value", "Login");
                },
                success: function (data) {

                    console.log(data);
                    // console.log($("#loginForm").serialize());

                    if (data == 1) {

                        $("#mail_success").fadeIn(500);
                        setInterval(function () {
                            // window.location = 'http://localhost/index.php';
                            window.location = '/';
                        }, 1000);
                    } else {
                        $("#mail_fail").fadeIn(500);
                        $("#loginBtn").removeAttr("disabled").attr("value", "Login");
                    }

                }
            }
        ));
    })



}))