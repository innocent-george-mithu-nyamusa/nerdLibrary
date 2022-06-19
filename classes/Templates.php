<?php

namespace Classes;


class Templates
{


    public function passwordResetHtml(string $returnUrl): string
    {

        return '<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <style type="text/css">
    /* FONTS */
    @media screen {
      @font-face {
        font-family: "Lato";
        font-style: normal;
        font-weight: 400;
        src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
      }

      @font-face {
        font-family: "Lato";
        font-style: normal;
        font-weight: 700;
        src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
      }

      @font-face {
        font-family: "Lato";
        font-style: italic;
        font-weight: 400;
        src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
      }

      @font-face {
        font-family: "Lato";
        font-style: italic;
        font-weight: 700;
        src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
      }
    }

    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width:600px){
      h1 {
        font-size: 32px !important;
        line-height: 32px !important;
      }
    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
  </style>
</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Lato, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
  Reset your password. Let&rsquo;s get you back into your account.
</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <!-- LOGO -->
  <tr>
    <td bgcolor="#7c72dc" align="center">
      <!--[if (gte mso 9)|(IE)]>
      <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
        <tr>
          <td align="center" valign="top" width="600">
      <![endif]-->
      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
        <tr>
          <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
            <a href="http://nerd-library.com/" target="_blank">
              <img alt="Logo" src="http://nerd-library.com/assets/img/logo/logo.png" width="100" height="100" style="display: block; width: 100px; max-width: 100px; min-width: 100px; font-family: Lato, Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;" border="0">
            </a>
          </td>
        </tr>
      </table>
      <!--[if (gte mso 9)|(IE)]>
      </td>
      </tr>
      </table>
      <![endif]-->
    </td>
  </tr>
  <!-- HERO -->
  <tr>
    <td bgcolor="#7c72dc" align="center" style="padding: 0px 10px 0px 10px;">
      <!--[if (gte mso 9)|(IE)]>
      <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
        <tr>
          <td align="center" valign="top" width="600">
      <![endif]-->
      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
        <tr>
          <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
            <h1 style="font-size: 28px; font-weight: 400; margin: 0;">Reset Password?</h1>
          </td>
        </tr>
      </table>
      <!--[if (gte mso 9)|(IE)]>
      </td>
      </tr>
      </table>
      <![endif]-->
    </td>
  </tr>
  <!-- COPY BLOCK -->
  <tr>
    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
      <!--[if (gte mso 9)|(IE)]>
      <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
        <tr>
          <td align="center" valign="top" width="600">
      <![endif]-->
      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
        <!-- COPY -->
        <tr>
          <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
            <p style="margin: 0;">Resetting your password is easy. Just press the button below and follow the instructions. We will have you up and running in no time. </p>
          </td>
        </tr>
        <!-- BULLETPROOF BUTTON -->
        <tr>
          <td bgcolor="#ffffff" align="left">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center" style="border-radius: 3px;" bgcolor="#7c72dc"><a href="'.$returnUrl.'" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #7c72dc; display: inline-block;">Reset Password</a></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <!--[if (gte mso 9)|(IE)]>
      </td>
      </tr>
      </table>
      <![endif]-->
    </td>
  </tr>
  <!-- COPY CALLOUT -->
  <tr>
    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
      <!--[if (gte mso 9)|(IE)]>
      <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
        <tr>
          <td align="center" valign="top" width="600">
      <![endif]-->
      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
        <!-- HEADLINE -->
        <tr>
          <td bgcolor="#111111" align="left" style="padding: 40px 30px 20px 30px; color: #ffffff; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
            <h2 style="font-size: 24px; font-weight: 400; margin: 0;">Want a more secure account?</h2>
          </td>
        </tr>
        <!-- COPY -->
        <tr>
          <td bgcolor="#111111" align="left" style="padding: 0px 30px 20px 30px; color: #aeaeae; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
            <p style="margin: 0;">We support two-factor authentication to help keep your information private.</p>
          </td>
        </tr>
        <!-- COPY -->
        <tr>
          <td bgcolor="#111111" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
            <p style="margin: 0;"><a href="http://nerd-library.com/helpdesk/#2-f-a" target="_blank" style="color: #7c72dc;">See how easy it is to get started</a></p>
          </td>
        </tr>
      </table>
      <!--[if (gte mso 9)|(IE)]>
      </td>
      </tr>
      </table>
      
      <![endif]-->
    </td>
  </tr>

  <!-- SUPPORT CALLOUT -->
  <tr>
    <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
      <!--[if (gte mso 9)|(IE)]>
      <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
        <tr>
          <td align="center" valign="top" width="600">
          
      <![endif]-->
      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
        <!-- HEADLINE -->
        <tr>
          <td bgcolor="#C6C2ED" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
            <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
            <p style="margin: 0;"><a href="http://litmus.com" target="_blank" style="color: #392CB5;">We&rsquo;re here, ready to talk</a></p>
          </td>
        </tr>
      </table>
      <!--[if (gte mso 9)|(IE)]>
      </td>
      </tr>
      </table>
      <![endif]-->
    </td>
  </tr>
  <!-- FOOTER -->
  <tr>
    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
      <!--[if (gte mso 9)|(IE)]>
      <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
        <tr>
          <td align="center" valign="top" width="600">
      <![endif]-->

      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
        <!-- NAVIGATION -->

        <!-- UNSUBSCRIBE -->
        <tr>
          <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
            <p style="margin: 0;">If these emails get annoying, please feel free to <a href="http://nerd-library.com/email/notifications/unsubscribe/" target="_blank" style="color: #111111; font-weight: 700;">unsubscribe</a>.</p>
          </td>
        </tr>
        <!-- ADDRESS -->
        <tr>
          <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
            <p style="margin: 0;">Nerd Library - 4th Floor - 53 Samora Machel- Karigamombe Centre - Harare, ZW </p>
          </td>
        </tr>
      </table>
      <!--[if (gte mso 9)|(IE)]>
      </td>
      </tr>
      </table>

      <![endif]-->
    </td>
  </tr>
</table>
</body>
</html>';
    }

