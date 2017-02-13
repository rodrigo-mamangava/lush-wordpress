<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
get_header('home');
?>

<div class="container">

    <?php while (have_posts()) : the_post(); ?>

        <div class="row">

            <div class="col-xs-12 voltar ">
                <a href="<?php echo get_link_page_by_slug('concierge'); ?>">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        <div class="row">

            <div class="col-xs-1">

                <?php
                $prev_post  = get_previous_post();
                if (!empty($prev_post)):
                    ?>
                    <a class="seta-esq" href="<?php echo get_permalink($next_post->ID); ?>">
                        <img src="<?php uri() ?>/img/seta-esquerda.png">
                    </a>
                <?php endif; ?>

            </div>

            <div class="col-xs-10 col-sm-6 col-sm-offset-2">

                <?php the_title('<h1>', '</h1>'); ?>
                <div class="obs">
                    <?php echo get_field('obs'); ?>
                </div>

                <div class="descricao">
                    <?php the_content(); ?>
                </div>

            </div>
            <div class="col-xs-1">
                <?php
                $next_post = get_next_post();
                if (!empty($next_post)):
                    ?>
                    <a class="seta-dir" href="<?php echo get_permalink($next_post->ID); ?>">
                        <img src="<?php uri() ?>/img/seta-direita.png">
                    </a>
                <?php endif; ?>
            </div>
        </div>

    <?php endwhile; ?>

</div>


<?php
get_footer();
