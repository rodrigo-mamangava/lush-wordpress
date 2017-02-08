<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;
?>

<?php if ($price_html = $product->get_price_html()) : ?>
    <p class="amout">
        <?php echo get_woocommerce_currency_symbol(); ?>
        <?php echo $product->price; ?>
    </p>
<?php endif; ?>
