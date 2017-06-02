<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
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
 * @version     2.3.0
 */
?>

<div class="checkout-lush">
    <div class="container">
        
        <div class="row">
            <div class="col-xs-12">
                <h1><?php _e('FINISH BUY', 'lush_2-0'); ?></h1>
            </div>
            
        </div>

        <?php
        if (!defined('ABSPATH')) {
            exit;
        }

        wc_print_notices();
        ?>
        <div class="row">

            <div class="col-xs-12 col-sm-4 col-sm-offset-1">
                <?php
                do_action('woocommerce_before_checkout_form', $checkout);

                // If checkout registration is disabled and not logged in, the user cannot checkout
                if (!$checkout->enable_signup && !$checkout->enable_guest_checkout && !is_user_logged_in()) {
                    echo apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce'));
                    return;
                }
                ?>

            </div>
            <div class="col-xs-12 col-sm-6 col-sm-offset-1">

                <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

                    <?php if (sizeof($checkout->checkout_fields) > 0) : ?>

                        <?php do_action('woocommerce_checkout_before_customer_details'); ?>

                        <div class="" id="customer_details">
                            
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php do_action('woocommerce_checkout_billing'); ?>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php do_action('woocommerce_checkout_shipping'); ?>
                                </div>
                            </div>

                        </div><!-- customer_details -->

                        <?php do_action('woocommerce_checkout_after_customer_details'); ?>

                    <?php endif; ?>





                    <h3 id="order_review_heading"><?php _e('Your order', 'woocommerce'); ?></h3>

                    <?php do_action('woocommerce_checkout_before_order_review'); ?>

                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php do_action('woocommerce_checkout_order_review'); ?>

                        <?php //wc_get_template_part('checkout/review', 'order'); ?>

                        <?php //wc_get_template_part('checkout/payment'); ?>

                    </div>

                    <?php do_action('woocommerce_checkout_after_order_review'); ?>





                </form>
            </div>

            <?php do_action('woocommerce_after_checkout_form', $checkout); ?>

        </div>

    </div><!-- container -->
</div>