<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if (empty($product) || !$product->is_visible()) {
    return;
}
?>

<div class="row item-suite">            
    <div id="foto-suite" class="col-sm-7 foto-produto hidden-xs">                
        <?php woocommerce_show_product_images_carousel(); ?>
    </div>
    <div class="col-sm-5 detalhes">
        <div class="row">
            <div class="col-sm-7 col-sm-offset-2">
                <?php wc_get_template_part('loop/suite', 'detalhes'); ?>
            </div>
        </div>
    </div>
    <div id="foto-suite" class="col-sm-7 foto-produto visible-xs">                
        <?php woocommerce_show_product_images_carousel(); ?>
    </div> 
</div><!--item-suite-->