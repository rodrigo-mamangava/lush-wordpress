<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header('home');

get_template_part('template-parts/menu/geral');
?>

<div class="bastidores">

    <?php
    $imgSrc = get_template_directory_uri() . '/img/lush-fachada@2x.jpg';
    get_new_vitrine($imgSrc, 'Bastidores');
    ?>


    <div class="faixa-bastidores container">

        <?php
        global $wp_query;
        $args = array_merge($wp_query->query_vars, array(
//            'posts_per_archive_page' => 1,
//            'posts_per_page' => 1,
        ));
        
         $args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
         
         
        query_posts($args);

        while ($wp_query->have_posts()) : $wp_query->the_post();

            get_template_part('template-parts/bastidores/loop', 'item');

        endwhile;
        ?>


    </div>

    <?php get_template_part('template-parts/bastidores/passador'); ?>

</div>