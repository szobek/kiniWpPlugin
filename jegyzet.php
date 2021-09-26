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
