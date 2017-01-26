<div class="suite">
    <?php the_post_thumbnail('full'); ?>
    <div class="suite-card">
        <p class="escolha"><?php _e( 'Escolha sua suite', 'lush_2-0' ); ?> </p>
        <?php the_title('<h2>', '</h2>')?>

        <p class="descricao">
            <?php the_excerpt(); ?>
        </p>

        <a class="btn-verde-v02" href="#">
            <?php _e( 'Quero reservar', 'lush_2-0' ); ?>

        </a> 
        
        <a class="explorar btn-transparente" href="<?php echo the_permalink();?>">
            <?php _e( 'Explorar a suite', 'lush_2-0' ); ?> 
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
</div><!-- suite -->