    public function passwordResetText(string $returnUrl): string
    {
        return "Password Reset Request\n\nPlease Click the following Link to reset your account." . $returnUrl . "\n. Click the Above link to Reset Your Password. Please reset your Account within 24 Hours. \n Your Token Expires in 24 Hours. If you did not request this reset ignore this email . \n Nerd Library Support Team";
    }

    public function accountVerifyText(string $name, string $returnUrl)
    {
        //        TODO:: Add team Name on this Item
        return $name . " \n" . "Thanks for Signing Up with rtriv . Please Verify your Account . \n" . $returnUrl . "\n . Click the Above link to Verify Your Account . Please verify your Account within 10 minutes . \n Your Token Expires in 10 minutes . \n rtriv Team";
    }

    public function accountVerifyHtml(string $name, string $returnUrl)
    {

        return '<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <style type="text/css">
        /* FONTS */
        @media screen {
            @font-face {
                font-family: "Lato";
                font-style: normal;
                font-weight: 400;
                src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: normal;
                font-weight: 700;
                src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: italic;
                font-weight: 400;
                src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: italic;
                font-weight: 700;
                src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; }

        /* RESET STYLES */
        img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px){
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] { margin: 0 !important; }
    </style>

</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Lato, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
   Glad you signe up on Nerd Libray We are thrilled to have you here! .
</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td bgcolor="#FFA73B" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                <tr>
                    <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                        <a href="http://nerd-library.com/" target="_blank">
                            <img alt="Logo" src="http://nerd-library.com/assets/img/logo/logo.png" width="200" height="200" style="display: block; width: 100px; max-width: 100px; min-width: 100px; font-family: Lato, Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;" border="0">
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- HERO -->
    <tr>
        <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                <tr>
                    <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                        <h1 style="font-size: 28px; font-weight: 400; margin: 0;">Registration Successful!</h1>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- COPY BLOCK -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                <tr>
                    <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <!-- COPY -->
                <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                        <p style="margin: 0;">Hello '.$name.'.We are excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                    </td>
                </tr>
                <!-- BULLETPROOF BUTTON -->
                <tr>
                    <td bgcolor="#ffffff" align="left">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="border-radius: 3px;" bgcolor="#000000">
                                                <a href="'.$returnUrl.'" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #000000; display: inline-block;">Confirm Account</a></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- COPY -->
                <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                        <p style="margin: 0;">If you have any questions, just reply to this email—we are always happy to help out.</p>
                    </td>
                </tr>
                <!-- COPY -->
                
                <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                        <p style="margin: 0;">Cheers,<br>Nerd Library Support</p>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- SUPPORT CALLOUT -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                <tr>
                    <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <!-- HEADLINE -->
                <tr>
                    <td bgcolor="#FFF0D1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                        <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                        <p style="margin: 0;"><a href="mailto:support@nerd-library.com" target="_blank" style="color: #9B4503;">We&rsquo;re here, ready to talk</a></p>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- FOOTER -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                <tr>
                    <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <!-- NAVIGATION -->

                <!-- UNSUBSCRIBE -->
                <tr>
                    <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                        <p style="margin: 0;">If these emails get annoying, please feel free to <a href="http://nerd-library.com/email/notifications/unsubscribe/" target="_blank" style="color: #111111; font-weight: 700;">unsubscribe</a>.</p>
                    </td>
                </tr>
                <!-- ADDRESS -->
                <tr>
                    <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                        <p style="margin: 0;">NerdLibrary - 4th Floor - Karigamombe Centre - Harare, ZW </p>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>

</body>
</html>
';
    }

