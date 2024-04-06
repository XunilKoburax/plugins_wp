<?php
function cbt_recibir_parametros(){
    register_rest_route(
        
        "cbt",//namespace
        "registro",//nombre de mi ruta donde el navegador recibe la peticion
        array(
            "methods"=>"POST", //manera en la que recibimos los datos usualmente get y post
            "callback"=>"cbt_recibir_datos" //funcion que recibe los parametros a procesar y tenemos que llamar
        ) //Recibimos varios parametros por eso utilizamos una lista de estos datos
    );
}
function cbt_recibir_datos($request){
    return $request->get_params();
}


//se crea un metodo para implementar nuestras funciones
add_action("rest_api_init","cbt_recibir_parametros");
