<?php
/**
 * cat-suite
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


get_header('branco');
?>

<?php
woocommerce_output_content_wrapper();
?>

<?php if (have_posts()) : ?>

    <?php
    woocommerce_catalog_ordering_lush_suite();
    ?>

    <?php //woocommerce_product_loop_start(); ?>

    <?php //woocommerce_product_subcategories();  ?>

    <?php
    global $wp_query;
    ?>

    <div class="container-fluid lista-suites">
        <?php
        foreach ($wp_query->posts as $key => $suite) {

            the_post();

            if ($key % 2 == 0) {
                wc_get_template_part('content', 'suite-par');
            } else {

                wc_get_template_part('content', 'suite-impar');
            }
        }
        ?>

    </div>



    <?php woocommerce_product_loop_end(); ?>

    <?php
    /**
     * woocommerce_after_shop_loop hook.
     *
     * @hooked woocommerce_pagination - 10
     */
    do_action('woocommerce_after_shop_loop');
    ?>

<?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

    <?php wc_get_template('loop/no-products-found.php'); ?>

<?php endif; ?>

<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>


<div class="container-fluid faixa-btn">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-sm-offset-4">
            <a class="btn-concierge">Serviços de concierge</a>
        </div>
    </div>
</div>



<?php get_footer('shop'); ?>

