<?php
global $post;
?>

<div class="col-xs-12 col-sm-4 item-cat">
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('', array('class' => 'icone')); ?>
        <?php the_title('<h3>', '</h3>'); ?>
    </a>
</div>