    public function sendHtmlNewsLetter(array $agents, array $lostItems): string
    {

        return '<!DOCTYPE html public "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<html xmlns = "http://www.w3.org/1999/xhtml" xmlns:v = "urn:schemas-microsoft-com:vml" xmlns:o = "urn:schemas-microsoft-com:office:office" >
<head >
	<!--[if gte mso 9]>
	<xml >
		<o:OfficeDocumentSettings >
		<o:AllowPNG />
		<o:PixelsPerInch > 96</o:PixelsPerInch >
		</o:OfficeDocumentSettings >
	</xml >
	<![endif]-->
	<meta http - equiv = "Content-type" content = "text/html; charset=utf-8" />
	<meta name = "viewport" content = "width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http - equiv = "X-UA-Compatible" content = "IE=edge" />
	<meta name = "format-detection" content = "date=no" />
	<meta name = "format-detection" content = "address=no" />
	<meta name = "format-detection" content = "telephone=no" />
	<meta name = "x-apple-disable-message-reformatting" />
    <!--[if !mso]><!-->
   	<link href = "https://fonts.googleapis.com/css?family=Kreon:400,700|Playfair+Display:400,400i,700,700i|Raleway:400,400i,700,700i|Roboto:400,400i,700,700i" rel = "stylesheet" />
    <!--<![endif]-->
	<title > Newsletter | Rtriv </title >
	<!--[if gte mso 9]>
	<style type = "text/css" media = "all" >
                    sup {
                    font - size: 100 % !important; }
	</style >
	<![endif]-->


	<style type = "text/css" media = "screen" >
                    /* Linked Styles */
                    body {
                    padding:
                    0 !important; margin:0 !important; display:block !important; min - width:100 % !important; width:100 % !important; background:#212428; -webkit-text-size-adjust:none }
		a {
                        color:#000001; text-decoration:none }
                        p {
                            padding:
                            0 !important; margin:0 !important }
		img {
                            -ms - interpolation - mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */ }
		.mcnPreviewText {
                            display:
                            none !important; }
		.text - footer2 a {
                            color: #ffffff; }

                            /* Mobile styles */
                            @media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {
                                .
                                mobile-shell {
                                    width:
                                    100 % !important;
                                    min - width: 100 % !important; }

			.m - center {
                                    text - align: center !important; }
			.m - left {
                                    text - align: left !important; margin - right: auto !important; }

			.center {
                                    margin:
                                    0 auto !important; }
			.content2 {
                                    padding:
                                    8px 15px 12px !important; }
			.t - left {
                                    float:
                                    left !important; margin - right: 30px !important; }
			.t - left - 2  {
                                    float:
                                    left !important; }

			.td {
                                    width:
                                    100 % !important;
                                    min - width: 100 % !important; }

			.content {
                                    padding:
                                    30px 15px !important; }
			.section {
                                    padding:
                                    30px 15px 0px !important; }

			.m - br - 15 {
                                    height:
                                    15px !important; }
			.mpb5 {
                                    padding - bottom: 5px !important; }
			.mpb15 {
                                    padding - bottom: 15px !important; }
			.mpb20 {
                                    padding - bottom: 20px !important; }
			.mpb30 {
                                    padding - bottom: 30px !important; }
			.m - padder {
                                    padding:
                                    0px 15px !important; }
			.m - padder2 {
                                    padding - left: 15px !important; padding - right: 15px !important; }
			.p70 {
                                    padding:
                                    30px 0px !important; }
			.pt70 {
                                    padding - top: 30px !important; }
			.p0 - 15 {
                                    padding:
                                    0px 15px !important; }
			.p30 - 15 {
                                    padding:
                                    30px 15px !important; }
			.p30 - 15 - 0 {
                                    padding:
                                    30px 15px 0px 15px !important; }
			.p0 - 15 - 30 {
                                    padding:
                                    0px 15px 30px 15px !important; }


			.text - footer {
                                    text - align: center !important; }

			.m - td,
			.m - hide {
                                    display:
                                    none !important; width: 0 !important; height: 0 !important; font - size: 0 !important; line - height: 0 !important; min - height: 0 !important; }

			.m - block {
                                    display:
                                    block !important; }

			.fluid - img img {
                                    width:
                                    100 % !important;
                                    max - width: 100 % !important; height: auto !important; }

			.column,
			.column - dir,
			.column - top,
			.column - empty,
			.column - top - 30,
			.column - top - 60,
			.column - empty2,
			.column - bottom {
                                    float:
                                    left !important; width: 100 % !important; display: block !important; }

			.column - empty {
                                    padding - bottom: 15px !important; }
			.column - empty2 {
                                    padding - bottom: 30px !important; }

			.content - spacing {
                                    width:
                                    15px !important; }
		}
	</style >
</head >
<body class="body"style = "padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#212428; -webkit-text-size-adjust:none;" >
	<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" bgcolor = "#212428" >
		<tr >
			<td align = "center" valign = "top" >
				<!--Main -->
				<table width = "650" border = "0" cellspacing = "0" cellpadding = "0" class="mobile-shell" >
					<tr >
						<td class="td" style = "width:650px; min-width:650px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;" >
							<!--Header -->
							<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
								<tr >
									<td class="p30-15" style = "padding: 40px 0px 20px 0px;" >
										<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
											<tr >
												<th class="column-top" width = "200"style = "font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;" >
													<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
														<tr >

															<td class="text-top m-center mpb5"style = "color:#FF343F; font-family: Georgia, serif; font-size:11px; line-height:22px; text-align:left; text-transform:uppercase;" ><multiline > Rtriv</multiline ></td >
														</tr >
													</table >
												</th >
												<th class="column-top"style = "font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;" >
													<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
														<tr >
															<td align = "right" >
																<table class="center" border = "0" cellspacing = "0" cellpadding = "0"style = "text-align:center;" >
																	<tr >

																		<td class="img" width = "32"style = "font-size:0pt; line-height:0pt; text-align:left;" ><a href = "#" target = "_blank" ><img src = "http://rtriv/images/whatsapp.png" width = "14" height = "13" border = "0" alt = "" /></a ></td >
																		<td class="img" width = "32"style = "font-size:0pt; line-height:0pt; text-align:left;" ><a href = "#" target = "_blank" ><img src = "http://rtriv/images/facebook.png" width = "14" height = "13" border = "0" alt = "" /></a ></td >
																		<td class="img" width = "32"style = "font-size:0pt; line-height:0pt; text-align:left;" ><a href = "#" target = "_blank" ><img src = "http://rtriv/images/instagram.png" width = "14" height = "13" border = "0" alt = "" /></a ></td >
<!--																		<td class="img" width = "32"style = "font-size:0pt; line-height:0pt; text-align:left;" ><a href = "#" target = "_blank" ><img src = "http://rtriv/images/free_ico_pinterest.jpg" width = "14" height = "13" border = "0" alt = "" /></a ></td > -->
<!--																		<td class="img" width = "14"style = "font-size:0pt; line-height:0pt; text-align:left;" ><a href = "#" target = "_blank" ><img src = "http://rtriv/images/free_ico_instagram.jpg" width = "14" height = "13" border = "0" alt = "" /></a ></td > -->
																	</tr >
																</table >
															</td >
														</tr >
													</table >
												</th >
											</tr >
										</table >
									</td >
								</tr >
								<!--END Top bar-- >
							
								<tr >
									<td bgcolor = "#343a40" class="p30-15 img-center" style = "padding: 30px; border-radius: 20px 20px 0px 0px; font-size:0pt; line-height:0pt; text-align:center;" ><a href = "https://rtriv.com/" target = "_blank" ><img src = "http://rtriv/images/icon.png"  border = "0" alt = "" /></a ></td >
								</tr >
								
					
								<tr >
									<td class="text-nav-white" bgcolor = "#FF343F"style = "color:#ffffff; font-family: Arial, sans-serif; font-size:12px; line-height:22px; text-align:center; text-transform:uppercase; padding:12px 0px;" >
										<a href = "https://rtriv.com/explore" target = "_blank" class="link-white"style = "color:#ffffff; text-decoration:none;" ><span class="link-white"style = "color:#ffffff; text-decoration:none;" > All Lost items </span ></a >
										 &nbsp; &nbsp; &nbsp;<span class="m-hide" > &nbsp; &nbsp; </span >
										<a href = "https://rtriv.com/collections/11c7a3bf64ddff38188b275b25308138" target = "_blank" class="link-white"style = "color:#ffffff; text-decoration:none;" ><span class="link-white"style = "color:#ffffff; text-decoration:none;" > Identification Documents </span ></a >
										 &nbsp; &nbsp; &nbsp;<span class="m-hide" > &nbsp; &nbsp; </span >
										<a href = "https://rtriv.com/collections/728b33b22af99eb4c7557dfdb3e2ecac" target = "_blank" class="link-white"style = "color:#ffffff; text-decoration:none;" ><span class="link-white"style = "color:#ffffff; text-decoration:none;" > Laptops</span ></a >
										 <span class="m-block" ><span class="m-hide" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span ></span >
										<a href = "https://rtriv.com/collections/242859399e90101a0ec4b24d3b6c4394" target = "_blank" class="link-white"style = "color:#ffffff; text-decoration:none;" ><span class="link-white"style = "color:#ffffff; text-decoration:none;" > Phones</span ></a >
										 &nbsp; &nbsp; &nbsp;<span class="m-hide" > &nbsp; &nbsp; </span >
										<a href = "https://rtriv.com/collections/174ef827704cd8907dbd11103bfcf136" target = "_blank" class="link-white"style = "color:#ffffff; text-decoration:none;" ><span class="link-white"style = "color:#ffffff; text-decoration:none;" > Bags</span ></a >
										 <span class="m-block" ><span class="m-hide" >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span ></span >
										<a href = "https://rtriv.com/collections/cb4e24efa188540025d4f4a828d62485" target = "_blank" class="link-white"style = "color:#ffffff; text-decoration:none;" ><span class="link-white"style = "color:#ffffff; text-decoration:none;" > Clothes</span ></a >
										 &nbsp; &nbsp; &nbsp;<span class="m-hide" > &nbsp; &nbsp; </span >
										<a href = "#" target = "_blank" class="link-white"style = "color:#ffffff; text-decoration:none;" ><span class="link-white"style = "color:#ffffff; text-decoration:none;" > contact us </span ></a > -->
									</td >
								</tr >
								<!--END Nav-- >
							</table >
					
							<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" bgcolor = "#ebebeb" >
								<tr >
									<td class="fluid-img"style = "font-size:0pt; line-height:0pt; text-align:left;" ><img src = "http://rtriv/emails/images/holiday.png" width = "650" height = "358" border = "0" alt = "" /></td >
								</tr >
								<tr >
									<td class="p30-15-0" style = "padding: 50px 30px 0px;" bgcolor = "#ffffff" >
										<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
											<tr >
												<td class="h5-center"style = "color:#a1a1a1; font-family:' . '"Raleway"' . ', Arial,sans-serif; font-size:16px; line-height:22px; text-align:center; padding-bottom:5px;" > Want to recover some lost items ?</td >
											</tr >
											<tr >
												<td class="h2-center"style = "color:#000000; font-family:' . '"Playfair Display"' . ', Times, ' . '"Times new Roman"' . ', serif; font-size:32px; line-height:36px; text-align:center; padding-bottom:20px;" > Rtriv is created specifically for that!</td >
											</tr >
											<tr >
												<td class="text-center"style = "color:#5d5c5c; font-family:' . '"Raleway"' . ', Arial,sans-serif; font-size:14px; line-height:22px; text-align:center; padding-bottom:22px;" > Dont be left out . Lets get reclaiming!. if you have found something that is lost, Perfect!. Bring it to us and get Rewarded .</td >
											</tr >
											<tr >
												<td align = "center" >
													<table border = "0" cellspacing = "0" cellpadding = "0" >
														<tr >
															<td class="text-button-orange" style = "background:#e85711; color:#ffffff; font-family:' . '"Kreon, Times new Roman"' . ', Georgia, serif; font-size:14px; line-height:18px; text-align:center; padding:10px 30px; border-radius:20px;" ><a href = "https://rtriv.com/" target = "_blank" class="link-white" style = "color:#ffffff; text-decoration:none;" ><span class="link-white" style = "color:#ffffff; text-decoration:none;" > Take me to Rtriv </span ></a ></td >
														</tr >
													</table >
												</td >
											</tr >
										</table >
									</td >
								</tr >
							</table >
					
							<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" bgcolor = "#ffffff" >
								<tr >
									<td class="p30-15-0" style = "padding: 70px 30px 0px 30px;" >
										<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
											<tr >
												<td class="h5-center"style = "color:#a1a1a1; font-family:' . '"Raleway"' . ', Arial,sans-serif; font-size:16px; line-height:22px; text-align:center; padding-bottom:5px;" ><multiline > Here Are Some Items That have been Found </multiline ></td >
											</tr >
											<tr >
												<td class="h2-center"style = "color:#000000; font-family:' . '"Raleway"' . ', Times, ' . '"Raleway"' . ', serif; font-size:32px; line-height:36px; text-align:center; padding-bottom:20px;" ><multiline > It only takes a few clicks to find that lost Item </multiline ></td >
											</tr >
											<tr >
												<td style = "padding-bottom: 25px;" >
													<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
														<tr >
															<td class="fluid-img"style = "font-size:0pt; line-height:0pt; text-align:left;" ><img src = "https://rtriv.com/images/' . $lostItems[0]["item_images"] . '" width = "290" height = "260" border = "0" alt = "" /></td >
															<td class="img" width = "10"style = "font-size:0pt; line-height:0pt; text-align:left;" ></td >
															<td class="fluid-img"style = "font-size:0pt; line-height:0pt; text-align:left;" ><img src = "http://rtriv/images/' . $lostItems[1]['item_images'] . '" width = "290" height = "260" border = "0" alt = "" /></td >
														</tr >
													</table >
												</td >
											</tr >
											<tr >
												<td class="text-center pb20"style = "color:#5d5c5c; font-family:' . '"Raleway"' . ', Arial,sans-serif; font-size:14px; line-height:22px; text-align:center; padding-bottom:20px;" ><multiline > Statistics show that 90 % of lost items in zimbabwe are never recovered .<span class="m-hide" ><br /></span > That is why we have build Rtriv so that you can have a central place to recover your lost items .<span class="m-hide" ><br /></span > We have gone a step further into making sure that all lost items that are not yet recoverable are open to the public to be accessible and available for everyone to claim .</multiline ></td >
											</tr >
									
											<tr >
												<td align = "center" >
													<table border = "0" cellspacing = "0" cellpadding = "0" >
														<tr >
															<td class="text-button3" style = "color:#000000; font-family:' . '"Raleway"' . ', ' . '"Times new Roman"' . ', Georgia, serif; font-size:14px; line-height:18px; text-align:center; border:1px solid #000000; padding:10px 30px; border-radius:20px;" ><multiline ><a href = "https://rtriv.com/" target = "_blank" class="link" style = "color:#000001; text-decoration:none;" ><span class="link" style = "color:#000001; text-decoration:none;" > View More </span ></a ></multiline ></td >
														</tr >
													</table >
												</td >
											</tr >
											
										</table >
									</td >
								</tr >
							</table >
						

						
							<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" bgcolor = "#ffffff" >
								<tr >
									<td class="fluid-img"style = "font-size:0pt; line-height:0pt; text-align:left;" ><img src = "images/free_white_blue.jpg" width = "650" height = "160" border = "0" alt = "" /></td >
								</tr >
								<tr >
									<td class="p0-15" style = "padding: 0px 30px;" bgcolor = "#dde8fd" >
										<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
											<tr >
												<td >
													<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
														<tr >
															<th class="column-top" width = "280"style = "font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;" >
																<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
																	<tr >
																		<td >
																			<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
																				<tr >
																					<td bgcolor = "#ffffff" valign = "top" ><table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" bgcolor = "#dde8fd" class="border"style = "font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%;" ><tr ><td bgcolor = "#dde8fd" height = "40" class="border"style = "font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%;" >&nbsp;</td ></tr ></table >
</td >

																					<td class="img-center" valign = "top" width = "80"style = "font-size:0pt; line-height:0pt; text-align:center;" ><img src = "https://rtriv.com/images/' . $agents[0]["user_image"] . '" width = "80" height = "80" border = "0" alt = "" /></td >
																					<td bgcolor = "#ffffff" valign = "top" ><table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" bgcolor = "#dde8fd" class="border"style = "font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%;" ><tr ><td bgcolor = "#dde8fd" height = "40" class="border"style = "font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%;" >&nbsp;</td ></tr ></table >
</td >
																				</tr >
																			</table >
																			<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" bgcolor = "#ffffff" >
																				<tr >
																					<td class="content"style = "padding:30px;" >
																						<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
																							<tr >
																								<td class="img-center pb20"style = "font-size:0pt; line-height:0pt; text-align:center; padding-bottom:20px;" ><img src = "images/orange_quote.jpg" width = "26" height = "20" border = "0" alt = "" /></td >
																							</tr >
																							<tr >
																								<td class="text-center"style = "color:#5d5c5c; font-family:' . '"Raleway"' . ', Arial,sans-serif; font-size:14px; line-height:22px; text-align:center; padding-bottom:22px;" >
																									<multiline ><em >as part of the rtriv Team we are dedicated to make sure that you are reconciled with your lost items!</em ></multiline >
																								</td >
																							</tr >
																							<tr >
																								<td class="text-2 center"style = "color:#000000; font-family:' . '"Raleway"' . ', Times, ' . '"Times new Roman"' . ', serif; font-size:14px; line-height:22px; text-align:center;" ><multiline >&mdash; ' . $agents[0]['username'] . ' </multiline ></td >
																							</tr >
																						</table >
																					</td >
																				</tr >
																			</table >
																		</td >
																	</tr >
																</table >
															</th >
															<th class="column-empty2" width = "30"style = "font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; direction:ltr;" ></th >
															<th class="column-top" width = "280"style = "font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;" >
																<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
																	<tr >
																		<td >
																			<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
																				<tr >
																					<td bgcolor = "#ffffff" valign = "top" ><table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" bgcolor = "#dde8fd" class="border"style = "font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%;" ><tr ><td bgcolor = "#dde8fd" height = "40" class="border"style = "font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%;" >&nbsp;</td ></tr ></table >
</td >
																					<td class="img-center" valign = "top" width = "80"style = "font-size:0pt; line-height:0pt; text-align:center;" ><img src = "https://rtriv.com/images/' . $agents[1]['user_image'] . '" width = "80" height = "80" border = "0" alt = "" /></td >
																					<td bgcolor = "#ffffff" valign = "top" ><table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" bgcolor = "#dde8fd" class="border"style = "font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%;" ><tr ><td bgcolor = "#dde8fd" height = "40" class="border"style = "font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%;" >&nbsp;</td ></tr ></table >
</td >
																				</tr >
																			</table >
																			<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" bgcolor = "#ffffff" >
																				<tr >
																					<td class="content"style = "padding:30px;" >
																						<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
																							<tr >
																								<td class="img-center pb20"style = "font-size:0pt; line-height:0pt; text-align:center; padding-bottom:20px;" ><img src = "images/orange_quote.jpg" width = "26" height = "20" border = "0" alt = "" /></td >
																							</tr >
																							<tr >
																								<td class="text-center"style = "color:#5d5c5c; font-family:' . '"Raleway"' . ', Arial,sans-serif; font-size:14px; line-height:22px; text-align:center; padding-bottom:22px;" >
																									<multiline ><em > What makes us glad is to see you recover all those lost items!</em ></multiline >
																								</td >
																							</tr >
																							<tr >
																								<td class="text-2 center"style = "color:#000000; font-family:' . '"Playfair Display"' . ', Times, ' . '"Times new Roman"' . ', serif; font-size:14px; line-height:22px; text-align:center;" ><multiline >&mdash; ' . $agents[1]['username'] . ' </multiline ></td >
																							</tr >
																						</table >
																					</td >
																				</tr >
																			</table >
																		</td >
																	</tr >
																</table >
															</th >
														</tr >
													</table >
												</td >
											</tr >
										</table >
									</td >
								</tr >
								<tr >
									<td class="fluid-img"style = "font-size:0pt; line-height:0pt; text-align:left;" ><img src = "images/free_blue_white.jpg" width = "650" height = "160" border = "0" alt = "" /></td >
								</tr >
							</table >
						

						
							<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
								<tr >
									<td class="p30-15-0" bgcolor = "#ffffff" style = "border-radius: 0px 0px 20px 20px; padding: 70px 30px 0px 30px;" >
										<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
											<tr >
												<td class="m-padder2 pb30" align = "center"style = "padding-bottom:30px;" >
													<table class="center" border = "0" cellspacing = "0" cellpadding = "0"style = "text-align:center;" >
														<tr >
															<td class="img" width = "40"style = "font-size:0pt; line-height:0pt; text-align:left;" ><a href = "fa" target = "_blank" ><img src = "https://rtriv.com/images/ico4_facebook.png" width = "26" height = "26" border = "0" alt = "" /></a ></td >
															<td class="img" width = "40"style = "font-size:0pt; line-height:0pt; text-align:left;" ><a href = "#" target = "_blank" ><img src = "https://rtriv.com/images/ico4_twitter.png" width = "26" height = "26" border = "0" alt = "" /></a ></td >
															<td class="img" width = "40"style = "font-size:0pt; line-height:0pt; text-align:left;" ><a href = "#" target = "_blank" ><img src = "https://rtriv.com/images/ico4_gplus.png" width = "26" height = "26" border = "0" alt = "" /></a ></td >
															<td class="img" width = "40"style = "font-size:0pt; line-height:0pt; text-align:left;" ><a href = "#" target = "_blank" ><img src = "https://rtriv.com/images/ico4_youtube.png" width = "26" height = "26" border = "0" alt = "" /></a ></td >
															<td class="img" width = "40"style = "font-size:0pt; line-height:0pt; text-align:left;" ><a href = "#" target = "_blank" ><img src = "https://rtriv.com/images/ico4_instagram.png" width = "26" height = "26" border = "0" alt = "" /></a ></td >
														</tr >
													</table >
												</td >
											</tr >
											<tr >
												<td align = "center" class="p30-15" style = "border-top: 1px solid #ebebeb; padding: 30px;" >
													<table class="center" border = "0" cellspacing = "0" cellpadding = "0"style = "text-align:center;" >
														<tr >
															<th class="column-top" width = "180"style = "font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;" >
																<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
																	<tr >
																		<td class="text-footer"style = "color:#5d5c5c; font-family:' . '"Raleway"' . ', Arial,sans-serif; font-size:13px; line-height:22px; text-align:left;" >
																			<multiline >
																				<strong > Items & Collections </strong ><br />
																				<a href = "https://www.rtriv.com/explore" target = "_blank" class="link-grey"style = "color:#5d5c5c; text-decoration:none;" ><span class="link-grey"style = "color:#5d5c5c; text-decoration:none;" > All Rtriv Items </span ></a > <br />
																				<a href = "https://www.rtriv.com/collections" target = "_blank" class="link-grey"style = "color:#5d5c5c; text-decoration:none;" ><span class="link-grey"style = "color:#5d5c5c; text-decoration:none;" > Rtriv Collections </span ></a > <br />
																				<a href = "https://www.rtriv.com/requests" target = "_blank" class="link-grey"style = "color:#5d5c5c; text-decoration:none;" ><span class="link-grey"style = "color:#5d5c5c; text-decoration:none;" > All Lost Items to Find </span ></a >
																				<a href = "https://www.rtriv.com/items/privacy/policy" target = "_blank" class="link-grey"style = "color:#5d5c5c; text-decoration:none;" ><span class="link-grey"style = "color:#5d5c5c; text-decoration:none;" > Privacy Policy </span ></a ><br />
																			</multiline >
																		</td >
																	</tr >
																</table >
															</th >
															<th class="column-empty" width = "20"style = "font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; direction:ltr;" ></th >
															<th class="column-top" width = "180"style = "font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;" >
																<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
																	<tr >
																		<td class="text-footer"style = "color:#5d5c5c; font-family:' . '"Raleway"' . ', Arial,sans-serif; font-size:13px; line-height:22px; text-align:left;" >
																			<multiline >
																				<strong > Resources</strong ><br />
																				<a href = "https://rtriv.com/items/create" target = "_blank" class="link-grey"style = "color:#5d5c5c; text-decoration:none;" ><span class="link-grey"style = "color:#5d5c5c; text-decoration:none;" > Find Your Lost Items </span ></a ><br />
																				<a href = "https://rtriv.com/items/faq" target = "_blank" class="link-grey"style = "color:#5d5c5c; text-decoration:none;" ><span class="link-grey"style = "color:#5d5c5c; text-decoration:none;" > FAQ</span ></a ><br />
																				<a href = "https://rtriv.com/items/contact" target = "_blank" class="link-grey"style = "color:#5d5c5c; text-decoration:none;" ><span class="link-grey"style = "color:#5d5c5c; text-decoration:none;" > Contact Us </span ></a ><br />
																				<a href = "https://rtriv.com/items/return/policy" target = "_blank" class="link-grey"style = "color:#5d5c5c; text-decoration:none;" ><span class="link-grey"style = "color:#5d5c5c; text-decoration:none;" >return Policy </span ></a ><br />

																			</multiline >
																		</td >
																	</tr >
																</table >
															</th >
															<th class="column-empty" width = "20"style = "font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; direction:ltr;" ></th >
															<th class="column-top" width = "180"style = "font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;" >
																<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
																	<tr >
																		<td class="text-footer"style = "color:#5d5c5c; font-family:' . '"Raleway"' . ', Arial,sans-serif; font-size:13px; line-height:22px; text-align:left;" >
																			<multiline >
																				<strong > Delivery Information </strong ><br />
																				<a href = "https://rtriv.com/signin" target = "_blank" class="link-grey"style = "color:#5d5c5c; text-decoration:none;" ><span class="link-grey"style = "color:#5d5c5c; text-decoration:none;" > Login</span ></a > <br />
																				<a href = "https://rtriv.com/signup" target = "_blank" class="link-grey"style = "color:#5d5c5c; text-decoration:none;" ><span class="link-grey"style = "color:#5d5c5c; text-decoration:none;" > Register</span ></a > <br />
																				<a href = "https://rtriv.com/password/reset" target = "_blank" class="link-grey"style = "color:#5d5c5c; text-decoration:none;" ><span class="link-grey"style = "color:#5d5c5c; text-decoration:none;" > Reset Password </span ></a > <br />
																				<a href = "https://rtriv.com/blog" target = "_blank" class="link-grey"style = "color:#5d5c5c; text-decoration:none;" ><span class="link-grey"style = "color:#5d5c5c; text-decoration:none;" > Blog</span ></a > <br />
																			</multiline >
																		</td >
																	</tr >
																</table >
															</th >
														</tr >
													</table >
												</td >
											</tr >
										</table >
									</td >
								</tr >
							</table >
							<table width = "100%" border = "0" cellspacing = "0" cellpadding = "0" >
								<tr >
									<td class="text-footer2 p30-15" style = "padding: 30px 15px 50px 15px; color:#a9b6e0; font-family:' . '"Raleway"' . ', Arial,sans-serif; font-size:12px; line-height:22px; text-align:center;" ><multiline > Want to change how you receive these emails ? <br />You can < a href = "https://rtriv.com/unsubscribe/" target = "_blank" class="link-white"style = "color:#ffffff; text-decoration:none;" ><span class="link-white"style = "color:#ffffff; text-decoration:none;" > Unsubscribe</span ></a > from this list.</multiline ></td >
								</tr >
							</table >

						</td >
					</tr >
				</table >
				

			</td >
		</tr >
	</table >
</body >
</html > ';}

    public function sendTextNewsLetter(string $name): string
    {
        return " Hi $name \n\n We have some new items recently uploaded. Visit https://rtriv.com/ to check out the recent items. Who knows what you could find ?. \n\n Regards\n Rtriv Team \n ";
    }

}