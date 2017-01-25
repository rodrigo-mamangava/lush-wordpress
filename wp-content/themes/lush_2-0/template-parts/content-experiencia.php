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

                <h2>para presentear</h2>
                <h3>Lush Gift Card</h3>
                <div class="row">
                    <div class="col-sm-6 ">
                        <p>
                            Presenteie com muito estilo e personalidade com
                            nossos vales-presente disponíveis em diversos
                            valores e válidos para qualquer uma de nossas
                            suítes exclusivas.
                        </p>
                    </div>
                </div>

                <a class="btn-verde-v02">COMPRAR AGORA</a>

                <img class="gift-cards" src="<?php uri() ?>/img/bitmap@3x.png" >


            </div><!-- para-presentear -->
        </div>

    </div>
</div><!-- faixa-destaque-->

<div class="faixa-intercalada faixa-pacotes-exp">
    <div class="container">
        
        <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                    <h2>PACOTES ESPECIAIS</h2>
                </div>
            </div>
        
        <div class="row">

            <?php
            faixa_destaque_par(
                    get_field('faixa_destaque_02_foto'),                     
                    false, get_field('faixa_destaque_01_titulo'), 
                    get_field('faixa_destaque_01_texto'), 
                    get_field('faixa_destaque_01_link'), 
                    get_field('faixa_destaque_01_texto_botao')
            );

            faixa_destaque_impar(
                    get_field('faixa_destaque_02_foto'), 
                    false, 
                    get_field('faixa_destaque_02_titulo'), 
                    get_field('faixa_destaque_03_texto'), 
                    get_field('faixa_destaque_02_link'), 
                    get_field('faixa_destaque_02_texto_botao')
            );

            faixa_destaque_par(
                    get_field('faixa_destaque_03_foto'), 
                    false, 
                    get_field('faixa_destaque_03_titulo'), 
                    get_field('faixa_destaque_03_texto'), 
                    get_field('faixa_destaque_03_link'), 
                    get_field('faixa_destaque_03_texto_botao')
            );

            faixa_destaque_impar(
                    get_field('faixa_destaque_04_foto'), 
                    false, get_field('faixa_destaque_04_titulo'), 
                    get_field('faixa_destaque_03_texto'), 
                    get_field('faixa_destaque_04_link'), 
                    get_field('faixa_destaque_04_texto_botao')
            );


            ?>




        </div>
    </div>
</div><!-- faixa-saiba-mais -->