<?php global $product; ?>
<div class="col-xs-12 col-sm-6  item-addpacote">
    <div>
        <div class="img-space">
            <?php echo the_post_thumbnail('add-pacote-2'); ?>
            <?php wc_get_template_part('single-product/add-to-cart/plus', 'lush'); ?>
            <?php get_template_part('template-parts/btn/lupa'); ?>
        </div>
        <div>
            <?php the_title('<h3>', '</h3>'); ?>
            <?php echo $product->get_price_html(); ?>            
            
        </div>

    </div>
</div>
<?php get_template_part('template-parts/modal/pacote'); ?>