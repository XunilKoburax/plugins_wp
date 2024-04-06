<?php

function cbt_script_validacion(){ // Registro de la funcion de validacion
    wp_register_script("cbt-validacion",plugins_url("../../public/assets/js/validacion.js",__FILE__)); //carga del archivo para validar
}
add_action("wp_enqueue_scripts","cbt_script_validacion");//registro de la funcion para wordpress


function cbt_get_form(){
    wp_enqueue_script("cbt-validacion"); //llamado de la validacion para aplicarlo en el formulario
    $response='<div class="loginform">
    <form id="ValidationForm">
        <h1>Username</h1>
        <input type="text" name="usename" id="username">
        <h2>Password</h2>
        <input type="password" name="password" id="password">

        <input type="submit" value="Enviar">

    </form>
</div>';
 return $response;
}

add_shortcode("cbt_getlogin","cbt_get_form");