<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
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
 * @version     2.1.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (is_user_logged_in()) {
    return;
}
?>



<form method="post" class="login" <?php if ($hidden) echo 'style="display:none;"'; ?>>

    <?php do_action('woocommerce_login_form_start'); ?>

    <?php if ($message) echo wpautop(wptexturize($message)); ?>
    <div class="form-group">
        <input type="text" placeholder="<?php _e('Type your e-mail', 'lush_2-0'); ?>" class="input-text form-control" name="username" id="username" />
    </div>
    <div class="form-group">
        <input class="input-text form-control" type="password" placeholder="<?php _e('Type your password', 'lush_2-0'); ?>" name="password" id="password" />
    </div>

    <?php do_action('woocommerce_login_form'); ?>

    <?php wp_nonce_field('woocommerce-login'); ?>
    
    <div class="area-btn">

    <input type="submit" class="button btn-login" name="login" value="<?php esc_attr_e('Login', 'woocommerce'); ?>" />

    <input type="hidden" name="redirect" value="<?php echo esc_url($redirect) ?>" />
    
    <br/>

    <label for="rememberme" class="lembrar">
        <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e('Remember me', 'woocommerce'); ?>
    </label>
    
    <p class="perdeu-senha">
        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php _e('Lost your password?', 'woocommerce'); ?></a>
    </p>
    
    </div>

    <?php do_action('woocommerce_login_form_end'); ?>

</form>
