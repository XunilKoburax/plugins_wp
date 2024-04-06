<?php
function mostrar_grafico_estadisticas() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'estadisticas';
    $resultados = $wpdb->get_results("SELECT edad FROM $table_name", ARRAY_A);

    $edades = array_column($resultados, 'edad');
    $promedio = array_sum($edades) / count($edades);
    $moda = array_keys(array_count_values($edades), max(array_count_values($edades)));
    $mediana = median($edades);

    wp_enqueue_script('chartjs', 'https://cdn.jsdelivr.net/npm/chart.js', array(), null, true);
    wp_enqueue_script('mi-script', plugins_url('../../public/assets/js/grafic.js', __FILE__), array('chartjs'), null, true);

    wp_localize_script('mi-script', 'datosGrafico', array(
        'edades' => $edades,
        'promedio' => $promedio,
        'moda' => $moda,
        'mediana' => $mediana
    ));

    return '<canvas id="miGrafico"></canvas>';
}

add_shortcode('mostrar_grafico', 'mostrar_grafico_estadisticas');

function median($arr) {
    sort($arr);
    $count = count($arr);
    $middleVal = floor(($count - 1) / 2);

    if ($count % 2) {
        return $arr[$middleVal];
    } else {
        $low = $arr[$middleVal];
        $high = $arr[$middleVal + 1];
        return (($low + $high) / 2);
    }
}
