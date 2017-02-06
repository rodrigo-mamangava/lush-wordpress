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
                <?php echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>"; ?>
            </div>

        </div>
        <div class="row">


            <div class="col-xs-1">
                <a href="#" class="seta-esq">
                    <img src="<?php uri() ?>/img/seta-esquerda.png">
                </a>
            </div>

            <div class="col-xs-10">

                <?php the_title('<h1>', '</h1>'); ?>
                <div class="obs">
                    <?php echo get_field('obs'); ?>
                </div>

                <div class="descricao">
                    <?php the_content(); ?>
                </div>

            </div>
            <div class="col-xs-1">
                <a href="#" class="seta-dir">
                    <img src="<?php uri() ?>/img/seta-direita.png">
                </a>
            </div>
        </div>

        <?php the_post_navigation(); ?>

    <?php endwhile; ?>

</div>


<?php
get_footer();
