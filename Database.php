<?php

class Database extends PDO
{

    private $host = "localhost";
    private $dbname = "keygen"; //DATABASE NAME change it if you have created another database
    private $username = "YOUER_USERNAME"; //YOUR USERNAME
    private $password = "YOUR_PASSWORD"; //YOUR PASSWORD
    public function __construct()
    {
        try {

            parent::__construct("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $ex) {
            die($ex);
        }
    }
}


?>