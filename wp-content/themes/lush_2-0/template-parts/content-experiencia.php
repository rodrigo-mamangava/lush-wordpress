<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<div class="faixa-destaque">
    <div class="container-fluid">
        <div class="row">
            <div class="para-presentear col-sm-8 col-sm-offset-1">

                <h2><?php _e('To gift', 'lush_2-0') ?></h2>
                <h3><?php _e('Lush Gift Card', 'lush_2-0') ?></h3>
                <div class="row">
                    <div class="col-sm-6 ">
                        <?php echo get_field('frase_presentei_com_estilo')?>
                    </div>
                </div>

                <a class="btn-verde-v02" href="<?php echo get_term_link( 'gift-card' ,'product_cat')?>" ><?php _e('Buy now', 'lush_2-0')?></a>

                <img class="gift-cards" src="<?php uri() ?>/img/bitmap@3x.png" >


            </div><!-- para-presentear -->
        </div>

    </div>
</div><!-- faixa-destaque-->

<div class="faixa-intercalada faixa-pacotes-exp">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                <h2><?php _e('Special packages', 'lush_2-0')?></h2>
            </div>
        </div>

        <div class="row">

            <?php
            faixa_destaque_par(
                    get_field('faixa_destaque_01_foto'), get_field('faixa_destaque_01_icone'), get_field('faixa_destaque_01_titulo'), get_field('faixa_destaque_01_texto'), get_term_link( 'pacote' ,'product_cat'), get_field('faixa_destaque_01_texto_botao')
            );

            faixa_destaque_impar(
                    get_field('faixa_destaque_02_foto'), get_field('faixa_destaque_02_icone'), get_field('faixa_destaque_02_titulo'), get_field('faixa_destaque_03_texto'), get_term_link( 'pacote' ,'product_cat'), get_field('faixa_destaque_01_texto_botao')
            );

            faixa_destaque_par(
                    get_field('faixa_destaque_03_foto'), get_field('faixa_destaque_03_icone'), get_field('faixa_destaque_03_titulo'), get_field('faixa_destaque_03_texto'), get_term_link( 'pacote' ,'product_cat'), get_field('faixa_destaque_01_texto_botao')
            );

            faixa_destaque_impar(
                    get_field('faixa_destaque_04_foto'), get_field('faixa_destaque_04_icone'), get_field('faixa_destaque_04_titulo'), get_field('faixa_destaque_03_texto'), get_term_link( 'pacote' ,'product_cat'), get_field('faixa_destaque_01_texto_botao')
            );
            ?>




        </div>
    </div>
</div><!-- faixa-saiba-mais -->