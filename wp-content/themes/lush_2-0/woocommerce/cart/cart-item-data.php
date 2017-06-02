<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-item-data.php.
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
 * @version 	2.4.0
 */
if (!defined('ABSPATH')) {
    exit;
}
?>
<dl class="variation">


    <?php foreach ($item_data as $data) : ?>



        <?php if ($data['key'] == 'Horário da reserva' || $data['key'] == 'Booking Time') : ?>
            <dt class="variation-<?php echo sanitize_html_class($data['key']); ?>">                
                <?php _e('Type of reservation', 'lush_2-0'); ?> 
            </dt>
        <?php else: ?>
            <dt class="variation-<?php echo sanitize_html_class($data['key']); ?>"><?php echo wp_kses_post($data['key']); ?>:</dt>
        <?php endif;
        ?>

        <?php if ($data['display'] == '12:00' || $data['display'] == '12:00 PM') : ?>
            <?php wc_get_template_part('cart/tipo', 'diaria'); ?>
        <?php elseif ($data['display'] == '15:00' || $data['display'] == '3:00 PM' ) : ?>
            <?php wc_get_template_part('cart/tipo', 'periodo'); ?>
        <?php elseif ($data['display'] == '20:00' || $data['display'] == '8:00 PM') : ?>
            <?php wc_get_template_part('cart/tipo', 'pernoite'); ?>
        <?php else: ?>
            <dd class="variation-<?php echo sanitize_html_class($data['key']); ?>"><?php echo wp_kses_post(wpautop($data['display'])); ?></dd>
        <?php endif; ?>


    <?php endforeach; ?>
</dl>
