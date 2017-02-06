<?php
global $post;
?>

<div class="col-xs-12 col-sm-5 col-sm-offset-1 governanca">
    <a href="<?php the_permalink(); ?>">
        <?php the_title('<h3>', '</h3>'); ?>
        <?php the_content(); ?>
    </a>
</div>