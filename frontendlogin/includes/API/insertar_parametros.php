<?php

function cbt_insertar_parametros(){
    register_rest_route(
        
        "cbt",//namespace
        "insertarwp",//nombre de mi ruta donde el navegador recibe la peticion
        array(
            "methods"=>"POST", //manera en la que recibimos los datos usualmente get y post
            "callback"=>"cbt_escribir_datos" //funcion que recibe los parametros a procesar y tenemos que llamar
        ) //Recibimos varios parametros por eso utilizamos una lista de estos datos
    );
}

function cbt_escribir_datos($insert_request){
    if (isset($insert_request['nombre']) && isset($insert_request['edad'])) {  //son los valores que esperamos por parte del formulario
        $nombre = sanitize_text_field($insert_request['nombre']); //evitamos que nos ingresen algunos datos dentro del formulario
        $edad = intval($insert_request['edad']);//validamos que el dato sea un numero

        global $wpdb; //utilizamos al manejador de la base de datos
        $table_name = $wpdb->prefix . 'estadisticas'; //colocamos el nombre la tabla que vamos a rellenar
        $wpdb->insert($table_name, array('nombre' => $nombre, 'edad' => $edad)); //aqui agregamos los datos que seran llenados en la tabla.

        echo json_encode(array('success' => true, 'message' => 'Datos guardados exitosamente')); //Regresamos exito en caso de que este bien
    } else {
        echo json_encode(array('success' => false, 'message' => 'Error al guardar los datos'));//Regresamos error si hay alguna situacion
    }

    //wp_die();
}
add_action("rest_api_init","cbt_insertar_parametros");