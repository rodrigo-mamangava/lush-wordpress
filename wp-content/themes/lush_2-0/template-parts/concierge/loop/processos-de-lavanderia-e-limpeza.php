<?php
$termSlug = 'processos-de-lavanderia-e-limpeza';
$term = get_term_by('slug', $termSlug, 'cat-concierge');


$args = array(
    'post_type' => 'concierge',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'tax_query' => array(
        array(
            'taxonomy' => 'cat-concierge',
            'field' => 'slug',
            'terms' => $termSlug,
        ),
    ),
);
$the_query = new WP_Query($args);
?>



<div class="cat-lista faixa-cinza container-fluid">

    <div class="row">
        <div class="col-xs-12">
            <h2 id="<?php echo $termSlug?>" ><?php _e($term->name); ?></h2>
        </div>
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <div class="descricao-cat">  
                <p>
                    <?php _e($term->description); ?>
                </p>                    
            </div><!-- descricao-cat -->
        </div>
    </div>

    <div class="row is-flex">

        <?php if ($the_query->have_posts()): ?>

            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php get_template_part('template-parts/concierge/item/governanca') ?>
            <?php endwhile; ?>

        <?php endif; ?>
    </div>

</div><!-- faixa-cinza -->
