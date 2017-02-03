<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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
 * @version     2.2.0
 */
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="compra-finalizada">
    <div class="container">

        <?php if ($order) : ?>



            <?php if ($order->has_status('failed')) : ?>

                <p class="woocommerce-thankyou-order-failed"><?php _e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

                <p class="woocommerce-thankyou-order-failed-actions">
                    <a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php _e('Pay', 'woocommerce') ?></a>
                    <?php if (is_user_logged_in()) : ?>
                        <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php _e('My Account', 'woocommerce'); ?></a>
                    <?php endif; ?>
                </p>

            <?php else : ?>

                <div class="row">

                    <div class="col-xs-12">
                        <h1><?php _e('Success!', 'lush_2-0'); ?></h1>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">

                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <img src="">
                            </div>
                            <div class="col-sm-6 col-sm-offset-1">
                                <p class="aviso">
                                    <?php _e('Your purchase has been successfully completed.', 'lush_2-0'); ?>
                                </p>
                                <p class="aviso">
                                    <?php _e('We will send to your e-mail to register all the data of your reservation..', 'lush_2-0'); ?>
                                </p>
                                <p class="aviso-varicao">
                                    <?php _e('Enjoy your stay with us and discover the advantages of a LUSH experience.', 'lush_2-0'); ?>
                                </p>

                            </div>
                        </div>


                    </div><!-- col-xs-12 col-sm-8 col-sm-offset-2 -->


                    <?php get_template_part('template-parts/compartilhar', 'lush'); ?>

                </div>



            <?php endif; ?>

            <?php //do_action('woocommerce_thankyou_' . $order->payment_method, $order->id); ?>
            <?php //do_action('woocommerce_thankyou', $order->id); ?>

        <?php else : ?>

            <p class="woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', __('Thank you. Your order has been received.', 'woocommerce'), null); ?></p>

        <?php endif; ?>
    </div>
</div>
