<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */
if (!defined('ABSPATH')) {
    exit;
}

global $post, $product;
$attachment_ids = $product->get_gallery_attachment_ids();
?>



<div id="carousel-suite-<?php echo $post->ID; ?>" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php foreach ($attachment_ids as $key => $foto) : ?>
            <li data-target="#carousel-suite-<?php echo $post->ID; ?>" data-slide-to="<?php echo $key ?>" <?php echo ($key == 0) ? 'class="active"' : '' ?> ></li>
        <?php endforeach; ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'carousel-suite'); ?>" >           
        </div>
        <?php foreach ($attachment_ids as $attachment_id) : $image = wc_get_product_attachment_props($attachment_id, $post); ?>
            <div class="item">
                <?php echo wp_get_attachment_image($attachment_id, 'carousel-suite', 0, $image) ?>    
            </div>
        <?php endforeach; ?>
    </div>


    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-suite-<?php echo $post->ID; ?>" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-suite-<?php echo $post->ID; ?>" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>



</div>
