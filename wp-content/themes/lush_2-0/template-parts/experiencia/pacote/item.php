<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


    <?php global $product; ?>

    <div class="pacote-item col-xs-12 col-sm-10 col-sm-offset-1">
        <div class="row">
            <div class="col-sm-6 item-texto">                      
                <?php the_title('<h3>', '</h3>'); ?>
                <?php the_content(); ?>
            </div><!-- item-texto -->
            <div class="col-sm-6 item-reserve">
                <div class="preco">
                    <p>
                        <?php
                        echo $product->get_price_html();
                        ?> + SUÍTE ESCOLHIDA
                    </p>
                </div>
                <?php wc_get_template_part('single-product/add-to-cart/simple', 'lush'); ?>

            </div><!-- item-reserve -->
        </div>
    </div><!-- pacote-item -->

