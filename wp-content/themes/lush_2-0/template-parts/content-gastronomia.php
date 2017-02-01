<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php get_new_vitrine_completo(); ?>

<?php
$class = 'faixa-explore-cardapio';
$texto = get_field('frase_exclusivo_cardapio');
$class_btn = 'btn-explore-cardapio';
$link_btn = '#';
$texto_btn = 'Explore menu';
get_faixa_simples($class, $texto, $class_btn, $link_btn, $texto_btn);
?>


<div class="faixa-gastronomia-cats">
    <div class="container">
        <div class="row">

            <?php
            
            faixa_destaque_par(
                    get_field('faixa_destaque_01_foto'), false, get_field('faixa_destaque_01_titulo'), get_field('faixa_destaque_01_texto'), get_field('link_01'), get_field('texto_do_botão_01')
            );
            
            faixa_destaque_impar(
                    get_field('faixa_destaque_02_foto'), false, get_field('faixa_destaque_02_titulo'), get_field('faixa_destaque_02_texto'), get_field('link_02'), get_field('texto_do_botão_02')
            );
            
            faixa_destaque_par(
                    get_field('faixa_destaque_03_foto'), false, get_field('faixa_destaque_03_titulo'), get_field('faixa_destaque_03_texto'), get_field('link_03'), get_field('texto_do_botão_03')
            );
            
            faixa_destaque_impar(
                    get_field('faixa_destaque_04_foto'), false, get_field('faixa_destaque_04_titulo'), get_field('faixa_destaque_04_texto'), get_field('link_04'), get_field('texto_do_botão_04')
            );
            
            ?>

        </div>
    </div>
</div><!-- faixa-saiba-mais -->