<?php



//
add_action('init', 'theme_custom_post_type_menu');

/**
 * Register the theme custom post type
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function theme_custom_post_type_menu() {

    $labels = array(
        'name' => 'Menu',
        'singular_name' => 'Menu',
        'menu_name' => 'Menu',
        'name_admin_bar' => 'Menu',
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
        'menu_icon' => 'dashicons-carrot',
        'query_var' => true,
        'rewrite' => array('slug' => 'menu'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),
            //'taxonomies' => array('category')
//        'taxonomies' => array('category', 'post_tag')
    );

    register_post_type('menu', $args);

}

/* Custom Taxonomies */

function theme_custom_category_menu() {

    //Tipo de bastidores
    $labels = array(
        'name' => 'Categorias do menu',
        'singular_name' => 'Categorias menu',
        'search_items' => 'Buscar',
        'all_items' => 'Todos',
        'parent_item' => __('Parent'),
        'parent_item_colon' => __('Parent:'),
        'edit_item' => 'Editar',
        'update_item' => 'Editar',
        'add_new_item' => 'Adicionar nova categoria',
        'new_item_name' => 'Nova categoria',
        'menu_name' => __('Categoria Menu'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'cat-concierge'),
    );

    register_taxonomy('cat-menu', array('menu'), $args);
    //end - Tipo de bastidores

}

add_action('init', 'theme_custom_category_menu');
