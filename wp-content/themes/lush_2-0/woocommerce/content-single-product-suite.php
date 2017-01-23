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

            <div class="col-sm-5 col-sm-offset-1 atributos">
                <?php the_content(); ?>
            </div><!-- descricao --> 

            <div class="col-sm-4 col-sm-offset-1 info-preco">
                
                
                <?php echo get_field('preço_e_reserva'); ?>
                
                <?php woocommerce_template_single_add_to_cart(); ?>
                
                
                
                
            </div><!-- info-preco -->
        </div><!-- row -->
        
<!--        <div class="col-xs-12 info-reserve">
            <a href="#" class="brn-reserve-suite">RESERVAR ESTA SUÍTE</a>            
        </div>-->
        
        <?php get_template_part( 'template-parts/compartilhar' ); ?>
        
    </div><!-- faixa-detalhes -->

    <div class="container-fluid faixa-fotos-produto">
        <div class="row">
            <?php woocommerce_show_product_images_carousel(); ?>            
        </div>
    </div><!-- faixa-fotos-produto -->
    
    
    <?php
    /**
     * woocommerce_single_product_summary hook.
     *
     * @hooked woocommerce_template_single_title - 5
     * @hooked woocommerce_template_single_rating - 10
     * @hooked woocommerce_template_single_price - 10
     * @hooked woocommerce_template_single_excerpt - 20
     * @hooked woocommerce_template_single_add_to_cart - 30
     * @hooked woocommerce_template_single_meta - 40
     * @hooked woocommerce_template_single_sharing - 50
     */
    //do_action('woocommerce_single_product_summary');

    
    
    ?>
    


    <?php wc_get_template_part('content', 'suites-simple-loop'); ?>


</div><!-- suite-single -->

