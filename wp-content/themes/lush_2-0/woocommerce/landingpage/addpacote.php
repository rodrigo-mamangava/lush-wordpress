<?php
$products_id = get_field('pacotes_em_destaque');

if (!$products_id) {
    return false;
    ;
}

$args = array(
    'post_type' => 'product',
    'post__in' => $products_id,
    'posts_per_page' => 2
);
$products = new WP_Query($args);
?>

<div class="container faixa-addpacote">
    <div class="row">


        <div class="col-xs-12">

            <h2>
<?php echo get_field('titulo_faixa_pacote'); ?>
            </h2>
            <p>
<?php echo get_field('descricao_faixa_pacote'); ?>

            </p>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
            <div class="row">

                <?php if ($products->have_posts()) : // (3)    ?>
                    <?php
                    while ($products->have_posts()) : $products->the_post();
                        global $product;
                        ?>

                        <?php wc_get_template_part('landingpage/item', 'addpacote2'); ?>

                    <?php endwhile; ?>
<?php endif; ?>

            </div>
        </div>

    </div><!-- row -->

</div>

<?php
// Reset Post Data
wp_reset_postdata();

