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
            <div class="col-lg-10 col-lg-offset-1 col-xs-12">
                <img class="logo" src="img/logo_lush_branco@2x.png">
            </div>
            <div class="col-lg-3 col-lg-offset-1 col-sm-4 col-xs-12">


                <p>
                    Avenida do Estado 6600, Ipiranga
                    São Paulo, Brasil 
                </p>
                <br/>
                <p>+55 (11) 2271 0020</p>
                <p>contato@lushmotel.com.br</p>

            </div>
            <div class="col-lg-3 col-lg-offset-1 col-sm-4 col-xs-12">

                <?php
                $menu_name = 'principal';
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations[$menu_name]);
                $menuitems = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
                
                debug($menuitems);
                
                ?>

            </div>
            <div class="col-lg-3 col-sm-3">
<?php
wp_nav_menu(array(
    'theme_location' => 'social',
    'menu_class' => 'list-language',
));
?>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
