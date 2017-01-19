<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('home');
?>

<?php get_template_part('template-parts/menu/geral'); ?>

<?php woocommerce_output_content_wrapper(); ?>

<?php while (have_posts()) : the_post(); ?>

    <?php

    if (mmgv_has_product_cat('suite')) {
        wc_get_template_part('content', 'single-product-suite');
    } else {
        wc_get_template_part('content', 'single-product');
    }
    ?>


<?php endwhile; // end of the loop.    ?>

<?php

woocommerce_output_content_wrapper_end()
?>



<?php get_footer(); ?>
