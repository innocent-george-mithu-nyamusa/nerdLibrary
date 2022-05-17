<script>
    $(document).ready(function () {

        $("#errorText").hide();

        const zipit = $("#payment_options_zipit_card_details");
        const visa = $("#payment_options_card_online_details");
        const ecocash = $("#payment_options_ecocash_details");
        const telecash = $("#payment_options_telecash_details");
        const onemoney = $("#payment_options_onemoney_details");
        $("#check-icon-1");
        $("#check-icon");
        const visaPaymentOption = $("#payment_visa_option");
        const zipitPaymentOption = $("#payment_zipit_option");
        const ecocashPaymentOption = $("#payment_ecocash_option");
        const onemoneyPaymentOption = $("#payment_onemoney_option");
        const telecashPaymentOption = $("#payment_telecash_option");

        const planRtgs = $("#plan-rtgs");
        const planUs = $("#plan-us");

        planRtgs.on("click", function () {

            //Set Php Payment type Option
            <?php
            if (isset($_SESSION)) {
                $_SESSION["paymentPlan"] = "rtgs";
            }
            ?>
            //Proceed to step 2
            window.location = 'http://localhost/centralplay/signup-step2.php';
        })

        planUs.on("click", function () {
            //Set Php Payment type Option
            <?php
            if (isset($_SESSION)) {
                $_SESSION["paymentPlan"] = "us";
            }
            ?>
            //Proceed to step 2
            window.location = 'http://localhost/centralplay/signup-step2.php';
        })

        // $("#full-name").change(function () {
        //     var value = $(this).val();
        //
        //     if (value !== "") {
        //         $(".results").html("");
        //         $.ajax({
        //             url: "includes/nameSearch.php",
        //             method: "post",
        //             data: {name: value},
        //             dataType: "text",
        //             failed: function () {
        //                 $(this).addClass("error_input");
        //             },
        //
        //             success: function (data) {
        //                 if (data) {
        //                     $("#errorText").addClass("alert alert-danger d-flex align-items-center");
        //                     $("#username").addClass("error_input");
        //                     $("#register").attr({
        //                         disabled: "true",
        //                     })
        //                 } else {
        //                     $("#errorText").removeClass("alert alert-danger d-flex align-items-center");
        //                     $("#username").removeClass("error_input");
        //                     $("#register").removeAttr("disabled");
        //
        //                 }
        //             },
        //         });
        //     }else {
        //
        //         $("#register").removeAttr("disabled");
        //         $("#re-password").removeClass("error_input");
        //         $("#errorText").removeClass("alert alert-danger d-flex align-items-center");
        //     }
        // })

        $("#email").change(function () {

            var value = $(this).val();

            if (value !== "") {
                $(".results").html("");
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
                            $("#errorText").addClass("alert alert-danger d-flex align-items-center");
                            $("#email").addClass("error_input");
                            $("#errText").html("Email is already taken");
                            $("#register").attr({
                                disabled: "true",
                            })
                        } else {
                            $("#errorText").removeClass("alert alert-danger d-flex align-items-center");
                            $("#email").removeClass("error_input");
                            $("#register").removeAttr("disabled");
                        }
                    },
                });
            }
        });

        $("#confirm-password").change(function () {
            var confirmPass = $(this).val();
            var password = $("#password").val();
            if (confirmPass !== "") {
                if (confirmPass !== password) {
                    $("#register").attr({
                        disabled: "true",
                    });
                    $("#errorText").addClass("alert alert-danger d-flex align-items-center");
                    $("#re-password").addClass("error_input");
                    $("#errText").html("Passwords do not match");
                } else {
                    $("#register").removeAttr("disabled");
                    $("#re-password").removeClass("error_input");
                    $("#errorText").removeClass("alert alert-danger d-flex align-items-center");
                }
            } else {
                $("#register").removeAttr("disabled");
                $("#re-password").removeClass("error_input");
                $("#errorText").removeClass("alert alert-danger d-flex align-items-center");
            }
        })

        $("#register").click(function (a) {
            a.preventDefault();

            var b = !1,
                c = $("#full-name").val(),
                d = $("#email").val(),
                e = $("#checkbox-terms").is(":checked"),
                g = $("#password").val(),
                h = $("#confirm-password").val();
            // i = $("#username").val();

            // f = $("#message").val();
            if ($("#full-name,#password,#re-password,#email").click(function () {
                $(this).removeClass("error_input")
            }), 0 == g.length) {
                var b = !0;
                $("#password").addClass("error_input");
            } else $("#password").removeClass("error_input");

            if (0 == c.length) {
                var b = !0;
                $("#full-name").addClass("error_input");
            } else $("#full-name").removeClass("error_input");

            if (0 == d.length || "-1" == d.indexOf("@")) {
                var b = !0;
                $("#email").addClass("error_input")
            } else $("#email").removeClass("error_input");

            if (0 == h.length) {
                var b = !0;
                $("#confirm-password").addClass("error_input")
            } else $("#confirm-password").removeClass("error_input");

            if (0 == e) {
                var b = !0;
                $("#checkbox-terms").addClass("error_input");
            } else $("#checkbox-terms").removeClass("error_input");

            0 == b && ($("#register").attr({
                disabled: "true",
                value: "validating ..."
            }), $.ajax(
                {
                    url: "includes/registerUserDetails.php",
                    method: "post",
                    data: $("#register-form").serialize(),
                    dataType: "text",
                    failed: function () {
                        console.log("error in registration")
                        $("#mail_fail").fadeIn(500);
                        $("#register").removeAttr("disabled").attr("value", "Register");
                    },
                    success: function (data) {
                        if (data == 1) {
                            $("#mail_success").fadeIn(500);
                            $("#submit").remove();
                            console.log(data)
                            setInterval(function () {
                                window.location = 'http://localhost/centralplay/signup-step3.php';
                            }, 1000)
                        } else {
                            console.log(data);
                            console.log("failed to sign up");
                            $("#mail_fail").fadeIn(500);
                            $("#register").removeAttr("disabled").attr("value", "Continue");
                        }

                    }
                }
            ));
        });


        visaPaymentOption.click(function () {

            var hasClass = $(this).hasClass("jumbotron-selected");

            $("#check-icon-1").replaceWith("<div id='check-icon-repl-1'></div>");
            zipitPaymentOption.removeClass("jumbotron-selected");
            $("#errorText").removeClass("alert alert-danger d-flex align-items-center");

            if ($("input:radio[name=optradio]:checked").val()) {

                $("input:radio[name=optradio]:checked")[0].checked = false;
            }

            visa.css({"display": "block"});
            zipit.css({"display": "none"});
            ecocash.css({"display": "none"});
            onemoney.css({"display": "none"});
            telecash.css({"display": "none"});

            if
            (hasClass === false) {
                $("#check-icon-repl").replaceWith("<i id='check-icon' class='fas fa-check-circle'></i>")
                $(this).toggleClass("jumbotron-selected");

            } else {
                $("#check-icon").replaceWith("<div id='check-icon-repl'></div>");
                $(this).toggleClass("jumbotron-selected");

            }

        });

        zipitPaymentOption.click(function () {

            var hasClass = $(this).hasClass("jumbotron-selected");
            $("#errorText").removeClass("alert alert-danger d-flex align-items-center");

            visaPaymentOption.removeClass("jumbotron-selected");
            $("#check-icon").replaceWith("<div id='check-icon-repl'></div>");

            if ($("input:radio[name=optradio]:checked").val()) {

                $("input:radio[name=optradio]:checked")[0].checked = false;
            }

            visa.css({"display": "none"});
            zipit.css({"display": "block"});
            ecocash.css({"display": "none"});
            onemoney.css({"display": "none"});
            telecash.css({"display": "none"});

            if (hasClass === false) {
                $("#check-icon-repl-1").replaceWith("<i id='check-icon-1' class='fas fa-check-circle'></i>")
                $(this).toggleClass("jumbotron-selected");
            } else {
                $("#check-icon-1").replaceWith("<div id='check-icon-repl-1'></div>");
                $(this).toggleClass("jumbotron-selected");

            }

        });

        ecocashPaymentOption.click(function () {
            visa.css({"display": "none"});
            zipit.css({"display": "none"});
            ecocash.css({"display": "block"});
            onemoney.css({"display": "none"});
            telecash.css({"display": "none"});
            $("#check-icon-1").replaceWith("<div id='check-icon-repl-1'></div>");
            zipitPaymentOption.removeClass("jumbotron-selected");
            visaPaymentOption.removeClass("jumbotron-selected");
            $("#check-icon").replaceWith("<div id='check-icon-repl'></div>");
            $("#errorText").removeClass("alert alert-danger d-flex align-items-center");

        });

        onemoneyPaymentOption.click(function () {

            visa.css({"display": "none"});
            zipit.css({"display": "none"});
            ecocash.css({"display": "none"});
            onemoney.css({"display": "block"});
            telecash.css({"display": "none"});
            $("#check-icon-1").replaceWith("<div id='check-icon-repl-1'></div>");
            zipitPaymentOption.removeClass("jumbotron-selected");
            visaPaymentOption.removeClass("jumbotron-selected");
            $("#check-icon").replaceWith("<div id='check-icon-repl'></div>");
            $("#errorText").removeClass("alert alert-danger d-flex align-items-center");

        });


        telecashPaymentOption.click(function () {
            visa.css({"display": "none"});
            zipit.css({"display": "none"});
            ecocash.css({"display": "none"});
            onemoney.css({"display": "none"});
            telecash.css({"display": "block"});

            $("#check-icon-1").replaceWith("<div id='check-icon-repl-1'></div>");
            zipitPaymentOption.removeClass("jumbotron-selected");
            visaPaymentOption.removeClass("jumbotron-selected");
            $("#check-icon").replaceWith("<div id='check-icon-repl'></div>");
            $("#errorText").removeClass("alert alert-danger d-flex align-items-center");

        });


        var acceptedCreditCards = {
            visa: /^4[0-9]{12}(?:[0-9]{3})?$/,
            mastercard: /^5[1-5][0-9]{14}$|^2(?:2(?:2[1-9]|[3-9][0-9])|[3-6][0-9][0-9]|7(?:[01][0-9]|20))[0-9]{12}$/,
            amex: /^3[47][0-9]{13}$/,
            discover: /^65[4-9][0-9]{13}|64[4-9][0-9]{13}|6011[0-9]{12}|(622(?:12[6-9]|1[3-9][0-9]|[2-8][0-9][0-9]|9[01][0-9]|92[0-5])[0-9]{10})$/,
            diners_club: /^3(?:0[0-5]|[68][0-9])[0-9]{11}$/,
            jcb: /^(?:2131|1800|35[0-9]{3})[0-9]{11}$/,
        };

        $('#cardCcv').attr('maxlength', 4);

        $('#cardNumber').on('change', function () {
            if (!validateCard($('#cardNumber').val())) {
                $("#errorText").addClass("alert alert-danger d-flex align-items-center");
                $("#cardNumber").addClass("error_input");
                $("#errText").html("Invalid Card Number");
                $("#visaCardRegister").attr({
                    disabled: "true",
                });
            } else {
                $("#errorText").removeClass("alert alert-danger d-flex align-items-center");
            }
        })

        $('#cardCcv').on('change', function () {
            if (!validateCVV($('#cardNumber').val(), $('#cardCcv').val())) {
                $("#errorText").addClass("alert alert-danger d-flex align-items-center");
                $("#cardCvv").addClass("error_input");
                $("#errText").html("Invalid CVV");
                $("#visaCardRegister").attr({
                    disabled: "true",
                });
            } else {
                $("#errorText").removeClass("alert alert-danger d-flex align-items-center");
            }
        });


        $("#telecashNumber").on("change", function () {
            if (!validateNumber($("#telecashNumber").val())) {
                $("#errorText").addClass("alert alert-danger d-flex align-items-center");
                $("#telecashNumber").addClass("error_input");
                $("#errText").html("Invalid Telecash Number ");
            } else {
                $("#telecashNumber").removeClass("error_input");
                $("#errorText").removeClass("alert alert-danger d-flex align-items-center");
            }
        })


        $("#ecocashNumber").on("change", function () {
            if (!validateNumber($("#ecocashNumber").val())) {
                $("#errorText").addClass("alert alert-danger d-flex align-items-center");
                $("#ecocashNumber").addClass("error_input");
                $("#errText").html("Invalid Econet Number");
            } else {
                $("#ecocashNumber").removeClass("error_input");
                $("#errorText").removeClass("alert alert-danger d-flex align-items-center");
            }
        })


        $("#oneMoneyNumber").on("change", function () {
            if (!validateNumber($("#oneMoneyNumber").val())) {
                $("#errorText").addClass("alert alert-danger d-flex align-items-center");
                $("#oneMoneyNumber").addClass("error_input");
                $("#errText").html("Invalid OneMoney Number");
            } else {
                $("#oneMoneyNumber").removeClass("error_input");
                $("#errorText").removeClass("alert alert-danger d-flex align-items-center");
            }
        })


        function validateCard(value) {
            // remove all non digit characters
            var value = value.replace(/\D/g, '');
            var sum = 0;
            var shouldDouble = false;
            // loop through values starting at the rightmost side
            for (var i = value.length - 1; i >= 0; i--) {
                var digit = parseInt(value.charAt(i));

                if (shouldDouble) {
                    if ((digit *= 2) > 9) digit -= 9;
                }

                sum += digit;
                shouldDouble = !shouldDouble;
            }

            var valid = (sum % 10) == 0;
            var accepted = false;

            // loop through the keys (visa, mastercard, amex, etc.)
            Object.keys(acceptedCreditCards).forEach(function (key) {
                var regex = acceptedCreditCards[key];
                if (regex.test(value)) {
                    accepted = true;
                }
            });

            return valid && accepted;
        }

        function validateCVV(creditCard, cvv) {
            // remove all non digit characters
            var creditCard = creditCard.replace(/\D/g, '');
            var cvv = cvv.replace(/\D/g, '');
            // american express and cvv is 4 digits
            if ((acceptedCreditCards.amex).test(creditCard)) {
                if ((/^\d{4}$/).test(cvv))
                    return true;
            } else if ((/^\d{3}$/).test(cvv)) { // other card & cvv is 3 digits
                return true;
            }
            return false;
        }

        function validateNumber(number) {

            const re = /2637[7-8|1|3][0-9]{7}$/;
            if (re.test(number)) {
                return true;
            }
            return false
        }


        $("#visaCardRegister").click(function (a) {
            a.preventDefault();

            var b = !1,
                c = $("#cardHolderFullName").val(),
                d = $("#cardNumber").val(),
                e = $("#cardExpire").val(),
                g = $("#cardCcv").val(),
                h = $("#cardZip").val();
            // i = $("#username").val();

            // f = $("#message").val();
            if ($("#cardHolderFullName,#cardNumber,#cardExpire,#cardCcv,#cardZip").click(function () {
                $(this).removeClass("error_input")
            }), 0 == g.length) {
                var b = !0;
                $("#cardHolderFullName").addClass("error_input");
            } else $("#cardHolderFullName").removeClass("error_input");

            if (0 == c.length) {
                var b = !0;
                $("#cardNumber").addClass("error_input");
            } else $("#cardNumber").removeClass("error_input");

            if (0 == d.length) {
                var b = !0;
                $("#cardExpire").addClass("error_input")
            } else $("#cardExpire").removeClass("error_input");

            if (0 == h.length) {
                var b = !0;
                $("#cardCcv").addClass("error_input")
            } else $("#cardCcv").removeClass("error_input");

            if (0 == e) {
                var b = !0;
                $("#cardZip").addClass("error_input");
            } else $("#cardZip").removeClass("error_input");

            0 == b && ($("#visaCardRegister").attr({
                disabled: "true",
                value: "validating ..."
            }), $.ajax(
                {
                    url: "includes/createUser.php",
                    method: "post",
                    data: $("#visa_payment_form").serialize(),
                    dataType: "text",
                    failed: function () {
                        $("#mail_fail").fadeIn(500);
                        $("#visaCardRegister").removeAttr("disabled").attr("value", "Register");
                    },
                    success: function (data) {
                        if (data == 1) {
                            $("#mail_success").fadeIn(500);
                            // $("#submit").remove();
                            setInterval(function () {
                                window.location = 'http://localhost/centralplay/signup-step4.php';
                            }, 1000)
                        } else {
                            console.log(data);
                            console.log("failed to sign up");
                            $("#mail_fail").fadeIn(500);
                            $("#visaCardRegister").removeAttr("disabled").attr("value", "Continue");
                        }

                    }
                }
            ));
        });

        $("#zipitRegister").click(function (a) {
            a.preventDefault();

            var b = !1,
                c = $("#zipitHolderFullName").val(),
                d = $("#zipitCardNumber").val(),
                e = $("#zipitExpire").val(),
                g = $("#zipitCcv").val(),
                h = $("#zipitZip").val();
            // i = $("#username").val();

            // f = $("#message").val();
            if ($("#zipitHolderFullName,#zipitCardNumber,#zipitExpire,#zipitCcv,#zipitZip").click(function () {
                $(this).removeClass("error_input")
            }), 0 == c.length) {
                var b = !0;
                $("#zipitHolderFullName").addClass("error_input");
            } else $("#zipitHolderFullName").removeClass("error_input");

            if (0 == d.length) {
                var b = !0;
                $("#zipitCardNumber").addClass("error_input");
            } else $("#zipitCardNumber").removeClass("error_input");

            if (0 == g.length) {
                var b = !0;
                $("#zipitCcv").addClass("error_input")
            } else $("#zipitCcv").removeClass("error_input");

            if (0 == e.length) {
                var b = !0;
                $("#zipitExpire").addClass("error_input")
            } else $("#zipitExpire").removeClass("error_input");

            if (0 == h.length) {
                var b = !0;
                $("#zipitCvv").addClass("error_input")
            } else $("#zipitCvv").removeClass("error_input");

            if (0 == e) {
                var b = !0;
                $("#zipitZip").addClass("error_input");
            } else $("#zipitZip").removeClass("error_input");

            0 == b && ($("#zipitRegister").attr({
                disabled: "true",
                value: "Creating Account..."
            }), $.ajax(
                {
                    url: "includes/createUser.php",
                    method: "post",
                    data: $("#zipit_payment_form").serialize(),
                    dataType: "text",
                    failed: function () {
                        $("#mail_fail").fadeIn(500);
                        $("#zipitRegister").removeAttr("disabled").attr("value", "Sign up");
                    },
                    success: function (data) {
                        if (data == 1) {
                            $("#mail_success").fadeIn(500);
                            // $("#submit").remove();
                            setInterval(function () {
                                window.location = 'http://localhost/centralplay/signup-step4.php';
                            }, 1000);
                        } else {
                            $("#mail_fail").fadeIn(500);
                            $("#zipitRegister").removeAttr("disabled").attr("value", "Sign Up");
                        }

                    }
                }
            ));
        });


        $("#ecocashRegister").click(function (a) {
            a.preventDefault();

            var b = !1,
                c = $("#ecocashNumber").val();

            if ($("#ecocashNumber").click(function () {
                $(this).removeClass("error_input")
            }), 0 == c.length) {
                var b = !0;
                $("#ecocashNumber").addClass("error_input");
            } else $("#ecocashNumber").removeClass("error_input");

            0 == b && ($("#ecocashRegister").attr({
                disabled: "true",
                value: "Creating Account..."
            }), $.ajax(
                {
                    url: "includes/createUser.php",
                    method: "post",
                    data: $("#ecocash_payment_form").serialize(),
                    dataType: "text",
                    failed: function () {
                        $("#mail_fail").fadeIn(500);
                        $("#ecocashRegister").removeAttr("disabled").attr("value", "Sign up");
                    },
                    success: function (data) {
                        if (data == 1) {
                            $("#mail_success").fadeIn(500);
                            setInterval(function () {
                                window.location = 'http://localhost/centralplay/signup-step4.php';
                            }, 1000);
                        } else {
                            console.log(data);
                            $("#mail_fail").fadeIn(500);
                            $("#ecocashRegister").removeAttr("disabled").attr("value", "Sign Up");
                        }

                    }
                }
            ));
        });


        $("#onemoneyRegister").click(function (a) {
            a.preventDefault();

            var b = !1,
                c = $("#oneMoneyNumber").val();

            if ($("#oneMoneyNumber").click(function () {
                $(this).removeClass("error_input")
            }), 0 == c.length) {
                var b = !0;
                $("#oneMoneyNumber").addClass("error_input");
            } else $("#oneMoneyNumber").removeClass("error_input");

            0 == b && ($("#onemoneyRegister").attr({
                disabled: "true",
                value: "Creating Account..."
            }), $.ajax(
                {
                    url: "includes/createUser.php",
                    method: "post",
                    data: $("#onemoney_payment_form").serialize(),
                    dataType: "text",
                    failed: function () {
                        $("#mail_fail").fadeIn(500);
                        $("#onemoneyRegister").removeAttr("disabled").attr("value", "Sign up");
                    },
                    success: function (data) {
                        if (data == 1) {
                            $("#mail_success").fadeIn(500);
                            setInterval(function () {
                                window.location = 'http://localhost/centralplay/signup-step4.php';
                            }, 1000);
                        } else {
                            $("#mail_fail").fadeIn(500);
                            $("#onemoneyRegister").removeAttr("disabled").attr("value", "Sign Up");
                        }

                    }
                }
            ));
        });

        $("#telecashNumberRegister").click(function (a) {
            a.preventDefault();

            var b = !1,
                c = $("#telecashNumber").val();

            if ($("#telecashNumber").click(function () {
                $(this).removeClass("error_input")
            }), 0 == c.length) {
                var b = !0;
                $("#telecashNumber").addClass("error_input");
            } else $("#telecashNumber").removeClass("error_input");

            0 == b && ($("#telecashRegister").attr({
                disabled: "true",
                value: "Creating Account..."
            }), $.ajax(
                {
                    url: "includes/createUser.php",
                    method: "post",
                    data: $("#telecash_payment_form").serialize(),
                    dataType: "text",
                    failed: function () {
                        $("#mail_fail").fadeIn(500);
                        $("#telecashRegister").removeAttr("disabled").attr("value", "Sign up");
                    },
                    success: function (data) {
                        if (data == 1) {
                            $("#mail_success").fadeIn(500);
                            setInterval(function () {
                                window.location = 'http://localhost/centralplay/signup-step4.php';
                            }, 1000);
                        } else {
                            $("#mail_fail").fadeIn(500);
                            $("#telecashRegister").removeAttr("disabled").attr("value", "Sign Up");
                        }
                    }
                }
            ));
        });


        $("#genre-action").on("click", function () {

            if (!$(this).hasClass("active")) {
                $.ajax(
                    {
                        url: "includes/updateGenre.php",
                        method: "post",
                        data: { action: "liked", genre: "genre" },
                        dataType: "text",
                        failed: function () {
                            console.log("update failed");
                        },
                        success: function (data) {
                            // if(data == 1){
                            //     console.log(" genre liked update successful")
                            // }else {
                            //     console.log(data)
                            // }
                        }
                    }
                );
            } else {
                $.ajax(
                    {
                        url: "includes/updateGenre.php",
                        method: "post",
                        data: { action: "unliked", genre: "genre"},
                        dataType: "text",
                        failed: function () {
                            console.log("update failed");
                        },
                        success: function (data) {
                            // if(data == 1){
                            //     console.log("update successful")
                            // }else {
                            //     console.log(data)
                            // }
                        }
                    }
                );

            }

        })

        $("#genre-romance").on("click",function () {

            if (!$(this).hasClass("active")) {
                $.ajax(
                    {
                        url: "includes/updateGenre.php",
                        method: "post",
                        data: { romance: "liked", genre: "genre" },
                        dataType: "text",
                        failed: function () {
                            console.log("action update failed");
                        },
                        success: function (data) {
                            // if(data == 1){
                            //     console.log("action liked update successful")
                            // }else {
                            //     console.log(data)
                            // }
                        }
                    }
                );
            } else {

                $.ajax(
                    {
                        url: "includes/updateGenre.php",
                        method: "post",
                        data: { romance: "unliked", genre: "genre" },
                        dataType: "text",
                        failed: function () {
                            console.log("update failed");
                        },
                        success: function (data) {
                            // if(data == 1){
                            //     console.log("romance liked update successful")
                            // }else {
                            //     console.log(data)
                            // }
                        }
                    }
                );

            }

        })

        $("#genre-comedy").on("click",function () {

            if (!$(this).hasClass("active")) {

                $.ajax(
                    {
                        url: "includes/updateGenre.php",
                        method: "post",
                        data: { comedy: "liked", genre: "genre" },
                        dataType: "text",
                        failed: function () {
                            console.log("comedy update failed");
                        },
                        success: function (data) {
                            // if(data == 1){
                            //     console.log("comedy liked update successful")
                            // }else {
                            //     console.log(data)
                            // }
                        }
                    }
                );
            } else {
                $.ajax(
                    {
                        url: "includes/updateGenre.php",
                        method: "post",
                        data: { comedy: "unliked", genre: "genre" },
                        dataType: "text",
                        failed: function () {
                            console.log("update failed");
                        },
                        success: function (data) {
                            // if(data == 1){
                            //     console.log("comedy liked update successful")
                            // }else {
                            //     console.log(data)
                            // }
                        }
                    }
                );

            }

        })

        $("#genre-drama").on("click",function () {

            if (!$(this).hasClass("active")) {
                $.ajax(
                    {
                        url: "includes/updateGenre.php",
                        method: "post",
                        data: { drama: "liked", genre: "genre" },
                        dataType: "text",
                        failed: function () {
                            console.log("drama update failed");
                        },
                        success: function (data) {
                            // if(data == 1){
                            //     console.log("drama liked update successful")
                            // }else {
                            //     console.log(data)
                            // }
                        }
                    }
                );
            } else {
                $.ajax(
                    {
                        url: "includes/updateGenre.php",
                        method: "post",
                        data: { drama: "unliked", genre: "genre" },
                        dataType: "text",
                        failed: function () {

                            console.log("drama update failed");
                        },
                        success: function (data) {
                            // if(data == 1){
                            //     console.log("drama liked update successful")
                            // }else {
                            //     console.log(data)
                            // }
                        }
                    }
                );

            }

        })

    });

</script>