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
        $str="SELECT * FROM todo";
        $dsn = 'mysql: host=localhost; dbname=' . $this->data["db_name"];
        try {
            $this->pdo = new PDO($dsn, $this->data["user"], $this->data["db_password"]);
            $this->pdo->exec("set names utf8");

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $this->pdo->query($str);

            $rows = $stm->fetchAll(PDO::FETCH_NUM);

            foreach($rows as $row) {

                printf("$row[0] $row[1] $row[2]\n");
            }

        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getAll(){
        $str="SELECT * FROM todo";
        $dsn = 'mysql: host=localhost; dbname=' . $this->data["db_name"];



        $stm = $this->pdo->query($str);

        $rows = $stm->fetchAll(PDO::FETCH_NUM);

        foreach($rows as $row) {

            printf("$row[0] $row[1] $row[2]\n");
        }
    }

}
