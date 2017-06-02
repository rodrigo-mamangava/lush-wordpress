

<div class="page-chegar"> 

    <div class="container-fluid faixa-mapa-como-chegar" style="background-image: url(<?php echo get_field('img_mapa'); ?>)">
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

                    <a target="_blank" href="https://www.google.com.br/maps/dir/Aeroporto+de+S%C3%A3o+Paulo%2FCongonhas,+Av.+Washington+Lu%C3%ADs,+s%2Fn%C2%BA+-+Vila+Congonhas,+S%C3%A3o+Paulo+-+SP,+04626-911/Lush+Motel+-+Av.+do+Estado,+6600+-+Cambuci,+S%C3%A3o+Paulo+-+SP,+01516-100/@-23.5893359,-46.6707993,13z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x94ce5a7ab9d400f3:0x3ae70697e64d7085!2m2!1d-46.6565842!2d-23.6273246!1m5!1m1!1s0x94ce59424e287ae3:0xee932227e8352a7b!2m2!1d-46.6109749!2d-23.5655499">
                        <p> <?php _e('Congonhas Airport', 'lush_2-0'); ?></p>
                    </a>
                    <a target="_blank" href="https://www.google.com.br/maps/dir/Av.+Paulista,+S%C3%A3o+Paulo/Lush+Motel+-+Av.+do+Estado,+6600+-+Cambuci,+S%C3%A3o+Paulo+-+SP,+01516-100/@-23.5756978,-46.6361664,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x94ce59c8da0aa315:0xd59f9431f2c9776a!2m2!1d-46.6542596!2d-23.5632188!1m5!1m1!1s0x94ce59424e287ae3:0xee932227e8352a7b!2m2!1d-46.6109749!2d-23.5655499">
                        <p><?php _e('Av. Paulista', 'lush_2-0'); ?></p>
                    </a>
                    <a target="_blank" href="https://www.google.com.br/maps/dir/Pra%C3%A7a+da+S%C3%A9,+S%C3%A3o+Paulo+-+SP/Lush+Motel+-+Av.+do+Estado,+6600+-+Cambuci,+S%C3%A3o+Paulo+-+SP,+01516-100/@-23.5555162,-46.631588,15z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x94ce59abaaae4233:0xd9186faf714bc5b1!2m2!1d-46.6340827!2d-23.5500806!1m5!1m1!1s0x94ce59424e287ae3:0xee932227e8352a7b!2m2!1d-46.6109749!2d-23.5655499">
                        <p><?php _e('Praça da Sé', 'lush_2-0'); ?></p>
                    </a>
                    <a target="_blank" href="https://www.google.com.br/maps/dir/Parque+Ibirapuera,+Av.+Pedro+%C3%81lvares+Cabral+-+Vila+Mariana,+S%C3%A3o+Paulo+-+SP,+04002-010/Lush+Motel+-+Av.+do+Estado,+6600+-+Cambuci,+S%C3%A3o+Paulo+-+SP,+01516-100/@-23.5729751,-46.6496919,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x94ce59f1069d11d1:0xcb936109af9ce541!2m2!1d-46.6576336!2d-23.5874162!1m5!1m1!1s0x94ce59424e287ae3:0xee932227e8352a7b!2m2!1d-46.6109749!2d-23.5655499">
                        <p><?php _e('Ibirapuera park', 'lush_2-0'); ?></p>
                    </a>

                </div>

            </div>
        </div>

    </div><!-- mapa -->


    <div class="container-fluid faixa-explore">
        <div class="row">
            <div class="col-xs-12">
                <p><?php _e('Make a Reservation', 'lush_2-0'); ?></p>
                <h2><?php _e('Explore all your senses', 'lush_2-0'); ?></h2>
                <a class="btn-reservar-v2" href="<?php echo get_term_link('suite', 'product_cat'); ?>"><?php _e('Book', 'lush_2-0'); ?></a>

            </div>
        </div>

    </div><!-- faixa-explore -->

</div>
