<?php
/**
 * Template Name: Front-page
 */
get_header('home');
?>


<section>
    <div class=" faixa-vitrine container-fluid">

        <div id="video-container">

            <video autoplay loop poster="<?php uri() ?>/img/mobile/lush-mobile.jpg" class="bg-video hidden-xs hidden-sm">
                <source  src="<?php uri() ?>/video/lush-vitrine-video.mp4"  type="video/webm">
            </video>
            <img src="<?php uri() ?>/img/mobile/lush-mobile.jpg" class="bg-video visible-xs visible-sm ">

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
                            ?>

                            <div class="menu-menu-idiomas-container">
                                <ul id="menu-menu-idiomas" class="list-language">
                                    <li id="menu-item-8208" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8208">
                                        <a href="?lang=pb">PT</a>
                                    </li>
                                    <li id="menu-item-8209" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8209">
                                        <a href="?lang=en">EN</a>
                                    </li>
                                </ul>
                            </div>
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
            <div class="col-xs-12 seta-baixo hidden-xs">
                <a href="#suites">
                    <img src="<?php uri() ?>/img/scroll-down@3x.png">
                </a>
            </div>

        </div>

    </div><!-- .faixa-vitrine -->

<?php
get_template_part('template-parts/menu/home');
get_template_part('template-parts/menu/geral');
?>

    <div id="suites">
<?php wc_get_template('home/content-loop-suite-home.php'); ?>
    </div>

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
        getCustomImage('faixa_destaque_01_foto', 'faixa-intercalada'), get_field('faixa_destaque_01_icone'), get_field('faixa_destaque_01_titulo'), get_field('faixa_destaque_01_texto'), get_link_page_by_slug('experiencia'), __('[:pb]VER EXPERIÊNCIAS[:en]VIEW EXPERIENCES[:]')
);

faixa_destaque_impar(
        getCustomImage('faixa_destaque_02_foto', 'faixa-intercalada'), get_field('faixa_destaque_02_icone'), get_field('faixa_destaque_02_titulo'), get_field('faixa_destaque_02_texto'), get_link_page_by_slug('menu'), __('[:pb]EXPLORAR CARDÁPIO[:en]EXPLORE CARDIO[:]')
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
                <!--<a href="" id="waze"><img src="<?php // uri()  ?>/img/waze.png"><a/>-->

            </div>
            <div class="col-lg-10 col-lg-offset-1 col-md-12">
                <div class="mapa-wrap">
                    <h3><?php echo get_field('hashtag'); ?></h3>
                    <a target="_blank" href="https://www.google.com.br/maps/place/Lush+Motel/@-23.5655499,-46.6131636,17z/data=!3m1!4b1!4m5!3m4!1s0x94ce59424e287ae3:0xee932227e8352a7b!8m2!3d-23.5655499!4d-46.6109749">
                        <img class="hidden-xs" src="<?php uri() ?>/img/Lush_mapa.jpg" >
                        <img class="visible-xs" src="<?php uri() ?>/img/mapa@mobile.jpg">
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-lg-offset-3 col-md-12">   
                <a target="_blank" href="https://www.google.com.br/maps/place/Lush+Motel/@-23.5655499,-46.6131636,17z/data=!3m1!4b1!4m5!3m4!1s0x94ce59424e287ae3:0xee932227e8352a7b!8m2!3d-23.5655499!4d-46.6109749">
                    <p><?php echo get_field('endereco'); ?></p>
                </a>
                <a class="waze" 
                   href="waze://?ll=-23.5655499,-46.6131636,17" 
                   target="_blank" >
                    <p><?php _traduz('Abrir no Waze', 'Open on Waze') ?></p>
                </a>
            </div>


        </div>
    </div><!-- faixa-mapa -->



    <div class="container-fluid faixa-lush-member">
        <div class="row">
            <div class="col-xs-12">
                <h2><?php _e("LUSH PREMIUM GUEST", 'lush_2-0'); ?></h2>
                <h3>
<?php echo get_field('frase_form'); ?>
                </h3>
                <p>
<?php echo get_field('frase_novidades'); ?>
                </p>
                <div class="mailchimp-footer">

                    <form type="post" action="" id="newCustomerForm2" class="form-lush">

                        <input name="email"  required="" id="emailmmgv2" type="email" class="campo" placeholder="<?php _e('E-mail', 'lush_2-0') ?>" ><br/>
                        <input  type="hidden" name="action" value="addCustomer"/>
                        <input class="btn-participar-v2" type="submit"   value="<?php _e('Subscribe', 'lush_2-0') ?>"><br/>

                    </form>



                </div><!-- .mailchimp-footer -->

                <div id="feedback2" >
                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Obrigado</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Por favor, confirme sua assinatura no e-mail que receberá.</p>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
                <br/>



                <script type="text/javascript">
                    jQuery('#newCustomerForm2').submit(ajaxSubmit2);
                    function ajaxSubmit2() {

                        var newCustomerForm2 = jQuery(this).serialize();

                        jQuery.ajax({
                            type: "POST",
                            url: "<?php echo get_site_url(); ?>/wp-admin/admin-ajax.php",
                            data: newCustomerForm2,
                            success: function (data) {
                                jQuery("#myModal").modal('show');

                                setTimeout(function () {
                                    jQuery("#myModal").modal('hide');
                                }, 5000);

                                jQuery("#emailmmgv2").val('');

                            }
                        });

                        return false;
                    }
                </script>
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
