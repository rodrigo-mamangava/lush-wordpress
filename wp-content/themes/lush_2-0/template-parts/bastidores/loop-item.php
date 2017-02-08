<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="bastidores-item">
    <div class="row">
        <div class="col-xs-4 col-sm-2 col-sm-offset-2">
            <div class="meta-dados">
                <p><?php post_on(); ?></p>
            </div>
            <?php the_post_thumbnail('thumbnail');?>
        </div>
        <div class="col-xs-8 col-sm-6 ">
            <?php get_bastibores_item_cat(); ?>
            <a class="" href="<?php echo get_permalink(); ?>">
                <?php the_title('<h2>', '</h2>'); ?>
                <div class="intro">
                    <?php the_excerpt(); ?>
                </div>
            </a>
        </div>
    </div>
</div><!-- bastidores-item -->

<div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 linha-div">
        <hr/>
    </div>
</div>

