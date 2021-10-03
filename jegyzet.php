<?php
/*
Plugin Name: Jegyzet
Version: 0.1
Plugin URI:
Description:
Author: szobek
Author URI: https://szobekweb.hu
*/
$css = "";
$rand = rand( 1, 99999999999 );
add_action('admin_menu', 'lista_button');
add_action( 'wp_ajax_my_action', 'my_action' );
wp_register_style('front', '/wp-content/plugins/jegyzet/front/dist.css','',$rand);
function my_action() {
    global $wpdb;
    $whatever = 15;
    $whatever += 10;
    $user = wp_authenticate( 'admin', 'A16LtvA$VzU#0tyuGX' );
    $results = $wpdb->get_results( "SELECT * FROM todo WHERE user_id = $user->id", OBJECT );
    wp_die();
}
function lista_button()
{
    add_menu_page(
        'Jegyzet',
        'Jegyzet lista',
        'read', // mindenki aki olvasási joga van
        'listazas',
        'listTodo',
        'dashicons-welcome-widgets-menus'
    );
}
function listTodo() {
   include "front/front.php";
}
