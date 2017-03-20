<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lush_2.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('padrao'); ?>>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </div>
            
            <?php the_content(); ?>
            
        </div>


    </div>


</article><!-- #post-## -->
