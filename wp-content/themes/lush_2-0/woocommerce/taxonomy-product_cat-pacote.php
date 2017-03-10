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
                    <div class="row">
                        <div class="col-sm-6 ">
                            <p>
                                <?php 
                                $text = 'Presenteie com muito estilo e personalidade com nossos vales-presente disponíveis em diversos valores e válidos para qualquer categoria de suítes, em qualquer dia da semana e também no consumo do bar ou restaurante.';
                                _e($text, 'lush_2-0')?>
                            </p>
                        </div>
                    </div>

                    <a class="btn-verde-v02" href="<?php echo get_term_link('gift-card', 'product_cat') ?>" ><?php _e('Buy now', 'lush_2-0') ?></a>

                    <img class="gift-cards" src="<?php uri() ?>/img/gift-card.png" >


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
                            PACOTES ESPECIAIS
                        </h2>
                    </div>
                </div>
            </div>
        </div>
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

