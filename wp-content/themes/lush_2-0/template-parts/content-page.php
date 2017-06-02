<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lush_2.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="row">
            
            <?php the_content(); ?>
            
        </div>


    </div>


</article><!-- #post-## -->
