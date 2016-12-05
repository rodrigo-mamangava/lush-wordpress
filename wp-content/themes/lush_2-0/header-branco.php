<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lush_2.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div class="header-branco ">
            <div class="container-fluid">
                <div class="header-content">
                    <div class="row">
                        <div class="col-xs-4">

                            <div class="fat-nav">
                                <?php
                                wp_nav_menu_lush(array('container_class' => 'fat-nav__wrapper'));
                                ?>
                            </div>


                        </div>
                        <div class="col-xs-4 titulo header-item">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php uri() ?>/img/logo_roxo@2x.png"></a>
                        </div>
                        <div class="col-xs-4 header-item">
                            <ul class="botoes-r">

                                <li><a href="#" class="btn-lupa"><img src="<?php uri() ?>/img/lupa_roxo@2x.png" class="img-responsive"></a></li>
                                <li><a class="btn-reservar-lilas">Reservar</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>




