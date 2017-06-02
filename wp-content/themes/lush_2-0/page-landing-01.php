<?php
/**
 * Template Name: Landing Page 01
 */
get_header('namorados');

//get_template_part('template-parts/menu/geral');
?>


<?php while (have_posts()) : the_post(); ?>

    <div class="lp-01"> 

        <?php 
        
        $palavra01 = explode(" ", get_field('palavra_01'));
        $palavra02 = explode(" ", get_field('palavra_02'));
        
        lp_header_01($palavra01, $palavra02); 
        ?>

        <div class="container conteudo-page "> 

            <?php lp_item_01(get_field('foto_01'), get_field('titulo_01'), get_field('descricao_item_01')); ?>

            <?php lp_item_01(get_field('foto_02'), get_field('titulo_02'), get_field('descricao_item_02')); ?>



            <?php
            lp_item_suite(
                    get_field('nome_suite_01'), get_field('descricao_suite_01'), get_field('detalhe_01_suite_01'), get_field('preco_01_suite_01'), get_field('detalhe_02_suite_01'), get_field('preco_02_suite_01')
            );
            ?>

            <?php
            lp_item_suite(
                    get_field('nome_suite_02'), get_field('descricao_suite_02'), get_field('detalhe_01_suite_02'), get_field('preco_01_suite_02'), get_field('detalhe_02_suite_02'), get_field('preco_02_suite_02')
            );
            ?>

            <?php
            lp_item_suite(
                    get_field('nome_suite_03'), get_field('descricao_suite_03'), get_field('detalhe_01_suite_03'), get_field('preco_01_suite_03'), get_field('detalhe_02_suite_03'), get_field('preco_02_suite_03')
            );
            ?>

            <?php
            lp_item_suite(
                    get_field('nome_suite_04'), get_field('descricao_suite_04'), get_field('detalhe_01_suite_04'), get_field('preco_01_suite_04'), get_field('detalhe_02_suite_04'), get_field('preco_02_suite_04')
            );
            ?>




            <article class="row item-experiencia">

            <?php wc_get_template_part('landingpage/addpacote'); ?>

                <div>
                    <?php wc_print_notices(); ?>
                </div>

                <div class="col-xs-12 reservar">
                    <a class="btn-reserva-v2" href="<?php echo get_term_link('suite', 'product_cat'); ?>"><?php echo get_field('btn_reservar') ?></a>
                </div>

                <div class="col-xs-12 col-sm-2 col-sm-offset-5 linha">
                    <hr/>
                </div>

            </article>

                <?php lp_item_01(get_field('foto_03'), get_field('titulo_03'), get_field('desc_03')); ?>




        </div>


    </div><!-- lp01 -->


<?php endwhile; ?>


<?php
get_footer('lp01');
