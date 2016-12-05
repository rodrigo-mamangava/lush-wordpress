<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


get_header();
?>

<div class="home">
    
    <?php
    $urlImagem = '/img/lush_spa_splash@2x.png';
    include 'template-parts/vitrine.php';
    ?>


    <div class="container-fluid faixa-quartos">

        <div class="row">

            <div class="col-sm-4">            
                <div class="card-quarto">
                    <img src="<?php uri()?>/img/conheca_suite@2x.png">
                    <a class="btn-padrao-roxo">Conheça mais</a>
                </div>            
            </div>

            <div class="col-sm-4">            
                <div class="card-quarto">
                    <img src="<?php uri()?>/img/mapa@2x.png">
                    <a class="btn-padrao-roxo">Descubra como chegar</a>
                </div>            
            </div>

            <div class="col-sm-4">            
                <div class="card-quarto">
                    <img src="<?php uri()?>/img/explore_cozinha@2x.png">
                    <a class="btn-padrao-roxo">Explore nossa cosinha</a>
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
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Proin a purus ipsum. Pellentesque consectetur lorem at magna 
                    pharetra efficitur. Nullam ultrices eget risus eget fringilla. 
                    Maecenas ultricies ex nisl, sed aliquam neque iaculis sit amet. 
                    Nunc ipsum libero, porttitor id finibus non, tempor sed augue. 
                    Proin faucibus volutpat metus ac convallis.
                </p>
                <p>#VemProLush</p>
            </div>

        </div>
    </div> <!-- faixa-cinza -->

    <div class="container-fluid faixa-news-letter">

        <div class="row">

            <div class="col-sm-8 col-sm-offset-2">

                <div class="card-news-letter">
                    <div class="card-header">
                        <h3>Torne-se hoje mesmo um Lush Member</h3>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            
                            <div class="col-sm-10 col-sm-offset-1 form-titulo">
                                
                                <p>Seja o primeiro a saber das novidades e ganhe descontos exclusivos.</p>
                                
                            </div>

                            <div class="col-sm-10 col-sm-offset-1">

                                <form>

                                    <div class="row">
                                        <div class="col-xs-6">
                                            <input type="text" class="form-control campo-linha" placeholder="Sua senha">
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
