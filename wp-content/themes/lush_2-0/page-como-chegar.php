<?php
/**
 * Template Name: Como chegar
 */
get_header('home');

get_template_part('template-parts/menu/geral');
?>
<div class="experiencia"> 

    <?php while (have_posts()) : the_post(); ?>
    
        <?php get_template_part('template-parts/page/como', 'chegar')  ?>
    
    <?php endwhile; ?>

</div>
<?php
get_footer();
