<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
?>

<?php
/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form();
    return;
}
?>


<div  itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class('suite-single'); ?> >

    <?php get_new_vitrine_completo(); ?>

    <div  class="container-fluid faixa-detalhes">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-1">
                <?php woocommerce_template_single_add_to_cart(); ?>
            </div><!-- descricao --> 

            <div class="col-sm-6 col-sm-offset-1 info-preco">

                <div class="tabela-preco">
                    <div>
                        <p>
                            <?php _e('Daily (Sunday to Thursday)', 'lush_2-0'); ?> 
                            <span><?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('diaria_d_q'); ?></span>
                        </p>
                        <p class="descricao">
                            <?php _e('Check in 3pm and Check out 1pm', 'lush_2-0'); ?> 
                        </p>
                    </div>
                    <div>
                        <p>
                            <?php _e('Daily (Friday, Saturday and Holidays)', 'lush_2-0'); ?> 
                            <span><?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('diaria_s_s_f'); ?></span>
                        </p>
                        <p class="descricao">
                            <?php _e('Check in 3pm and Check out 1pm', 'lush_2-0'); ?> 
                        </p>
                    </div>
                    <div>
                        <p>
                            <?php _e('Period', 'lush_2-0'); ?> 
                            <span><?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('periodo'); ?></span>
                        </p>
                        <p class="descricao">
                            <?php _e('(12 hours from Monday to Thursday)', 'lush_2-0'); ?> 
                        </p>
                        <p class="descricao">
                            <?php _e('(4 hours Friday, Saturday, Sunday and holiday eve)', 'lush_2-0'); ?> 
                        </p>
                    </div>
                    <div>
                        <p>
                            <?php _e('Overnight stay', 'lush_2-0'); ?> 
                            <span><?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('pernoite'); ?></span>
                        </p>
                        <p class="descricao">
                            <?php _e('(Check-in 8pm and Check-Out 1pm)', 'lush_2-0'); ?> 
                        </p>
                    </div>
                    <div>
                        <p>
                            <?php _e('Promotional period', 'lush_2-0'); ?> 
                            <span><?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('periodo_3hr'); ?></span>
                        </p>
                        <p class="descricao">
                            <?php _e('03 hours (Monday to Thursday)', 'lush_2-0'); ?> 
                        </p>

                    </div>
                    <div>
                        <p>
                            <?php _e('Additional hour', 'lush_2-0'); ?> 
                            <span><?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('hr_adicional'); ?></span>
                        </p>

                    </div>

                </div>

                <?php
                $faq = get_page_by_slug('faq');
                ?>
                <a href="<?php echo esc_url(get_page_link($faq->ID)); ?>" class="info-checkin">
                    <?php _e('Doubts? Click here to access our FAQ', 'lush_2-0'); ?>
                </a>




            </div><!-- info-preco -->
        </div><!-- row -->
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 atributos">
                <?php the_content(); ?>
            </div>
        </div><!-- row -->


        <?php get_template_part('template-parts/compartilhar', 'suite'); ?>

    </div><!-- faixa-detalhes -->

    <div class="container-fluid faixa-fotos-produto">
        <div class="row">
            <?php woocommerce_show_product_images_carousel(); ?>            
        </div>
    </div><!-- faixa-fotos-produto -->




    <?php wc_get_template_part('content', 'suites-simple-loop'); ?>


    <?php get_template_part('template-parts/faixa/concierge'); ?>


</div><!-- suite-single -->

