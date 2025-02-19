<?php
/**
 * Plugin Name: Resultados da Mega-sena
 * Plugin URI: http://wp-plugin.megasena.hurpia.com.br/
 * Description: Busca e exibe os últimos resultados da Mega-Sena da API.
 * Version: 1.0.0
 * Author: Andrey Rocha
 * Author URI: http://andrey.hurpia.com.br/
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function fetch_resultados_da_megasena() {
    try {
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
        $output .= '<h3>Resultado do Sorteio ' . esc_html($data['nrSorteio']) . ' da Mega-sena</h3>';
        $output .= '<p><strong>Data:</strong> ' . esc_html($data['dtSorteio']) . '</p>';
        $output .= '<p><strong>Números Sorteados:</strong> ' . esc_html($data['dsSorteadosSorteio']) . '</p>';
        $output .= '</div>';
    
        return $output;
    } catch (Exception $e) {
        return '<p>Erro ao buscar os resultados.</p>';
    }
}

function mega_sena_shortcode() {
    return fetch_resultados_da_megasena();
}

add_shortcode('resultados_da_megasena', 'mega_sena_shortcode');
 