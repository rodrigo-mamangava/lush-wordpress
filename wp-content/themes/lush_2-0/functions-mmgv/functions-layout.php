<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Imprime uma vitrine full-screen de uma imagem
 * 
 * @param type $img url da imagem ou img completa
 * @param type $isUrl true se passar url e false se for a imagem completa
 * @param type $titulo
 * @param type $link
 */
function getVitrine($img, $isUrl, $titulo, $link = '#') {
    ?>
    <div class="container-fluid vitrine">
        <div class="row">

            <div class="vitrine-content">

                <div class=" image-vitrine">  
                    <?php if ($isUrl): ?>
                        <img src="<?php echo $img; ?>">
                    <?php else: ?>
                        <?php echo $img; ?>
                    <?php endif; ?>
                </div>

                <div class=" sub-titulo">                    
                    <h2> <?php echo "$titulo"; ?></h2>                    
                </div>

                <div class="img-filter"></div>

                <div class=" seta-baixo">      
                    <a href="<?php echo $link ?>">
                        <img src="<?php uri() ?>/img/seta_baixo@2x.png" class="img-responsive">   
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Get vitrine for product single page SUITE
 * @param type $img
 * @param type $isUrl
 * @param type $titulo
 * @param type $link
 */
function get_new_vitrine($img, $titulo) {
    ?>
    <div class = "container-fluid vitrine-interna">
        <div class = "row">
            <div class="vitrine-content" style="background-image: url(<?php echo $img; ?>)">
                <div class = " sub-titulo">
                    <h2><?php echo $titulo; ?></h2>                    
                </div>
                <div class="img-filter"></div>
            </div>
        </div>
    </div>
    <?php
}
function get_new_vitrine_tradutor($img, $titulo) {
    ?>
    <div class = "container-fluid vitrine-interna">
        <div class = "row">
            <div class="vitrine-content" style="background-image: url(<?php echo $img; ?>)">
                <div class = " sub-titulo">
                    <h2><?php _e($titulo, 'lush_2-0') ?></h2>                    
                </div>
                <div class="img-filter"></div>
            </div>
        </div>
    </div>
    <?php
}

function get_new_vitrine_completo() {

    global $post;
    ?>
    <div class = "container-fluid vitrine-interna">
        <div class = "row">
            <div class="vitrine-content" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID); ?>)">
                <div class = " sub-titulo">
                    <h1><?php echo get_the_title(); ?></h1>                    
                </div>
                <div class="img-filter"></div>
            </div>
        </div>
    </div>
    <?php
}

