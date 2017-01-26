<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

add_action('after_setup_theme', 'woocommerce_support');

function woocommerce_support() {
    add_theme_support('woocommerce');
}

/**
 * Output the product sorting options.
 *
 * @subpackage	Loop
 */
function woocommerce_catalog_ordering_lush_suite() {
    global $wp_query;

    if (1 === $wp_query->found_posts || !woocommerce_products_will_display()) {
        return;
    }

    $orderby = isset($_GET['orderby']) ? wc_clean($_GET['orderby']) : apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby'));
    $show_default_orderby = 'menu_order' === apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby'));
    $catalog_orderby_options = apply_filters('woocommerce_catalog_orderby', array(
        'menu_order' => __('Default sorting', 'woocommerce'),
        'popularity' => __('Sort by popularity', 'woocommerce'),
        'rating' => __('Sort by average rating', 'woocommerce'),
        'date' => __('Sort by newness', 'woocommerce'),
        'price' => __('Sort by price: low to high', 'woocommerce'),
        'price-desc' => __('Sort by price: high to low', 'woocommerce')
    ));

    if (!$show_default_orderby) {
        unset($catalog_orderby_options['menu_order']);
    }

    if ('no' === get_option('woocommerce_enable_review_rating')) {
        unset($catalog_orderby_options['rating']);
    }

    wc_get_template('loop/orderby-simples.php', array('catalog_orderby_options' => $catalog_orderby_options, 'orderby' => $orderby, 'show_default_orderby' => $show_default_orderby));
}



//custom get price html
add_filter( 'woocommerce_get_price_html', 'custom_price_html', 100, 2 );
function custom_price_html( $price, $product ){
    return str_replace( '</del>', '<span class="del-img"></span></del>', $price );
}