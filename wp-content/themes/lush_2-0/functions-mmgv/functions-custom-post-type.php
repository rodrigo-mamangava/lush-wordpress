<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//
add_action('init', 'theme_custom_post_type');

/**
 * Register the theme custom post type
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function theme_custom_post_type() {

    $labels = array(
        'name' => 'Bastidores',
        'singular_name' => 'Bastidores',
        'menu_name' => 'Bastidores',
        'name_admin_bar' => 'Bastidores',
        'add_new' => 'Novo',
        'add_new_item' => 'Novo',
        'new_item' => 'Novo',
        'edit_item' => 'Editar',
        'view_item' => 'Ver',
        'all_items' => 'Todos',
        'search_items' => 'Buscar',
        'parent_item_colon' => 'Botões',
        'not_found' => 'Não localizado.',
        'not_found_in_trash' => 'Item não localizado no lixo.'
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'your-plugin-textdomain'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-editor-bold',
        'query_var' => true,
        'rewrite' => array('slug' => 'bastidores'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),
            //'taxonomies' => array('category')
//        'taxonomies' => array('category', 'post_tag')
    );

    register_post_type('bastidores', $args);

}

/* Custom Taxonomies */

function theme_custom_category() {

    //Tipo de bastidores
    $labels = array(
        'name' => 'Tipo de bastidores',
        'singular_name' => 'Tipo de bastidores',
        'search_items' => 'Buscar',
        'all_items' => 'Todos',
        'parent_item' => __('Parent'),
        'parent_item_colon' => __('Parent:'),
        'edit_item' => 'Editar',
        'update_item' => 'Editar',
        'add_new_item' => 'Adicionar novo tipo de bastidores',
        'new_item_name' => 'Novo tipo de bastidores',
        'menu_name' => __('Tipo de bastidores'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tipo-bastidores'),
    );

    register_taxonomy('tipo-bastidores', array('bastidores'), $args);
    //end - Tipo de bastidores

}

add_action('init', 'theme_custom_category');
