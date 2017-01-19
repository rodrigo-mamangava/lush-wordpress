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
$texto = 'Um exclusivo cardápio gourmet, carta de vinhos, carta de cervejas 
        importadas e drinks especiais fazem do Lush uma experiência completa e 
        única.';
$class_btn = 'btn-explore-cardapio';
$link_btn = '#';
$texto_btn = 'EXPLORAR CARDÁPIO';
get_faixa_simples($class, $texto, $class_btn, $link_btn, $texto_btn);
?>


<div class="faixa-gastronomia-cats">
    <div class="container">
        <div class="row">

            <?php
            
            faixa_destaque_par(
                    get_field('faixa_destaque_01_foto'), false, get_field('faixa_destaque_01_titulo'), get_field('faixa_destaque_01_texto'), get_field('link'), get_field('texto_do_botão')
            );
            
            faixa_destaque_impar(
                    get_field('faixa_destaque_01_foto'), false, get_field('faixa_destaque_01_titulo'), get_field('faixa_destaque_01_texto'), get_field('link'), get_field('texto_do_botão')
            );
            
            faixa_destaque_par(
                    get_field('faixa_destaque_01_foto'), false, get_field('faixa_destaque_01_titulo'), get_field('faixa_destaque_01_texto'), get_field('link'), get_field('texto_do_botão')
            );
            
            faixa_destaque_impar(
                    get_field('faixa_destaque_01_foto'), false, get_field('faixa_destaque_01_titulo'), get_field('faixa_destaque_01_texto'), get_field('link'), get_field('texto_do_botão')
            );
            
            faixa_destaque_par(
                    get_field('faixa_destaque_01_foto'), false, get_field('faixa_destaque_01_titulo'), get_field('faixa_destaque_01_texto'), get_field('link'), get_field('texto_do_botão')
            );
            
            ?>




        </div>
    </div>
</div><!-- faixa-saiba-mais -->