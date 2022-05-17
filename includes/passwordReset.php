<?php


use Classes\EmailView;
use Classes\SignUpView;
use Classes\UserView;

if(isset($_POST["password_reset_email"])) {

  $userObj = new UserView();
  $emailObj = new EmailView();
  $signUpObj = new SignUpView();

  if($userObj->checkEmail($_POST["password_reset_email"])) {

      $id=$signUpObj->getUserId($_POST["password_reset_email"]);
//      TODO::TEST RESET PASSWORD EMAIL;
      $emailObj->sendPasswordResetEmail(" ", $_POST["password_reset_email"], $id);
      echo 1;
  }

}else {
    echo 0;
}
