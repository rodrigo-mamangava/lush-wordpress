<div class="suite">
    <?php the_post_thumbnail('vitrine-suite'); ?>
    
    <div class="suite-card">
        <p class="escolha"><?php _traduz('Escolha sua suite', 'Choose your suite'); ?> </p>
        <?php the_title('<h2>', '</h2>')?>

        <p class="descricao">
            <?php the_excerpt(); ?>
        </p>

        <a class="btn-verde-v02" href="<?php echo the_permalink();?>">
            <?php _e( 'Know more', 'lush_2-0' ); ?>

        </a> 
        
    </div>
    
</div><!-- suite -->
