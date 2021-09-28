<?php

class Connect  {
    private $pdo;
    private $result;
    private $caller;

    public function __construct()
    {
        $user = "root";
        $db_name = 'wp';
        $db_pass = "";
        $password = $db_pass;
        $dsn = 'mysql: host=localhost; dbname=' . $db_name;
        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->exec("set names utf8");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $this->pdo->prepare("SELECT * FROM todo");
            $stm->execute();

            $row = $stm->fetch(PDO::FETCH_ASSOC);

            echo "Id: " . $row['id'] . PHP_EOL;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

}
