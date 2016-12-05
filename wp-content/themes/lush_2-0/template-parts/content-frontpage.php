<?php
/**
 * Template Name: Front-page
 */

get_header();
?>

<div class="home">

    
    <?php getVitrine(get_field('imagem_destaque'), true,  'Experiência única', '#conteudo-home'); ?>


    <div id="conteudo-home" class="container-fluid faixa-quartos">

        <div class="row">

            <div class="col-sm-4">            
                <div class="card-quarto">
                    <img src="<?php echo get_field('conheca_mais');?>">
                    <a class="btn-padrao-roxo">Conheça mais</a>
                </div>            
            </div>

            <div class="col-sm-4">            
                <div class="card-quarto">
                    <img src="<?php echo get_field('como_chegar');?>">
                    <a class="btn-padrao-roxo">Descubra como chegar</a>
                </div>            
            </div>

            <div class="col-sm-4">            
                <div class="card-quarto">
                    <img src="<?php echo get_field('explore_cozinha');?>">
                    <a class="btn-padrao-roxo">Explore nossa cozinha</a>
                </div>            
            </div>


        </div>

    </div><!-- faixa-quartos -->

    <div class="container-fluid faixa-cinza">

        <div class="row">

            <div class="col-sm-1 col-sm-offset-2">
                <img class="logo_L" src="<?php uri()?>/img/logo_completo_roxo@2x.png">
            </div>
            <div class="col-sm-6 col-sm-offset-1">
                <div class="vem-pro-lush">
                <?php echo get_field('faixa_cinza_vem_lush');?>
                </div>
            </div>

        </div>
    </div> <!-- faixa-cinza -->

    <div class="container-fluid faixa-news-letter">

        <div class="row">

            <div class="col-sm-8 col-sm-offset-2">

                <div class="card-news-letter">
                    <div class="card-header">
                        <h3><?php echo get_field('formulario_titulo');?></h3>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            
                            <div class="col-sm-10 col-sm-offset-1 form-titulo">
                                
                                <p><?php echo get_field('formulario_descricao');?></p>
                                
                            </div>

                            <div class="col-sm-10 col-sm-offset-1">

                                <form>

                                    <div class="row">
                                        <div class="col-xs-6">
                                            <input type="text" class="form-control campo-linha" placeholder="Seu nome">
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="email" class="form-control campo-linha" placeholder="Seu email">
                                        </div>
                                        <div class="col-sm-10 col-sm-offset-1  ">
                                            <button class="btn-enviar">Enviar</button>
                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                        

                        <form>

                        </form>

                    </div>
                </div>

            </div>

        </div>

    </div>


</div>

<?php
get_footer();
