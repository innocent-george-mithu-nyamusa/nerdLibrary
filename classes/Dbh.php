<?php


namespace Classes;

use PDO;
use PDOException;

class Dbh
{

    private $host = "localhost";
    private $user = "developer_nerdlibrary";
    private $pwd = "Coollifestyle@1";
    private $dbName = "nerdlibrary";

    protected function connect()
    {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }catch (PDOException $exception){
            echo $exception->getMessage();
            return null;
        }

    }
}