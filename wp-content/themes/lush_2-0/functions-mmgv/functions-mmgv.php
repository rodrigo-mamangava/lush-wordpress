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

add_image_size('vitrine-suite', 1008, 672, true);
add_image_size('destaque-home', 1280, 540, true);
add_image_size('faixa-intercalada', 384, 364, true);
add_image_size('carousel-suite', 814, 593, true);
add_image_size('loop-simples', 442, 281, true);
add_image_size('faixa-destaque', 500, 474, true);
add_image_size('add-pacote', 240, 92, true);
add_image_size('icones-concierge', 50, 50, false);

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

        if ($term->slug == $nome_cat) {
            return true;
            exit;
        }
    }
    return false;
}

/**
 * Imprime o TIPO-BASTIDORES de um determinado BASTIDORES ITEM
 * @global type $post
 * @return boolean
 */
function get_bastibores_item_cat() {
    global $post;

    $terms = get_the_terms($post->ID, 'tipo-bastidores');

    if (!$terms) {
        return false;
    }

    $term_name = $terms[0]->name;
    $term_slug = $terms[0]->slug;

    if ($term_slug == 'lush-na-midia') {
        echo '<a href="#"  id="flag-midia" >' . $term_name . '</a>';
    } else {
        echo '<a href="#" id="flag-essencia" >' . $term_name . '</a>';
    }
}

function post_on() {
    global $post;
    $time_string = _e(esc_html(get_the_date()));
    echo $time_string;
}

function get_link_page_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return get_page_link($page->ID);
    } else {
        return null;
    }
}

/**
 * Recursively sort an array of taxonomy terms hierarchically. Child categories will be
 * placed under a 'children' member of their parent term.
 * @param Array   $cats     taxonomy term objects to sort
 * @param Array   $into     result array to put them in
 * @param integer $parentId the current parent ID to put them in
 */
function sort_terms_hierarchicaly(Array &$cats, Array &$into, $parentId = 0) {
    foreach ($cats as $i => $cat) {
        if ($cat->parent == $parentId) {
            $into[$cat->term_id] = $cat;
            unset($cats[$i]);
        }
    }

    foreach ($into as $topCat) {
        $topCat->children = array();
        sort_terms_hierarchicaly($cats, $topCat->children, $topCat->term_id);
    }
}

function printMenu($slug) {

    $args = array(
        'post_type' => 'menu',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'cat-menu',
                'field' => 'slug',
                'terms' => $slug,
            ),
        ),
    );
    $the_query = new WP_Query($args);
    ?>

    <?php if ($the_query->have_posts()): ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="col-xs-12" >
                <?php the_title('<p>', '</p>'); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php
    wp_reset_postdata();
}

function printMenuFilho($slug) {

    $args = array(
        'post_type' => 'menu',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'asc',
        'tax_query' => array(
            array(
                'taxonomy' => 'cat-menu',
                'field' => 'slug',
                'terms' => $slug,
            ),
        ),
    );
    $the_query = new WP_Query($args);
    ?>

    <?php if ($the_query->have_posts()): ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <?php the_title('<p>', '</p>'); ?>

        <?php endwhile; ?>
    <?php endif; ?>

    <?php
    wp_reset_postdata();
}

function getCustomImage($field_name, $size = 'full') {
    $image = get_field($field_name);
    return $image["sizes"][$size];

}
