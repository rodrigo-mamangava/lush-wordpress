

<div class="page-chegar"> 

    <div class="container-fluid faixa-mapa-como-chegar" style="background-image: url(<?php echo get_field('img_mapa');?>)">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="card-endereco">
                    <h1>Lush Motel</h1>

                    <p>
                        <?php echo get_field('endereco'); ?>
                    </p>

                    <hr>

                    <p class="a-partir">
                        <?php _e('From one point', 'lush_2-0'); ?>
                    </p>

                    <p><?php _e('Congonhas Airport', 'lush_2-0'); ?></p>
                    <p><?php _e('Av. Paulista', 'lush_2-0'); ?></p>
                    <p><?php _e('Praça da Sé', 'lush_2-0'); ?></p>
                    <p><?php _e('Ibirapuera park', 'lush_2-0'); ?></p>

                </div>

            </div>
        </div>

    </div><!-- mapa -->


    <div class="container-fluid faixa-explore">
        <div class="row">
            <div class="col-xs-12">
                <p><?php _e('Make a Reservation', 'lush_2-0'); ?></p>
                <h2><?php _e('Explore all your senses', 'lush_2-0'); ?></h2>
                <a class="btn-reservar-v2" href="#"><?php _e('Book', 'lush_2-0'); ?></a>

            </div>
        </div>

    </div><!-- faixa-explore -->

</div>
