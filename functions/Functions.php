<?php

class Functions
{

    function listUsers(){
        global $wpdb;

       $sql = "SELECT todo.content,todo.id, wp_users.display_name FROM `todo` JOIN wp_users ON wp_users.ID=todo.user_id WHERE todo.user_id=wp_users.ID";
        $results = $wpdb->get_results( $sql, OBJECT );

        return $results;
    }
    function delTodo($id) {
        global $wpdb;
        $wpdb->delete( "todo", array( "id" => $id ) );

    }
}