function wp_nav_menu_lush($args = array()) {
    static $menu_id_slugs = array();

    $defaults = array('menu' => '', 'container' => 'div', 'container_class' => '', 'container_id' => '', 'menu_class' => 'menu', 'menu_id' => '',
        'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth' => 0, 'walker' => '', 'theme_location' => '');

    $args = wp_parse_args($args, $defaults);
    /**
     * Filters the arguments used to display a navigation menu.
     *
     * @since 3.0.0
     *
     * @see wp_nav_menu()
     *
     * @param array $args Array of wp_nav_menu() arguments.
     */
    $args = apply_filters('wp_nav_menu_args', $args);
    $args = (object) $args;

    /**
     * Filters whether to short-circuit the wp_nav_menu() output.
     *
     * Returning a non-null value to the filter will short-circuit
     * wp_nav_menu(), echoing that value if $args->echo is true,
     * returning that value otherwise.
     *
     * @since 3.9.0
     *
     * @see wp_nav_menu()
     *
     * @param string|null $output Nav menu output to short-circuit with. Default null.
     * @param object      $args   An object containing wp_nav_menu() arguments.
     */
    $nav_menu = apply_filters('pre_wp_nav_menu', null, $args);

    if (null !== $nav_menu) {
        if ($args->echo) {
            echo $nav_menu;
            return;
        }

        return $nav_menu;
    }

// Get the nav menu based on the requested menu
    $menu = wp_get_nav_menu_object($args->menu);

// Get the nav menu based on the theme_location
    if (!$menu && $args->theme_location && ( $locations = get_nav_menu_locations() ) && isset($locations[$args->theme_location]))
        $menu = wp_get_nav_menu_object($locations[$args->theme_location]);

// get the first menu that has items if we still can't find a menu
    if (!$menu && !$args->theme_location) {
        $menus = wp_get_nav_menus();
        foreach ($menus as $menu_maybe) {
            if ($menu_items = wp_get_nav_menu_items($menu_maybe->term_id, array('update_post_term_cache' => false))) {
                $menu = $menu_maybe;
                break;
            }
        }
    }

    if (empty($args->menu)) {
        $args->menu = $menu;
    }

// If the menu exists, get its items.
    if ($menu && !is_wp_error($menu) && !isset($menu_items))
        $menu_items = wp_get_nav_menu_items($menu->term_id, array('update_post_term_cache' => false));

    /*
     * If no menu was found:
     *  - Fall back (if one was specified), or bail.
     *
     * If no menu items were found:
     *  - Fall back, but only if no theme location was specified.
     *  - Otherwise, bail.
     */
    if ((!$menu || is_wp_error($menu) || ( isset($menu_items) && empty($menu_items) && !$args->theme_location ) ) && isset($args->fallback_cb) && $args->fallback_cb && is_callable($args->fallback_cb))
        return call_user_func($args->fallback_cb, (array) $args);

    if (!$menu || is_wp_error($menu))
        return false;

    $nav_menu = $items = '';

    $show_container = false;
    if ($args->container) {
        /**
         * Filters the list of HTML tags that are valid for use as menu containers.
         *
         * @since 3.0.0
         *
         * @param array $tags The acceptable HTML tags for use as menu containers.
         *                    Default is array containing 'div' and 'nav'.
         */
        $allowed_tags = apply_filters('wp_nav_menu_container_allowedtags', array('div', 'nav'));
        if (is_string($args->container) && in_array($args->container, $allowed_tags)) {
            $show_container = true;
            $class = $args->container_class ? ' class="' . esc_attr($args->container_class) . '"' : ' class="menu-' . $menu->slug . '-container"';
            $id = $args->container_id ? ' id="' . esc_attr($args->container_id) . '"' : '';
            $nav_menu .= '<' . $args->container . $id . $class . '>';
        }
    }

// Set up the $menu_item variables
    _wp_menu_item_classes_by_context($menu_items);

    $sorted_menu_items = $menu_items_with_children = array();
    foreach ((array) $menu_items as $menu_item) {
        $sorted_menu_items[$menu_item->menu_order] = $menu_item;
        if ($menu_item->menu_item_parent)
            $menu_items_with_children[$menu_item->menu_item_parent] = true;
    }

// Add the menu-item-has-children class where applicable
    if ($menu_items_with_children) {
        foreach ($sorted_menu_items as &$menu_item) {
            if (isset($menu_items_with_children[$menu_item->ID]))
                $menu_item->classes[] = 'menu-item-has-children';
        }
    }

    unset($menu_items, $menu_item);

    /**
     * Filters the sorted list of menu item objects before generating the menu's HTML.
     *
     * @since 3.1.0
     *
     * @param array  $sorted_menu_items The menu items, sorted by each menu item's menu order.
     * @param object $args              An object containing wp_nav_menu() arguments.
     */
    $sorted_menu_items = apply_filters('wp_nav_menu_objects', $sorted_menu_items, $args);

    $items .= walk_nav_menu_tree($sorted_menu_items, $args->depth, $args);
    unset($sorted_menu_items);

// Attributes
    if (!empty($args->menu_id)) {
        $wrap_id = $args->menu_id;
    } else {
        $wrap_id = 'menu-' . $menu->slug;
        while (in_array($wrap_id, $menu_id_slugs)) {
            if (preg_match('#-(\d+)$#', $wrap_id, $matches))
                $wrap_id = preg_replace('#-(\d+)$#', '-' . ++$matches[1], $wrap_id);
            else
                $wrap_id = $wrap_id . '-1';
        }
    }
    $menu_id_slugs[] = $wrap_id;

    $wrap_class = $args->menu_class ? $args->menu_class : '';

    /**
     * Filters the HTML list content for navigation menus.
     *
     * @since 3.0.0
     *
     * @see wp_nav_menu()
     *
     * @param string $items The HTML list content for the menu items.
     * @param object $args  An object containing wp_nav_menu() arguments.
     */
    $items = apply_filters('wp_nav_menu_items', $items, $args);
    /**
     * Filters the HTML list content for a specific navigation menu.
     *
     * @since 3.0.0
     *
     * @see wp_nav_menu()
     *
     * @param string $items The HTML list content for the menu items.
     * @param object $args  An object containing wp_nav_menu() arguments.
     */
    $items = apply_filters("wp_nav_menu_{$menu->slug}_items", $items, $args);

// Don't print any markup if there are no items at this point.
    if (empty($items))
        return false;

    $nav_menu .= sprintf($args->items_wrap, esc_attr($wrap_id), esc_attr($wrap_class), $items);
    unset($items);

    if ($show_container)
        $nav_menu .= '</' . $args->container . '>';

    /**
     * Filters the HTML content for navigation menus.
     *
     * @since 3.0.0
     *
     * @see wp_nav_menu()
     *
     * @param string $nav_menu The HTML content for the navigation menu.
     * @param object $args     An object containing wp_nav_menu() arguments.
     */
    $nav_menu = apply_filters('wp_nav_menu', $nav_menu, $args);

    if ($args->echo)
        echo $nav_menu;
    else
        return $nav_menu;
}

