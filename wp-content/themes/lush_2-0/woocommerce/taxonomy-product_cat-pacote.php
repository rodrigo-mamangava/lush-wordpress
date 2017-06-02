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


    <div class="faixa-destaque">
        <div class="container-fluid">
            <div class="row">
                <div class="para-presentear col-sm-8 col-sm-offset-2">

                    <h2><?php _e('To gift', 'lush_2-0') ?></h2>
                    <h3><?php _e('Lush Gift Card', 'lush_2-0') ?></h3>

                    <img class="gift-cards-mobile visible-xs center-block" src="<?php uri() ?>/img/gift-v2.png" >

                    <div class="row">
                        <div class="col-sm-6 texto">
                            <p>
                                <?php
                                _traduz(
                                        'Presente com estilo e personalidade com nossos certificados de presente disponíveis em vários valores e válido para qualquer categoria de suítes, qualquer dia da semana e também no consumo do bar ou restaurante.', 'Present with style and personality with our gift certificates available in various values and valid for any category of suites, any day of the week and also in the consumption of the bar or restaurant.'
                                );
                                ?>
                            </p>
                        </div>
                    </div>

                    <a class="btn-verde-v02" href="<?php echo get_term_link('gift-card', 'product_cat') ?>" ><?php _e('Buy now', 'lush_2-0') ?></a>

                    <img class="gift-cards hidden-xs " src="<?php uri() ?>/img/gift-v2.png" >


                </div><!-- para-presentear -->
            </div>

        </div>
    </div><!-- faixa-destaque-->




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
                            _traduz('PACOTES ESPECIAIS', 'SPECIAL PACKAGES');
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>


        <?php
        get_template_part('template-parts/experiencia/pacote/menu', 'simples');
        ?>


        <div class="pacote-loop">



            <div class="container-fluid">
                <?php
                get_template_part('template-parts/experiencia/pacote/loop');
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

