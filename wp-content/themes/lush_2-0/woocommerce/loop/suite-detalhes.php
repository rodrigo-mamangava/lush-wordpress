<?php woocommerce_template_loop_product_title() ?> 
<p><span class="price"><?php _e('from', 'lush_2-0')?></span></p>
<?php wc_get_template( 'loop/price-simple-loop.php' ); ?>
<?php get_suite_price();?>
<?php woocommerce_template_loop_product_link_open() ?>
    <?php _e('I want to book', 'lush_2-0')?>
<?php woocommerce_template_loop_product_link_close(); ?>
