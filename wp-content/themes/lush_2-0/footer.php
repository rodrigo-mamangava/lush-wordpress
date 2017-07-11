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


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-xs-10 col-xs-offset-1">
                <img class="logo" src="<?php uri() ?>/img/logo_lush_branco@2x.png">
            </div>


            <div class="col-lg-3 col-sm-3 col-xs-10 col-xs-offset-1 visible-xs mobile">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'social',
                    'menu_class' => 'list-language',
                ));
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

            <div class="col-lg-3 col-lg-offset-1 col-sm-4 col-xs-10 col-xs-offset-1">


                <p>
                    Avenida do Estado 6600, Ipiranga
                    São Paulo, Brasil 
                </p>
                <br/>
                <p>+55 (11) 2271 0020</p>
                <p>contato@lushmotel.com.br</p>

            </div>
            <div class="col-lg-3 col-lg-offset-1 col-sm-4 col-xs-10 col-xs-offset-1 hidden-xs">

                <?php
                wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_class' => 'menu-footer',
                        )
                );
                ?>

            </div>
            <div class="col-lg-3 col-sm-3 hidden-xs">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'social',
                    'menu_class' => 'list-language',
                ));

                wp_nav_menu(
                        array(
                            'theme_location' => 'idioma',
                            'menu_class' => 'list-language',
                        )
                );
                ?>

            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
