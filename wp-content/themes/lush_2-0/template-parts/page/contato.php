<div class="contato">
    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-6 col-sm-offset-3 conhecer">
                <p class="destaque">
                    <?php echo get_field('frase_ainda_nao_conhece'); ?>
                </p>

                <p>
                    <?php echo get_field('frase_ja_hospedou'); ?>
                </p>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <form class="form-lush">
                    <input type="text" id="nome" name="nome" placeholder="<?php _e('Name', 'lush_2-0'); ?>" class="campo"><br/>
                    <input type="email" id="email" name="email" placeholder="<?php _e('E-mail', 'lush_2-0'); ?>" class="campo"><br/>
                    <input type="text" id="assunto" name="assunto" placeholder="<?php _e('Subject', 'lush_2-0'); ?>" class="campo"><br/>
                    <input type="text" id="mensagem" name="mensagem" placeholder="<?php _e('Message', 'lush_2-0'); ?>" class="campo"><br/>
                    <input type="submit" value="<?php _e('Send', 'lush_2-0'); ?>" class="btn-participar-v2"><br/>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 trabalhar ">
                <p class="destaque">
                    <?php _e('Do you want to work with us?', 'lush_2-0'); ?>
                </p>

                <p class="normal" ><?php _e('Submit your resume to', 'lush_2-0'); ?> rh@lush.com.br</p>

                <p class="destaque destaque-2" ><?php _e('Lush on social networks', 'lush_2-0'); ?></p>

                <?php
                wp_nav_menu(
                        array(
                            'theme_location' => 'social',
                            'menu_class' => 'list-social',
                        )
                );
                ?>

            </div>
        </div>

    </div>

</div>