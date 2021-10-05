<?php

class Connect  {
    private $pdo;


    private $data = [
        "user" => "root",
        "db_name" => "wp",
        "db_password" => "",
    ];
    public function __construct()
    {

        $dsn = 'mysql: host=localhost; dbname=' . $this->data["db_name"];
        try {
            $this->pdo = new PDO($dsn, $this->data["user"], $this->data["db_password"]);
            $this->pdo->exec("set names utf8");

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

}
