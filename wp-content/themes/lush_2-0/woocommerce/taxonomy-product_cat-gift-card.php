<?php
/**
 * cat-suite
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


get_header('home');
?>

<?php
get_template_part('template-parts/menu/geral');
?>

<div class="experiencia-single">


    <?php
    $img = get_template_directory_uri() . '/img/gift-card-2.jpg';
    $titulo = 'Gift Card';
    get_new_vitrine_tradutor($img, $titulo);
    ?>
    
    <?php add_cart_notice(); ?>

    <?php
    woocommerce_output_content_wrapper();
    ?>

    <?php if (have_posts()) : ?>

        <?php
        //woocommerce_catalog_ordering_lush_suite();
        ?>


        <?php
        global $wp_query;
        ?>

        <div class="faixa-texto-simples">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <h2>
                            <?php
                            $pb = 'O Gift Card é um vale presente em 3 opções de valores que podem ser utilizado em todas as categorias de suítes e no consumo do nosso restaurante. Com validade de 3 meses, e em qualquer dia da semana. Temos uma versão digital por e-mail ou com a caixa de presente com laço que enviamos pelo correio. Escolhe a melhor opção para presentear uma pessoa especial.';
                            $en = 'The Gift Card is a gift voucher in 3 options of values that can be used in all as suite categories and in the consumption of our restaurant. Valid for 3 months, and on any day of the week. We have a digital version by e-mail or with a gift box with what is mailed. Choose the best option to gift a special person.';
                            _traduz($pb, $en);
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="pacote-loop">
            <div class="container-fluid">
                <?php
                foreach ($wp_query->posts as $key => $suite) {
                    the_post();
                    ?>
                    <div class="row">

                        <?php global $product; ?>

                        <div class="pacote-item gift-item  col-xs-12 col-sm-10 col-sm-offset-1">
                            <div class="row">
                                <div class="col-sm-6 item-texto-gift">                      
                                    <h3><?php echo get_the_title(); ?> <span><?php echo get_the_content();?></span></h3>
                                    
                                </div><!-- item-texto -->
                                <div class="col-sm-6 item-reserve">
                                    
                                    <?php wc_get_template_part('single-product/add-to-cart/simple', 'lush'); ?>

                                </div><!-- item-reserve -->
                            </div>
                        </div><!-- pacote-item -->
                    </div>
                    <?php
                }
                ?>
            </div>
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

    <div class="container-fluid">

        <div class="row">

            <?php get_template_part('template-parts/compartilhar', 'pacote'); ?>

        </div>

    </div>

    <?php
    /**
     * woocommerce_after_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action('woocommerce_after_main_content');
    ?>



</div>



<?php get_footer('shop'); ?>