function woocommerce_show_product_images_carousel() {
    wc_get_template('single-product/product-images-carousel.php');
}

add_filter('wp_nav_menu_items', 'add_reserva_in_menu', 10, 2);

function add_reserva_in_menu($items, $args) {
    

    
    if ($args->theme_location == 'principal') {

        $items .= '</ul>';
        $items .= '<ul class="nav navbar-nav navbar-right">';
        $items .= '<li><a class="btn-reserva-v2" href="'. get_term_link('suite', 'product_cat') .'">'.__('Book', 'lush_2-0').'</a></li>';
        $items .= '</ul>';
    }
    return $items;
}

/**
 * Imprime a FAIXA DESTAQUE PAR (img e texto)
 * @param type $url_img
 * @param type $icone
 * @param type $titulo
 * @param type $texto
 * @param type $link
 * @param type $frase_link
 */
function faixa_destaque_par($url_img, $icone, $titulo, $texto, $link, $frase_link) {
    ?>
    <div class="subfaixa-destaque col-xs-12">
        <div class="row">
            <div class="item-subfaixa">
                <div class="col-sm-5 destaque-img">
                    <img src="<?php echo $url_img; ?>" class="img-destaque">
                </div>
                <div class=" col-sm-7 destaque-texto">
                    <?php if($icone):?>
                    <img class="icon-destaque" src="<?php echo $icone; ?>">
                    <?php endif;?>
                    <h3><?php echo $titulo; ?></h3>
                    <p>
                        <?php echo $texto; ?>
                    </p>
                    <a href="<?php echo $link; ?>"><?php echo $frase_link; ?></a>
                </div>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Imprime a FAIXA DESTAQUE IMPAR (texto e img)
 * @param type $url_img
 * @param type $icone
 * @param type $titulo
 * @param type $texto
 * @param type $link
 * @param type $frase_link
 */
function faixa_destaque_impar($url_img, $icone, $titulo, $texto, $link, $frase_link) {
    ?>
    <div class="subfaixa-destaque col-xs-12">
        <div class="row">
            <div class="item-subfaixa">
                <div class="col-sm-5 destaque-img visible-xs">
                    <img src="<?php echo $url_img; ?>" class="img-destaque">
                </div>
                <div class=" col-sm-7 destaque-texto">
                    <?php if($icone):?>
                    <img class="icon-destaque" src="<?php echo $icone; ?>">
                    <?php endif;?>
                    <h3><?php echo $titulo; ?></h3>
                    <p>
                        <?php echo $texto; ?>
                    </p>
                    <a href="<?php echo $link; ?>"><?php _e($frase_link, 'lush_2-0') ?></a>
                </div>
                <div class="col-sm-5 destaque-img hidden-xs">
                    <img src="<?php echo $url_img; ?>" class="img-destaque">
                </div>
            </div>
        </div>
    </div>
    <?php
}

function get_faixa_simples($class, $texto, $class_btn, $link_btn, $texto_btn) {
    ?>
    <div class="container <?php echo $class; ?>">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <p>
                    <?php echo $texto; ?>
                </p>
                <a class="<?php echo $class_btn; ?>" href="<?php echo $link_btn; ?>">
                    <?php _e($texto_btn, 'lush_2-0') ?>
                </a>
            </div>
        </div>
    </div><!-- faixa-explore -->
    <?php
}



function get_suite_price(){
    
    global $product;
    $price = get_post_meta(get_the_ID(), 'booking', true);
    echo $price;
}



/**
 * Plugin Name: WooCommerce Remove Variation "From: $XX" Price
 * Plugin URI: https://gist.github.com/BFTrick/7643587
 * Description: Disable the WooCommerce variable product "From: $X" price.
 * Author: Patrick Rauland
 * Author URI: http://patrickrauland.com/
 * Version: 1.0
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author    	Patrick Rauland
 * @since		1.0
 */
function patricks_custom_variation_price( $price, $product ) {
	$target_product_types = array( 
		'variable' 
	);
	if ( in_array ( $product->product_type, $target_product_types ) ) {
		// if variable product return and empty string
		return '';
	}
	// return normal price
	return $price;
}
add_filter('woocommerce_get_price_html', 'patricks_custom_variation_price', 10, 2);

