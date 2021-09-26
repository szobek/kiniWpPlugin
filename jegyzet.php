<?php
/*
Plugin Name: Jegyzet
Version: 0.1
Plugin URI:
Description:
Author: szobek
Author URI: https://szobekweb.hu
*/
add_action('admin_menu', 'lista_button');
function lista_button()
{
    add_menu_page(
        'Jegyzet',
        'Jegyzet lista',
        'read', // mindenki aki olvasási joga van
        'listazas',
        'listRooms',
        'dashicons-welcome-widgets-menus'
    );
}

class Connect  {
    private $pdo;
    private $result;
    private $caller;

    public function __construct()
    {
        $user = "root";
        $db_name = 'szobekwe_wp1';
        $db_pass = "";
        $password = $db_pass;
        $dsn = 'mysql: host=localhost; dbname=' . $db_name;
        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->exec("set names utf8");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    private function makeCall($callString) {
        $this->caller = $callString;
        $res = $this->pdo->prepare();
        $res->execute($this->caller);
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $this->result[] = $row;
        }

        return $this->result;
    }

    public function getAllRoom() {
        $this->makeCall("SELECT * FROM todo");
    }
}
