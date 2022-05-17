<?php

namespace Classes;

use Classes\Utilities;

class SignUpContr extends SignUp
{

    private $cUsename;
    private $cEmail;
    private $cFullname;
    private $cId;
    private $password;

    private  function  createPassword(): void {
       $this->password = password_hash($this->password, PASSWORD_BCRYPT, array("cost"=> 12));
    }

    private function createId() {
        $this->cId = Utilities::genUniqueId('user');

    }

    protected function setCUserAccountCurrency(string $user_account_currency): void
    {
        parent::setUserAccountCurrency($user_account_currency);
    }

    protected function setCUserAccountType(string $user_account_type): void
    {
        parent::setUserAccountType($user_account_type);
    }


    private function checkUsername() : void{
        $this->setUsername($this->cUsename);
    }

    private function checkEmail(): void {
        $this->setEmail($this->cEmail);
    }

    private function checkFullname(): void {
        $this->setUserFullName($this->cFullname);
    }


    private function checkId(): void {
        $this->createId();
        $this->setId($this->cId);
    }

    private function checkPassword(): void{
        $this->createPassword();
        $this->setPassword($this->password);
    }

    protected function getUsername(string $username): void{
        $this->cUsename = $username;
        $this->checkUsername();
    }

    protected function getPhone(string $phone): void {

        $this->setPhone($phone);
    }

    protected function getEmail(string $email) : void {
        $this->cEmail = $email;
        $this->checkEmail();
    }

    protected function getFullname(string $fullname) : void  {
        $this->cFullname = $fullname;
        $this->checkFullname();
    }

    protected function getPassword(string $password) : void{
        $this->password = $password;
        $this->checkPassword();
    }

    protected function getId() : void{
        $this->checkId();
    }

    protected function getSignUpStatus(): bool {

        return $this->createAdminStatus();
    }

}