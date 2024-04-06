<?php
/*
 * Plugin Name:       Registrador-wp
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Registrador personalizado, hecho a manita.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      8.0
 * Author:            CBTA-134
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       localhost
 
 */


 function pg_set_encabezado(){
    echo "<h1>Hola mundo</h1>";
 }
 add_action("wp_head","pg_set_encabezado");

//API para respuestas
require_once plugin_dir_path(__FILE__)."includes/API/demo_parametros.php";
require_once plugin_dir_path(__FILE__)."includes/API/insertar_parametros.php";


//Rutas
require_once plugin_dir_path(__FILE__)."public/shortcodes/main_login.php";
require_once plugin_dir_path(__FILE__)."public/shortcodes/formulario.php";
