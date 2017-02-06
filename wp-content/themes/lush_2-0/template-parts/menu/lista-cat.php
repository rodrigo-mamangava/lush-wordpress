<?php
$menuCat = get_terms(array(
    'taxonomy' => 'cat-menu',
    'orderby' => 'name',
    'hide_empty' => false,
        ));
?>

<?php foreach ($menuCat as $itemMenu): ?>

    <?php
    $slug = $itemMenu->slug;

    $term = get_term_by('slug', $slug, 'cat-menu');

    $args = array(
        'post_type' => 'menu',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'tax_query' => array(
            array(
                'taxonomy' => 'cat-menu',
                'field' => 'slug',
                'terms' => $slug,
            ),
        ),
    );
    $the_query = new WP_Query($args);
    ?>

    <div class="col-sm-6 item-cat-menu ">

        <div class="row">
            <div class="col-xs-12">
                <h2 id="<?php echo $termSlug ?>" ><?php _e($term->name); ?></h2>
            </div>
        </div>

        <div class="row">

            <?php if ($the_query->have_posts()): ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="col-xs-12" >
                        <?php the_title(); ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div><!-- item-cat-menu -->



<?php endforeach; ?>





