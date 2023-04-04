<?php

class DataBase
{
    public $dbuser = 'root';
    public $dbpass = '';
    public $dsn = 'mysql:host=localhost;dbname=monchercosmetics';

    public $conn;

    public function __construct()
    {
        try {
            $conn = new PDO($this->dsn, $this->dbuser, $this->dbpass);
        } catch (PDOException $err) {
            echo 'the database connection is not established';
        }

        return $this->conn = $conn;
    }
}

new DataBase;
