<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
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
    exit; // Exit if accessed directly
}
?>
<div class="container-fluid faixa-orderby">
    <div class="row">

        <div class="col-xs-12 ">
            <p>
                Ordenar por: 
                <a href="?orderby=price-desc" class="<?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'price-desc') ? 'active' : '' ?>" >Maior preço</a> 
                | 
                <a href="?orderby=price" class="<?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'price') ? 'active' : '' ?>" >Menor Preço</a>
            </p>
        </div>

    </div>

</div><!-- faixa-orderby -->




