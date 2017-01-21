<?php
/**
 * Template Name: Contato
 */
get_header('home');

get_template_part('template-parts/menu/geral');
?>
<div class="experiencia"> 

    <?php while (have_posts()) : the_post(); ?>
    
        <?php get_template_part('template-parts/page/contato')  ?>
    
    <?php endwhile; ?>

</div>
<?php
get_footer();
