<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Debugar a funcao com pre e var_dump
 * @param type $var
 */
function debug($var) {
    echo '<pre>';
    echo var_dump($var);
    echo '<pre>';
}

function uri() {
    echo get_template_directory_uri();
}

add_image_size('carousel-suite', 814, 593, true);
add_image_size('loop-simples', 442, 281, true);
add_image_size('faixa-destaque', 500, 474, true);

/**
 * Verificar se produto tem determinada categoria
 * @global type $post
 * @param type $nome_cat
 * @return boolean
 */
function mmgv_has_product_cat($nome_cat) {
    global $post;
    $terms = get_the_terms($post->ID, 'product_cat');
    foreach ($terms as $term) {

        if($term->slug == $nome_cat){
            return true;
            exit;
        }
    }
    return false;
}
