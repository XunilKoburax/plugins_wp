<?php
function cbt_script_insert() {
    wp_enqueue_script("cbt-insertarwp", plugins_url("../../public/assets/js/insertForm.js",__FILE__), array(), null, true);
}
add_action("wp_enqueue_scripts", "cbt_script_insert");

function cbt_set_statistics() {
    $response = '<div class="data">
    <form method="post" id="estadisticasForm">
        <h1>Nombre</h1>
        <input type="text" name="nombre" id="nombre">
        <h2>Edad</h2>
        <input type="number" name="edad" id="edad">
        <br>
        <input type="submit" value="Enviar">
        <div class="msg"></div>
    </form>
</div>';
    return $response;
}
add_shortcode("cbt_set_statistics", "cbt_set_statistics");
