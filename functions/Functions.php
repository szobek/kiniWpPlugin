<?php

class Functions
{
    public $arr = [
        "content"=>"okok",
        "display"=>"none"
    ];
    function listUsers(){
        global $wpdb;

       $sql = "SELECT todo.content,todo.id, wp_users.display_name FROM `todo` JOIN wp_users ON wp_users.ID=todo.user_id WHERE todo.user_id=wp_users.ID";
        $results = $wpdb->get_results( $sql, OBJECT );

        $arr=[];
        foreach ($results as $result){
            $arr[$result->display_name]["name"]=$result->display_name;
            $arr[$result->display_name]["todo"][]=["content"=>$result->content,"id"=>$result->id];

        }

        return $arr;
    }
    function delTodo($id) {
        global $wpdb;
        $wpdb->delete( "todo", array( "id" => $id ) );

    }
    function url($fn){
        $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
        $url = $protocol."://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']."&crud=".$fn;
        return $url;
    }
    /*********** itt lesz az összes crud ************/

    function crudDelete($id){
        global $wpdb;
        $wpdb->delete( "todo", array( "id" => $id ) );
    }
    function crudModifyView($id){
        global $wpdb;
        $sql = "SELECT content,id FROM todo WHERE id=".$id;
        $results = $wpdb->get_row( $sql, OBJECT );

        $this->arr["display"] = "block";
        $this->arr["content"] = $results->content;
    }
    function crudNew(){
        echo "új";
    }
    function crudModifyFunction($id,$content){
        global $wpdb;
        $results  = $wpdb->update("todo",["content"=>$content],["id"=>$id ]);
    }
}