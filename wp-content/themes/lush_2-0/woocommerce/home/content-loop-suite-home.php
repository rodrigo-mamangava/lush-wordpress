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

<div class="container-fluid faixa-carousel-suites">


    <div id="rooms-slider" class="row">
        <div class="carousel-slick center">
            <?php
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
                    ?>

                    <?php global $product; ?>
            
                    <?php  wc_get_template( 'home/carousel-vitrine-item.php' ); ?>



                    <?php
                endwhile;
            endif;
            ?>

        </div>

    </div>

</div><!-- faixa-carousel-suites -->


<?php
// Reset Post Data
wp_reset_postdata();
