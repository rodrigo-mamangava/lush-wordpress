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
        while (have_posts()) : the_post();

            get_template_part('template-parts/bastidores/loop', 'item');

        endwhile;
        ?>



        <div class="row">
            <div class="passador">
                <div class="col-sm-8 col-sm-offset-2 text-center">

                    <ul>
                        <!--                        <li class="pull-left">;
                                                    <a class="" href="#">
                                                        Anterior
                                                    </a>
                                                </li>-->
                        <li>
                            <a href="#">
                                1
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                2
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                3
                            </a>
                        </li>
                        <li class="pull-right">
                            <a class="" href="#">
                                Próximo
                            </a>
                        </li>
                    </ul>

                </div>
            </div><!-- passador -->
        </div>

    </div>



</div>

<?php
get_footer();

