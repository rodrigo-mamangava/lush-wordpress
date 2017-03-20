<?php
/**
 * Template Name: Front-page
 */
get_header('home');
?>


<section>
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
                    </h1>
                    <h2>
                        <?php echo get_field('texto_desc'); ?>
                    </h2>
                    <p>
                        <?php echo get_field('hashtag'); ?>
                    </p>
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
    get_template_part('template-parts/menu/home');
    get_template_part('template-parts/menu/geral');
    ?>

    <?php wc_get_template('home/content-loop-suite-home.php'); ?>

</section>


<div class="container-fluid faixa-faichada" style="background-image: url(<?php echo getCustomImage('faixa_de_imagem_01', 'destaque-home'); ?>)">
    <div class="row">
    </div>
    <div class="img-filter"></div>
</div><!-- faixa-faichada -->


<div class=" faixa-saiba-mais">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                <h2><?php _e("Know more", 'lush_2-0'); ?></h2>
            </div>
        </div>

        <div>
            <div class="row">
                <section>
                    <?php
                    faixa_destaque_par(
                            getCustomImage('faixa_destaque_01_foto', 'faixa-intercalada'), get_field('faixa_destaque_01_icone'), get_field('faixa_destaque_01_titulo'), get_field('faixa_destaque_01_texto'), get_link_page_by_slug('experiencia'), 'View Experiences'
                    );

                    faixa_destaque_impar(
                            getCustomImage('faixa_destaque_02_foto', 'faixa-intercalada'), get_field('faixa_destaque_02_icone'), get_field('faixa_destaque_02_titulo'), get_field('faixa_destaque_02_texto'), get_link_page_by_slug('menu'), 'Explore menu'
                    );
                    ?>
                </section>

            </div>
        </div>
    </div>
</div><!-- faixa-saiba-mais -->

<section>
    <div class="container-fluid faixa-mapa">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-md-12">
                <h2 class=""><?php echo get_field('como_chegar'); ?></h2>
            </div>
            <div class="col-lg-10 col-lg-offset-1 col-md-12">
                <div class="mapa-wrap">
                    <h3><?php echo get_field('hashtag'); ?></h3>
                    <img class="hidden-xs" src="<?php uri() ?>/img/mapa@2x.png" >
                    <img class="visible-xs" src="<?php uri() ?>/img/mapa@mobile.jpg">
                </div>
            </div>

            <div class="col-lg-6 col-lg-offset-3 col-md-12">            
                <p><?php echo get_field('endereco'); ?></p>
            </div>


        </div>
    </div><!-- faixa-mapa -->

    <div class="container-fluid faixa-lush-member">
        <div class="row">
            <div class="col-xs-12">
                <h2><?php _e("Lush Member", 'lush_2-0'); ?></h2>
                <h3>
                    <?php echo get_field('frase_form'); ?>
                </h3>
                <p>
                    <?php echo get_field('frase_novidades'); ?>
                </p>
                <form class="form-lush">
                    <input type="text" id="nome" name="nome" placeholder="<?php _e('Name', 'lush_2-0') ?>" class="campo"><br/>
                    <input type="email" id="email" name="email" placeholder="<?php _e('E-mail', 'lush_2-0') ?>" class="campo"><br/>
                    <input type="submit" value="<?php _e('Subscribe', 'lush_2-0') ?>" class="btn-participar-v2"><br/>

                </form>
            </div>
        </div>
    </div><!-- faixa-lush-member -->


    <div class="experiencia">
        <div class="faixa-destaque faixa-destaque-home">
            <div class="container-fluid">
                <div class="row">
                    <div class="para-presentear col-sm-8 col-sm-offset-2">

                        <h2><?php _e('To gift', 'lush_2-0') ?></h2>
                        <h3><?php _e('Lush Gift Card', 'lush_2-0') ?></h3>

                        <img class="gift-cards-mobile visible-xs center-block" src="<?php uri() ?>/img/gift-v2.png" >

                        <div class="row">
                            <div class="col-sm-6 texto">
                                <?php echo get_field('frase_presentei_com_estilo') ?>
                            </div>
                        </div>

                        <a class="btn-verde-v02" href="<?php echo get_term_link('gift-card', 'product_cat') ?>" ><?php _e('Buy now', 'lush_2-0') ?></a>

                        <img class="gift-cards hidden-xs " src="<?php uri() ?>/img/gift-v2.png" >


                    </div><!-- para-presentear -->
                </div>

            </div>
        </div><!-- faixa-destaque-->


    </div>
</section>

<?php
get_footer();
