<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
get_header('home');

get_template_part('template-parts/menu/geral');
?>

<div class="bastidores-single">

    <?php while (have_posts()) : the_post(); ?>

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <?php get_bastibores_item_cat() ?>
                </div>
            </div>



            <div class="titulo">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php the_title('<h1>', '</h1>');?>
                    </div>
                </div>
            </div>

            <div class="intro">
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-2">

                        <p class="data"><?php post_on(); ?></p>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                        </ul>

                    </div>
                    <div class="col-sm-6 texto" >
                        <?php the_excerpt(); ?>

                    </div>
                </div>
            </div><!-- intro -->

            <div class="img-destaque">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php the_post_thumbnail(); ?>
                    </div>
                </div>
            </div><!-- img-destaque -->

            <div class="conteudo">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-4 texto">

                        <?php the_content(); ?>

                    </div>
                </div>
            </div><!-- img-destaque -->




        </div>

    <?php endwhile; ?>

</div>


<?php
get_footer();

