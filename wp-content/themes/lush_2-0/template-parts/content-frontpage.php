<?php
/**
 * Template Name: Front-page
 */
get_header('home');
?>

<div class=" faixa-vitrine container-fluid">

    <div id="video-container">

        <video autoplay loop poster="" class="bg-video">
            <source  src="<?php uri() ?>/video/lush-vitrine-video.mp4"  type="video/webm">
        </video>

    </div><!-- #video-container -->


    <div class="row">
        <div class="vitrine">

            <div class="menu-header">
                <div class="">
                    <div class="col-lg-offset-1 col-lg-4 col-xs-5 logo">
                        <img src="<?php uri() ?>/img/logo_lush_branco@2x.png">
                    </div>
                    <div class="col-lg-7 col-xs-6 menu-itens">
                        <?php
                        wp_nav_menu(
                                array(
                                    'theme_location' => 'social',
                                    'menu_class' => 'list-social',
                                )
                        );

                        wp_nav_menu(
                                array(
                                    'theme_location' => 'idioma',
                                    'menu_class' => 'list-language',
                                )
                        );
                        ?>
                    </div>
                </div>
            </div><!-- container menu-header -->
        </div><!-- .vitrine -->
    </div><!-- .row -->

    <div class="row">
        <div class="col-lg-offset-1 col-lg-6 col-md-8 col-xs-12">
            <div class="vitrine-chamada">
                <h1>
                    <?php echo get_field('texto_destaque'); ?>
                    <br/>
                    <span><?php echo get_field('hashtag'); ?></span>
                </h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 seta-baixo">
            <img src="<?php uri() ?>/img/scroll-down@3x.png">
        </div>

    </div>

</div><!-- .faixa-vitrine -->

<?php
get_template_part('template-parts/menu/principal');
?>


<div class="container-fluid faixa-faichada" style="background-image: url(<?php echo get_field('faixa_de_imagem_01'); ?>)">
    <div class="row">
    </div>
    <div class="img-filter"></div>
</div><!-- faixa-faichada -->



<div class=" faixa-saiba-mais">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                <h2>SAIBA MAIS SOBRE O LUSH</h2>
            </div>
        </div>

        <div>
            <div class="row">
                <div class="subfaixa-destaque col-xs-12">
                    <div class="row">
                        <div class="item-subfaixa">
                            <div class="col-sm-5 destaque-img">
                                <img src="<?php echo get_field('faixa_destaque_01_foto'); ?>" class="img-destaque">
                            </div>
                            <div class=" col-sm-7 destaque-texto">
                                <img class="icon-destaque" src="<?php echo get_field('faixa_destaque_01_icone'); ?>">
                                <h3><?php echo get_field('faixa_destaque_01_titulo'); ?></h3>
                                <p>
                                    <?php echo get_field('faixa_destaque_01_texto'); ?>
                                </p>

                                <a>VER EXPERIÊNCIAS</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="subfaixa-destaque col-xs-12">
                    <div class="row">
                        <div class="item-subfaixa">
                            <div class=" col-sm-7 destaque-texto">
                                <img class="icon-destaque" src="<?php echo get_field('faixa_destaque_01_icone'); ?>">
                                <h3><?php echo get_field('faixa_destaque_01_titulo'); ?></h3>
                                <p>
                                    <?php echo get_field('faixa_destaque_01_texto'); ?>
                                </p>

                                <a>VER EXPERIÊNCIAS</a>
                            </div>
                            <div class="col-sm-5 destaque-img">
                                <img src="<?php echo get_field('faixa_destaque_01_foto'); ?>" class="img-destaque">
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div><!-- faixa-saiba-mais -->


<div class="container-fluid faixa-mapa">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-12">
            <h2 class=""> Como chegar no Lush Motel</h2>
        </div>
        <div class="col-lg-10 col-lg-offset-1 col-md-12">
            <div class="mapa-wrap">
                <h3>#VemProLush</h3>
                <img src="<?php uri() ?>/img/mapa@2x.png">
            </div>
        </div>

        <div class="col-lg-6 col-lg-offset-3 col-md-12">            
            <?php echo get_field('endereco'); ?>
        </div>


    </div>
</div><!-- faixa-mapa -->

<div class="container-fluid faixa-lush-member">
    <div class="row">
        <div class="col-xs-12">
            <h2>LUSH MEMBER</h2>
            <h3>Seja um Lush Member agora mesmo</h3>
            <p>Seja o primeiro a saber das novidades e ganhe descontos exclusivos.</p>
            <form class="form-lush">
                <input type="text" id="nome" name="nome" placeholder="Nome" class="campo"><br/>
                <input type="email" id="email" name="email" placeholder="Email" class="campo"><br/>
                <input type="submit" value="Participar" class="btn-participar-v2"><br/>

            </form>
        </div>
    </div>
</div><!-- faixa-lush-member -->


<div class="experiencia">
    <div class="faixa-destaque faixa-destaque-home">
        <div class="container-fluid">
            <div class="row">
                <div class="para-presentear col-sm-8 col-sm-offset-1">

                    <h2>para presentear</h2>
                    <h3>Lush Gift Card</h3>
                    <div class="row">
                        <div class="col-sm-8 ">
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

</div>

<?php
get_footer();
