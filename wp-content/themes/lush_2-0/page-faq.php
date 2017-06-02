<?php
/**
 * Template Name: FAQ
 */
get_header('home');

get_template_part('template-parts/menu/geral');
?>
<div class="gastronomia"> 

    <?php while (have_posts()) : the_post(); ?>
    
        <?php get_template_part('template-parts/content', 'faq')  ?>
    
    <?php endwhile; ?>

</div>
<?php
get_footer();
