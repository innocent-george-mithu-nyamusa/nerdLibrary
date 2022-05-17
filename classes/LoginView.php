<?php

namespace Classes;

class LoginView extends LoginContr {

  private $status;

  public function __construct(string $password, string $email) {

    $this->addPassword($password);
    $this->addEmail($email);

    $this->status = $this->checkStatus();
  }

  public function loginStatus(): bool {
    return $this->status;
  }

}
