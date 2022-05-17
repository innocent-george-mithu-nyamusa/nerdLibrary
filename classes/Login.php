<?php

namespace Classes;

use Exception;
use PDO;

class Login extends Dbh
{

    private $userEmail;
    private $password;

    public function __construct(){

    }

    protected function setPassword(string $password): void
    {
        $this->password = $password;
    }

    protected function setEmail(string $email): void
    {
        $this->userEmail = $email;
    }

    protected function isUserValid(): bool
    {
        return $this->validateUser();
    }

    private function validateUser(): bool
    {
        $utilities = new Utilities();

        try {
            $loginQuery = "SELECT user_no, user_id, username, user_fullname, user_password, user_image, user_role, user_status, user_account_type, user_account_currency FROM user WHERE user_email = ?";
            $login_stmt = $this->connect()->prepare($loginQuery);
            $login_stmt->execute([$this->userEmail]);

            $countUsers = $login_stmt->rowCount();
            $hash = $login_stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($countUsers > 0) {

//                session_start();

                if (password_verify($this->password, $hash[0]['user_password'])) {

                    session_regenerate_id(true);

                    $login_stmt->closeCursor();

                    $_SESSION["user_fullname"]= $hash[0]["user_fullname"];
                    $_SESSION["no"]= $hash[0]["user_no"];
                    $_SESSION["role"] = $hash[0]["user_role"];
                    $_SESSION["user_id"] = $hash[0]["user_id"];
                    $_SESSION["username"] = $hash[0]["username"];
                    $_SESSION["user_email"] = $this->userEmail;
                    $_SESSION["image"] = $hash[0]["user_image"];
                    $_SESSION["subscription"] = $hash[0]["user_account_type"];
                    $_SESSION["currency"] = $hash[0]["user_account_currency"];
                    $_SESSION["authenticated"] = true;

//                    $expiration = new \DateTime($hash[0]["subscription_expiration"]);
//
//                    if($utilities->isSubscriptionValid($expiration)){
//
//                        $_SESSION["validSubscription"] = true;
//                    }else {
//                        $_SESSION["validSubscription"] = false;
//                    }P1234567890q

                    return true;
                }
                return false;
            } else {
//                echo "failed to login";
                return false;
            }

        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

}
