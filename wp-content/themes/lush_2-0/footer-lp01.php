<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lush_2.0
 */
?>


<footer class="footer-lp01">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 ">
                <div class="siga">
                    <p>Siga o Lush nas redes</p>

                </div>
            </div>
            <div class="col-xs-12 menu-social">
                <?php
                wp_nav_menu(
                        array(
                            'theme_location' => 'social',
                            'menu_class' => 'list-social',
                        )
                );
                ?>

            </div>

            <div class="col-xs-12 endereco">


                <p>
                    Avenida do Estado 6600 &#8226; Ipiranga &#8226; (11) 2271 0020                    
                </p>

                <p>contato@lushmotel.com.br &#8226; www.lushmotel.com.br</p>

            </div>

            <div class="col-xs-12 faixa-logo">
                <img class="logo" src="<?php uri() ?>/img/logo_lush_branco@2x.png">
            </div>

        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
