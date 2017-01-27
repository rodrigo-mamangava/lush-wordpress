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
    $img = get_template_directory_uri() . '/img/img-centro@2x_1.jpg';
    $titulo = 'Gift Card';
    get_new_vitrine_tradutor($img, $titulo);
    ?>

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
                            O LUSH te ajuda a transformar sua comemoração em uma 
                            experiência sensorial completa. Acrescente na reserva da 
                            suíte um dos pacotes abaixo.
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

                        <div class="pacote-item col-xs-12 col-sm-10 col-sm-offset-1">
                            <div class="row">
                                <div class="col-sm-6 item-texto">                      
                                    <?php the_title('<h3>', '</h3>'); ?>
                                    <?php the_content(); ?>
                                </div><!-- item-texto -->
                                <div class="col-sm-6 item-reserve">
                                    <div class="preco">
                                        <p>
                                            <?php
//                                            $price = get_post_meta( get_the_ID(), '_regular_price', true);;
//                                            echo $price;
                                            echo $product->get_price_html();
                                            ?>
                                        </p>
                                    </div>
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

