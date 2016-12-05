<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function mmgv_form_init() {
    register_setting('mmgv_options', 'mmgv_facebook');
    register_setting('mmgv_options', 'mmgv_instagram');
    register_setting('mmgv_options', 'mmgv_youtube');
    register_setting('mmgv_options', 'endereco_linha_01');
}

add_action('admin_init', 'mmgv_form_init');

function mmgv_form_cliente_conf_list() {
    ?>
    <div class="wrap">
        <?php screen_icon(); ?>
        <h2>Informações gerais para o site</h2>
        <br/>



        <form action="options.php" method="post" id="form_senha_cliente">

            <h2>Rede social</h2>

            <?php settings_fields('mmgv_options') ?>

            <p><label for="mmgv_facebook" >Facebook</label></p>
            <p>
                <input type="text" id="mmgv_facebook" name="mmgv_facebook" style="width: 500px;"
                       value="<?php echo esc_attr(get_option('mmgv_facebook')); ?>" />           
            </p>


            <p><label for="mmgv_instagram" >Instagram</label></p>
            <p>
                <input type="text" id="mmgv_twitter" name="mmgv_instagram" style="width: 500px;"
                       value="<?php echo esc_attr(get_option('mmgv_instagram')); ?>" />           
            </p>




            <h2>Endereço</h2>

            <p><label for="endereco_linha_01" >Endereço - Footer</label></p>
            <p>
                <input type="text" id="endereco_linha_01" name="endereco_linha_01" style="width: 500px;"
                       value="<?php echo esc_attr(get_option('endereco_linha_01')); ?>" />           
            </p>

            <input type="submit" value="Salvar">

        </form>


    </div>

    <?php
}

function mmgv_config_pass() {
    add_options_page('Informações gerais', 'Informações gerais', 'manage_options', 'mmgv_pass', 'mmgv_form_cliente_conf_list');
}

add_action('admin_menu', 'mmgv_config_pass');