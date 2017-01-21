<div class="suite">
    <?php the_post_thumbnail('full'); ?>
    <div class="suite-card">
        <p class="escolha">Escolha sua suite</p>
        <?php the_title('<h2>', '</h2>')?>

        <p class="descricao">
            <?php the_excerpt(); ?>
        </p>

        <a class="btn-verde-v02" href="#">
            Quero reservar
        </a> 
        
        <a class="explorar btn-transparente" href="<?php echo the_permalink();?>">
            Explore suite <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
</div><!-- suite -->
