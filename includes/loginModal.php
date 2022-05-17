<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModal" aria-hidden="true">
    <button type="button" class="close float-close-pro" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header-pro">
                <h2>Welcome Back</h2>
                <h6>Sign in to your account to continue using Central Play</h6>
            </div>
            <div class="modal-body-pro social-login-modal-body-pro">
                    <div class="form-group align-items-center">
                        <div id='mail_success' class='success text-center'>Login Successful.</div>
                        <div id='mail_fail' class='error text-center' >Login Failed. Please Retry!. <br />Either Password or Email is Incorrect. </div>
                    </div>
<!--                <div class="registration-social-login-container">-->
                    <form id="loginForm">
                        <div class="form-group">
                            <input type="email" name="modal_email_login" class="form-control" id="modal_email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="modal_password_login" class="form-control" id="modal_password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="button" name="sign_in" id="modal_sign_in_button" class="btn btn-green-pro btn-display-block">Sign In</button>
                        </div>
                        <div class="container-fluid">
                            <div class="row no-gutters">
                                <div class="col forgot-your-password"><a href="#">Forgot your password?</a></div>
                            </div>
                        </div><!-- close .container-fluid -->
                    </form>

<!--                    <div class="registration-social-login-or">or</div>-->

<!--                </div>-->
                <!-- close .registration-social-login-container -->

<!--                <div class="registration-social-login-options">-->
<!--                    <h6>Sign in with your social account</h6>-->
<!--                    <div class="social-icon-login facebook-color"><i class="fab fa-facebook-f"></i> Facebook</div>-->
<!--                    <div class="social-icon-login twitter-color"><i class="fab fa-twitter"></i> Twitter</div>-->
<!--                    <div class="social-icon-login google-color"><i class="fab fa-google-plus-g"></i> Google</div>-->
<!--                </div>-->
                <!-- close .registration-social-login-options -->

                <div class="clearfix"></div>

            </div><!-- close .modal-body -->

            <a class="not-a-member-pro" href="signup-step2.php">Not a member? <span>Join Today!</span></a>
        </div><!-- close .modal-content -->
    </div><!-- close .modal-dialog -->
</div>
