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
                <?php
                //liberar     
                woocommerce_template_single_add_to_cart();
                ?>
            </div><!-- descricao --> 

            <div class="col-sm-6 col-sm-offset-1 info-preco">

                <div class="tabela-preco">

                    <?php if (get_field('periodo_3hr') != ''): ?>

                        <div><!-- Período promocional -->                       
                            <p>
                                <?php _traduz('Período promocional', 'Promotional period'); ?>
                                <span class="hidden-xs hidden-sm" ><?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('periodo_3hr'); ?></span>
                            </p>
                            <p class="descricao">
                                <?php _traduz('03 horas (de segunda a quinta-feira)', '03 hours (Monday to Thursday)'); ?>
                            </p>
                            <p class="visible-xs visible-sm preco-mobile">
                                <?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('periodo_3hr'); ?>
                            </p>
                        </div><!-- /Período promocional -->

                    <?php endif; ?>
                    <?php if (get_field('periodo') != ''): ?>

                        <div><!-- Período -->
                            <p>
                                <?php
                                _traduz('Período', 'Period');
                                ?> 
                                <span class="hidden-xs hidden-sm" ><?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('periodo'); ?></span>
                            </p>
                            <p class="descricao">
                                <?php _traduz('(4 horas sexta-feira, sábado, domingo e véspera de feriado)', '(4 hours Friday, Saturday, Sunday and holiday eve)'); ?>
                            </p>
                            <p class="descricao">
                                <?php _traduz('(12 horas de segunda a quinta-feira)', '(12 hours from Monday to Thursday)'); ?>
                            </p>

                            <p class="visible-xs visible-sm preco-mobile">
                                <?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('periodo'); ?>
                            </p>
                        </div><!-- /Período -->

                    <?php endif; ?>
                    <?php if (get_field('pernoite') != ''): ?>


                        <div><!-- Pernoite (de domingo a quinta-feira) -->
                            <p> 
                                <?php _traduz('Pernoite (de domingo a quinta-feira)', 'Overnight (from Sunday to Thursday)'); ?>
                                <span class="hidden-xs hidden-sm" ><?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('pernoite'); ?></span>
                            </p>
                            <p class="descricao">
                                <?php _traduz('Check-in 20hr e Check-Out 13hr', 'Check-in 8pm and Check-Out 1pm'); ?>
                            </p>
                            <p class="visible-xs visible-sm preco-mobile">
                                <?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('pernoite'); ?>
                            </p>
                        </div><!-- /Pernoite (de domingo a quinta-feira) -->

                    <?php endif; ?>
                    <?php if (get_field('pernoite_2') != ''): ?>

                        <div><!-- Pernoite (sexta, sábado e véspera de feriado) -->
                            <p> 
                                <?php _traduz('Pernoite (sexta, sábado e véspera de feriado)', 'Overnight (Friday, Saturday and holiday night)'); ?>
                                <span class="hidden-xs hidden-sm" ><?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('pernoite_2'); ?></span>
                            </p>
                            <p class="descricao">
                                <?php _traduz('Check-in 02hr e Check-Out 13hr', 'Check-in 02am and Check-Out 1pm'); ?>
                            </p>
                            <p class="visible-xs visible-sm preco-mobile">
                                <?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('pernoite_2'); ?>
                            </p>
                        </div><!-- /Pernoite (sexta, sábado e véspera de feriado) -->

                    <?php endif; ?>
                    <?php if (get_field('diaria_d_q') != ''): ?>

                        <div><!-- Diária (de domingo a quinta-feira) -->
                            <p>
                                <?php
                                _traduz('Diária (de domingo a quinta-feira)', 'Daily (Sunday to Thursday)');
                                ?> 
                                <span class="hidden-xs hidden-sm" ><?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('diaria_d_q'); ?></span>
                            </p>
                            <p class="descricao">
                                <?php
                                _traduz('Check-in 15h e Check-out 13h', 'Check-in 3pm and Check-out 1pm')
                                ?>
                            </p>
                            <p class="visible-xs visible-sm preco-mobile">
                                <?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('diaria_d_q'); ?></span>
                            </p>
                        </div><!-- /Diária (de domingo a quinta-feira) -->

                    <?php endif; ?>
                    <?php if (get_field('diaria_s_s_f') != ''): ?>

                        <div><!-- Diária (sexta-feira, sábado e véspera de feriado) -->
                            <p>
                                <?php
                                _traduz('Diária (sexta-feira, sábado e véspera de feriado)', 'Daily (Friday, Saturday and holiday eve)')
                                ?>

                                <span class="hidden-xs hidden-sm" ><?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('diaria_s_s_f'); ?></span>
                            </p>
                            <p class="descricao">
                                <?php
                                _traduz('Check-in 15h e Check-out 13h', 'Check-in 3pm and Check-out 1pm');
                                ?> 
                            </p>
                            <p class="visible-xs visible-sm preco-mobile">
                                <?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('diaria_s_s_f'); ?>
                            </p>
                        </div><!-- /Diária (sexta-feira, sábado e véspera de feriado) -->

                    <?php endif; ?>
                    <?php if (get_field('hr_adicional') != ''): ?>

                        <div><!-- Hora adicional -->
                            <p>
                                <?php _traduz('Hora adicional', 'Additional hour'); ?>
                                <span class="hidden-xs hidden-sm" ><?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('hr_adicional'); ?></span>
                            </p>
                            <p class="visible-xs visible-sm preco-mobile">
                                <?php echo get_woocommerce_currency_symbol(); ?> <?php echo get_field('hr_adicional'); ?>
                            </p>

                        </div><!-- /Hora adicional -->

                    <?php endif; ?>

                </div>


                <?php if (get_field('extra_01') != ''): ?>
                    <div class="aviso">
                        <p>
                            <?php echo get_field('extra_01'); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <?php
                $faq = get_page_by_slug('faq');
                ?>

                <a href="<?php echo esc_url(get_page_link($faq->ID)); ?>" class="info-checkin">
                    <?php _traduz('Dúvidas? Clique aqui - FAQ', 'Doubts? Click here to access our FAQ'); ?>
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

    <!--    <div class="container-fluid faixa-fotos-produto">
            <div class="row">
    <?php //woocommerce_show_product_images_carousel(); ?>            
            </div>
        </div> faixa-fotos-produto -->


    <?php
    global $post, $product;
    $attachment_ids = $product->get_gallery_attachment_ids();
    ?>

    <div class="container-fluid faixa-fotos-produto-mobile">

        <div id="rooms-slider" class="row">
            <div class="carousel-slick-suite center">
                <?php foreach ($attachment_ids as $attachment_id) : $image = wc_get_product_attachment_props($attachment_id, $post); ?>
                    <div class="suite">
                        <?php echo wp_get_attachment_image($attachment_id, 'carousel-suite', 0, $image) ?>    
                    </div><!-- suite -->
                <?php endforeach; ?>
            </div>
        </div>

    </div><!-- faixa-carousel-suites -->









    <?php wc_get_template_part('content', 'suites-simple-loop'); ?>


    <?php get_template_part('template-parts/faixa/concierge'); ?>


</div><!-- suite-single -->

