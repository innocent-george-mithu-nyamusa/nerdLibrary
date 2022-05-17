<?php

namespace Classes;

use Classes\Utilities;

class LoginContr extends Login {

  private $cPassword;
  private $cEmail;

  public function __construct() {
  }

  protected function addEmail($email):void {
    $this->cEmail = Utilities::cleanData($email);
    $this->checkEmail();
  }
  protected function addPassword($pass): void {
    $this->cPassword = Utilities::cleanData($pass);
    $this->checkPassword();
  }

  private function checkEmail(): void {
    $this->setEmail($this->cEmail);
  }
  private function checkPassword(): void {
    $this->setPassword($this->cPassword);
  }

  protected function checkStatus(): bool{
    return $this->isUserValid();
  }

}

 ?>
