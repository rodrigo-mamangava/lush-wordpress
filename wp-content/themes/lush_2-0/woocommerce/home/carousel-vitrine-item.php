<div class="suite">
    <?php the_post_thumbnail('vitrine-suite'); ?>
    
    <div class="suite-card">
        <p class="escolha"><?php _e( 'Escolha sua suite', 'lush_2-0' ); ?> </p>
        <?php the_title('<h2>', '</h2>')?>

        <p class="descricao">
            <?php the_excerpt(); ?>
        </p>

        <a class="btn-verde-v02" href="<?php echo the_permalink();?>">
            <?php _e( 'Quero reservar', 'lush_2-0' ); ?>

        </a> 
        
    </div>
    
</div><!-- suite -->
