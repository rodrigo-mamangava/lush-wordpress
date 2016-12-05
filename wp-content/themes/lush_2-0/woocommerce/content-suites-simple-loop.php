<?php
$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'ignore_sticky_posts' => true,
    'posts_per_page' => '9999',
    'product_cat' => 'suite',
    'meta_query' => array(
        array(
            'key' => '_visibility',
            'value' => array('catalog', 'visible'),
            'compare' => 'IN'
        )
    ),
);
$the_query = new WP_Query($args);


?>
<div class="container-fluid faixa-outras-suites-list">
    <div class="row">

        <div class="col-xs-12 titulo">
            <h2>Outras suítes</h2>
        </div>                       
    </div>

    <div class="row">

        <?php
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
                ?>

                <?php global $product; ?>

                <div class="col-sm-6 suite-item">
                    <a href="<?php echo get_permalink();?>">
                        <div class="outra-site-item">

                            <?php the_post_thumbnail('loop-simples'); ?>

                            <div class="info-suite">

                                <?php woocommerce_template_loop_product_title() ?> 
                                <p><span class="price">a partir de</span></p>
                                <?php woocommerce_template_loop_price() ?>

                            </div><!-- info-suite -->
                            <div class="img-filter"></div>
                        </div><!-- outra-site-item -->
                    </a>
                </div><!-- suite-item -->

                <?php
            endwhile;
        endif;
        ?>

    </div><!-- row -->
</div><!-- faixa-outras-suites -->


<?php
// Reset Post Data
wp_reset_postdata();
