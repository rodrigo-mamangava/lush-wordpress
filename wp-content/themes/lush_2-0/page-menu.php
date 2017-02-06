<?php
/**
 * Template Name: Menu Cardápio Completo
 */
get_header('home');

get_template_part('template-parts/menu/geral');
?>
<div class="menu-cardapio"> 

    <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part('template-parts/menu/lista', 'top'); ?>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1"> 

                    <div class="row">

                        <?php get_template_part('template-parts/menu/lista', 'cat'); ?>

                    </div>


                </div>

            </div>
        </div>



    <?php endwhile; ?>

</div>
<?php
get_footer();


