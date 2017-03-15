<?php
$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'ignore_sticky_posts' => true,
    'posts_per_page' => '999',
    'meta_query' => array(
        array(
            'key' => '_visibility',
            'value' => array('catalog', 'visible'),
            'compare' => 'IN'
        )
    ),
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug', //This is optional, as it defaults to 'term_id'
            'terms' => 'pacote',
            'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
        )
    )
);
$products = new WP_Query($args);
?>

<div class="container faixa-addpacote">
    <div class="row">


        <div class="col-xs-12">

            <h2>
                <?php _e('ENRICH YOUR EXPERIENCE', 'lush_2-0')?>
                </h2>
            <p>
                <?php _e('Check out the special services we offer <br/> and add as many as you want to your cart.', 'lush_2-0')?>
                
            </p>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
            <div class="row">

                <?php if ($products->have_posts()) : // (3)  ?>
                    <?php
                    while ($products->have_posts()) : $products->the_post();
                        global $product;
                        ?>

                        <?php wc_get_template_part('loop/item', 'addpacote'); ?>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>

    </div><!-- row -->

</div>

