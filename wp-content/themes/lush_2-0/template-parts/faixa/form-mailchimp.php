<div class="container-fluid faixa-lush-member">
    <div class="row">
        <div class="col-xs-12">
            <h2><?php _e("LUSH PREMIUM GUEST", 'lush_2-0'); ?></h2>
            <h3>
                <?php echo get_field('frase_form'); ?>
            </h3>
            <p>
                <?php echo get_field('frase_novidades'); ?>
            </p>
            <form class="form-lush">
                <input type="text" id="nome" name="nome" placeholder="<?php _e('Name', 'lush_2-0') ?>" class="campo"><br/>
                <input type="email" id="email" name="email" placeholder="<?php _e('E-mail', 'lush_2-0') ?>" class="campo"><br/>
                <input type="submit" value="<?php _e('Subscribe', 'lush_2-0') ?>" class="btn-participar-v2"><br/>

            </form>
        </div>
    </div>
</div><!-- faixa-lush-member -->