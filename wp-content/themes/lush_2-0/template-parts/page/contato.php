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

                <?php
                //sending mail
                if (isset($_POST['sub'])) {

//                    $mailto = "rodrigobmuniz@gmail.com";
                    $mailto = get_option('admin_email');

                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $assunto = $_POST['assunto'];
                    $mensagem = $_POST['mensagem'];
                    $headers[] = 'From: Contato Lush Motel <cliente@lushmotel.com.br>';
                    $headers[] = 'Content-Type: text/html; charset=UTF-8';

                    $conteudo = "===============================<br/>";
                    $conteudo .= " Contato / Lush Motel <br/>";
                    $conteudo .= "===============================<br/>";
                    $conteudo .= "De: {$nome} <br/>";
                    $conteudo .= "Email: {$email} <br/>";
                    $conteudo .= "Mensagem: <br/>";
                    $conteudo .= " {$mensagem} <br/>";

                    $result = wp_mail($mailto, $assunto, $conteudo, $headers);
                    if ($result) {
                        echo "<script>alert('Enviado com sucessso!');</script>";
                    } else {
                        
                    }
                }
                ?>

                <form class="form-lush"  method="post" action="#">
                    <input required type="text" id="nome" name="nome" placeholder="<?php _e('Name', 'lush_2-0'); ?>" class="campo"><br/>
                    <input required type="email" id="email" name="email" placeholder="<?php _e('E-mail', 'lush_2-0'); ?>" class="campo"><br/>
                    <input required type="text" id="assunto" name="assunto" placeholder="<?php _e('Subject', 'lush_2-0'); ?>" class="campo"><br/>
                    <input required type="text" id="mensagem" name="mensagem" placeholder="<?php _e('Message', 'lush_2-0'); ?>" class="campo"><br/>
                    <input type="submit"  name="sub" id="sub" value="<?php _e('Send', 'lush_2-0'); ?>" class="btn-participar-v2"><br/>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 trabalhar ">
                <p class="destaque">
                    <?php _traduz('Quer trabalhar conosco?', 'Do you want to work with us?') ?>
                </p>

                <p class="normal" ><?php _e('Submit your resume to', 'lush_2-0'); ?> rh@lushmotel.com.br</p>

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