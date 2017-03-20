<?php
/**
 * Template Name: Concierge Loop
 */
get_header('home');

get_template_part('template-parts/menu/geral');
?>
<div class="concierge"> 

    <?php while (have_posts()) : the_post(); ?>


        <?php //get_template_part('template-parts/content-concierge', 'loop') ?>


    <?php endwhile; ?>
</div>
<?php
get_footer();


