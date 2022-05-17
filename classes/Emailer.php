<?php

namespace Classes;

use DateInterval;
use DateTime;
use Exception;
use SendGrid;
use SendGrid\Mail\Mail;
use SendGrid\Mail\TypeException;

class Emailer extends Dbh
{
    private string $centralEmail = "centralemail@gmail.com";
    private string $centralName = "Central Play";
    private string $recipientEmail;
    private string $recipientName;
    private string $verificationCode;
    private string $verificationToken;
    private string $userVerificationId;

//    public function __construct($name, $email, $messagePlain, $messageHtml){
//
//        $mail = new Mail();
//
//        $mail->setFrom("lostandfound@lostandfound.com", "Lost and Found");
//        $mail->setSubject("Thanks for Signing Up with Lost and Found. Please Verify your Account");
//        $mail->addTo("$email", "$name");
//        $mail->addContent("text/plain", $messagePlain);
//        $mail->addContent("text/html", $messageHtml);
//
//        $sendgrid = new SendGrid("key here");
//
//        try {
//            $response = $sendgrid->send($email);
//            // print $response->statusCode() . "\n";
//            // print_r($response->headers());
//            // print $response->body() . "\n";
////            $request = new UserRequest($name, $email, $messagePlain);
//        } catch (Exception $e) {
//            echo "Caught exception ". $e->getMessage(). "\n";
//        }
//
//    }

    /**
     * @param string $userVerificationId
     */
    protected function setUserVerificationId(string $userVerificationId): void
    {
        $this->userVerificationId = $userVerificationId;
    }

    /**
     * @param string $recipientEmail
     */
    protected function setRecipientEmail(string $recipientEmail): void
    {
        $this->recipientEmail = $recipientEmail;
    }

    /**
     * @param string $recipientName
     */
    protected function setRecipientName(string $recipientName): void
    {
        $this->recipientName = $recipientName;
    }

    /**
     * @param string $verificationCode
     */
    protected function setVerificationCode(string $verificationCode): void
    {
        $this->verificationCode = $verificationCode;
    }

    protected function verifyAccountStatus(): bool {
        return $this->verifyEmailAccountMail();
    }

    private function verifyEmailAccountMail(): bool {
        $timeExpired = new DateTime("now");
        $timeExpired = $timeExpired->add(new DateInterval('P10M'));
        $timeExpired = $timeExpired->format("Y-m-d H:i");

        $verificationEmail = new Mail();
        //        TODO::IMPLEMENT ROUTE TO HANDLE THIS IN HTACCESS
        //Link to verify account
        //Structure of Link to verify account
        //filename:: acc_ver
        //channel:: email
        //user email account:: registered email account
        //purpose::verification
        //verification_code:: verificationCode
        $uniqueLinkTxt = $this->recipientName. Utilities::$accountVerificationText . "https://www.nerdlibary.com/acc_ver/email/".$this->recipientEmail."/verification/".$this->verificationCode. "\n. Click the Above link to Verify Your Account. Please verify your Account within 10 minutes. \n Your Token Expires in 10 minutes.";

        $verificationEmail->setFrom($this->centralEmail, $this->centralName);
        $verificationEmail->setSubject(Utilities::$emailVerificationSubject);
        $verificationEmail->addTo("$this->recipientEmail", $this->recipientName);
        $verificationEmail->addContent("text/plain", $uniqueLinkTxt);
        $verificationEmail->addContent("text/html", Utilities::$emailverificationHtml);

//        TODO::CREATE AND PLACE TOKEN HERE
        $sendgrid = new SendGrid("key here");

        try {

            $response = $sendgrid->send($verificationEmail);

            $addCodeQuery = "INSERT INTO account_verification_codes (account_to_verify, account_email_verify, account_verification_code, account_code_expiry) VALUES (:accountUserId, :accountUserEmail,:accountVerificationCode, :accountCodeExpiry)";

            if($response->statusCode() == 200) {
                $addCodeStmt = $this->connect()->prepare($addCodeQuery);
                $addCodeStmt->bindParam(":accountUserId", $this->userVerificationId);
                $addCodeStmt->bindParam(":accountUserEmail", $this->recipientEmail);
                $addCodeStmt->bindParam(":accountVerificationCode", $this->verificationCode);
                $addCodeStmt->bindParam(":accountCodeExpiry", $timeExpired);
                $result = $addCodeStmt->execute();
                $addCodeStmt->closeCursor();
                return $result;

            }
            return false;
        }catch (Exception $exception){

            echo "Error Sending Email ". $exception->getMessage();
            return false;
        }
}


protected function passwordResetResult(): bool {
        return $this->resetPasswordEmail();
}

    private function resetPasswordEmail(): bool {

        $timeExpired = new DateTime("now");
        $timeExpired = $timeExpired->add(new DateInterval('P1D'));
        $timeExpired = $timeExpired->format("Y-m-d H:i");

        $verificationEmail = new Mail();
//        TODO::IMPLEMENT ROUTE TO HANDLE THIS IN HTACCESS
        $passwordResetMailTxt = Utilities::$accountPasswordResetText . "https://www.centralplay.co.zw/pass_ver/email/reset_password/".$this->verificationCode. "\n. Click the Above link to Reset Your Password. Please reset your Account within 24 Hours. \n Your Token Expires in 24 Hours. If you didn't request this reset ignore this email.\n Central Play Team";

        $verificationEmail->setFrom($this->centralEmail, $this->centralName);
        try {

            $verificationEmail->setSubject(Utilities::$accountPasswordResetSubect);

        } catch (TypeException $e) {

            echo $e->getMessage();
            return false;
        }

        $verificationEmail->addTo("$this->recipientEmail", $this->recipientName);
        $verificationEmail->addContent("text/plain", $passwordResetMailTxt);
        $verificationEmail->addContent("text/html", Utilities::$accountPasswordResetHtml);

//        TODO::CREATE AND PLACE TOKEN HERE
        $sendgrid = new SendGrid("key here");

        try {

            $response = $sendgrid->send($verificationEmail);

            $addCodeQuery = "INSERT INTO password_reset_codes(account_to_verify, account_email_verify, account_verification_code, account_code_expiry) VALUES (:accountUserId, :accountUserEmail,:accountVerificationCode, :accountCodeExpiry)";

            if($response->statusCode() == 200) {

                $addCodeStmt = $this->connect()->prepare($addCodeQuery);
                $addCodeStmt->bindParam(":accountUserId", $this->userVerificationId);
                $addCodeStmt->bindParam(":accountUserEmail", $this->recipientEmail);
                $addCodeStmt->bindParam(":accountVerificationCode", $this->verificationCode);
                $addCodeStmt->bindParam(":accountCodeExpiry", $timeExpired);
                $result = $addCodeStmt->execute();
                $addCodeStmt->closeCursor();
                return $result;
            }

            return false;
        }catch (Exception $exception){

            echo "Error Sending Email ". $exception->getMessage();
            return false;
        }
    }


}