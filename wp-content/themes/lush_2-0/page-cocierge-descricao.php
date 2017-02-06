<?php
/**
 * Template Name: Concierge Descricao Itens
 */

get_header('home');

get_template_part('template-parts/menu/geral');
?>
<div class="concierge"> 
    
    <?php while (have_posts()) : the_post(); ?>
    
        <?php get_template_part('template-parts/concierge/loop/destaque');  ?>
    
        <?php get_template_part('template-parts/concierge/loop/equipamento', 'das-suites');  ?>
    
        <?php get_template_part('template-parts/concierge/loop/entretenimento', 'na-suite');  ?>
    
        <?php get_template_part('template-parts/concierge/loop/itens', 'bar-e-cozinha');  ?>
    
        <?php get_template_part('template-parts/concierge/loop/itens', 'de-governanca');  ?>
    
        <?php get_template_part('template-parts/concierge/loop/politica', 'e-regras-gerais-do-lush');  ?>
    
        <?php get_template_part('template-parts/concierge/loop/processos', 'de-lavanderia-e-limpeza');  ?>
    
    
    
    <?php endwhile; ?>

</div>
<?php
get_footer();
