<?php
/**
 * Plugin Name: Mega-Sena Results
 * Plugin URI: https://andreyrocha.dev
 * Description: Fetches and displays the latest Mega-Sena results from the API.
 * Version: 1.0.0
 * Author: Andrey Rocha
 * Author URI: https://andreyrocha.dev
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function fetch_mega_sena_results() {
    $api_url = 'https://api.megasena.hurpia.com.br/megasena/ultima';

    $response = wp_remote_get($api_url);
    
    if (is_wp_error($response)) {
        return '<p>Erro ao buscar os resultados.</p>';
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if (!$data || !isset($data['nrSorteio'], $data['dtSorteio'], $data['dsSorteadosSorteio'])) {
        return '<p>Não foi possível obter os resultados.</p>';
    }

    $output = '<div class="mega-sena-results">';
    $output .= '<h3>Resultado do Sorteio #' . esc_html($data['nrSorteio']) . '</h3>';
    $output .= '<p><strong>Data:</strong> ' . esc_html($data['dtSorteio']) . '</p>';
    $output .= '<p><strong>Números Sorteados:</strong> ' . esc_html($data['dsSorteadosSorteio']) . '</p>';
    $output .= '</div>';

    return $output;
}

function mega_sena_shortcode() {
    return fetch_mega_sena_results();
}

add_shortcode('mega_sena_results', 'mega_sena_shortcode');
 