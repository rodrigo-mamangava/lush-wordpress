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


<footer class="container-fluid">

    <div class="row">

        <div class="col-xs-2">
            <a href="#">
                <img class="logo" src="<?php uri()?>/img/logo_L@2x.png">
            </a>
        </div>
        <div class="col-xs-7 endereco">
            <p><?php echo get_option('endereco_linha_01'); ?></p>
        </div>
        <div class="col-xs-3">
            <ul>
                <li>
                    <a class="link-social" target="_blank" href="<?php echo esc_attr(get_option('mmgv_facebook')); ?>"><img class="rede-social face" src="<?php uri()?>/img/face_branco@2x.png"></a>
                </li>
                <li>
                    <a class="link-social" target="_blank" href="<?php echo esc_attr(get_option('mmgv_instagram')); ?>"><img class="rede-social" src="<?php uri()?>/img/insta_branco@2x.png"></a>
                </li>
            </ul>
        </div>

    </div>

</footer>
<?php wp_footer(); ?>
</body>
</html>
