<?php
/**
 * Plugin Name: MailChimp Subscribe
 * Description: Widget para inscrever-se em uma list do MailChimp
 * Author: Mamangava
 * Author URI: http://mamangava.com/
 * Version: 1.0.0
 * License: GPLv2 or later
 */
require_once 'inc/MCAPI.class.php';

class MmgvMailChimpSub extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'mmgvMailChimpSib', // Base ID
                __('MailChimp List Subscribe para Lateral', 'text_domain'), // Name
                array('description' => __('Widget que disponibiliza um formulário para inscrever-se em um lista do MailChimp ', 'text_domain'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        echo $args['before_widget'];
        ?>

        <p class="titulo-mailchimp">Assine a nossa newsletter e receba
            matérias que tem tudo a ver com você!
        </p>

        <form type="post" action="" id="newCustomerForm">

            <div class="input-group">
                <input name="email"  required="" id="emailmmgv" type="email" class="form-control" placeholder="Insira seu e-mail aqui" >
                <span class="input-group-btn">
                    <input  type="hidden" name="action" value="addCustomer"/>
                    <input class="btn btn-verde-cheio" type="submit" value="Assine">
                </span>
            </div><!-- /input-group -->
        </form>

        <p class="aviso">Você pode cancelar sua assinatura a quando quiser. 
            Fique tranquilo, não vamos te enviar spam, levamos sua privacidade a sério.
        </p>

        <div id="feedback">
            <div id="myModal1" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Obrigado</h4>
                        </div>
                        <div class="modal-body">
                            <p>Por favor, confirme sua assinatura no e-mail que receberá. Após isso você já estará pronto para receber os melhores conteúdos sobre logística, e-commerce e empreendedorismo diretamente no seu e-mail. Aproveite! \o/ </p>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <br/>



        <script type="text/javascript">
            jQuery('#newCustomerForm').submit(ajaxSubmit);
            function ajaxSubmit() {

                var newCustomerForm = jQuery(this).serialize();

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo get_site_url(); ?>/wp-admin/admin-ajax.php",
                    data: newCustomerForm,
                    success: function (data) {
                        jQuery("#myModal1").modal('show');

                        setTimeout(function () {
                            jQuery("#myModal1").modal('hide');
                        }, 5000);
                        jQuery("#emailmmgv").val('');

                    }
                });

                return false;
            }
        </script>


        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        
    }

}

// class Foo_Widget
// register Foo_Widget widget
function register_mmgv_widget_sub() {
    register_widget('MmgvMailChimpSub');
}

add_action('widgets_init', 'register_mmgv_widget_sub');

class MmgvMailChimpFooter extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'mmgvMailChimpSib2', // Base ID
                __('MailChimp List Subscribe para o Footer', 'text_domain'), // Name
                array('description' => __('Widget que disponibiliza um formulário para inscrever-se em um lista do MailChimp ', 'text_domain'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        echo $args['before_widget'];
        ?>

        <div class="mailchimp-footer">

            <p class="titulo">
                Assine a nossa newsletter e receba matérias que tem tudo a ver com você!
            </p>

            <p class="sub-titulo">
                32.000 pessoas curiosas e antenadas já recebem nossos e-mails semanalmente.
            </p>

            <form type="post" action="" id="newCustomerForm2">

                <div class="row"> 
                    <div class="col-sm-12 col-md-8 col-md-offset-2">
                        <div class="input-group">
                            <input name="email"  required="" id="emailmmgv2" type="email" class="form-control" placeholder="Insira seu e-mail aqui" >
                            <span class="input-group-btn">
                                <input  type="hidden" name="action" value="addCustomer"/>
                                <input class="btn btn-verde-cheio" type="submit" value="Assine">
                            </span>
                        </div><!-- /input-group -->
                    </div>
                </div>
            </form>



        </div><!-- .mailchimp-footer -->

        <div id="feedback2" >
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Obrigado</h4>
                        </div>
                        <div class="modal-body">
                            <p>Por favor, confirme sua assinatura no e-mail que receberá. Após isso você já estará pronto para receber os melhores conteúdos sobre logística, e-commerce e empreendedorismo diretamente no seu e-mail. Aproveite! \o/ </p>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <br/>



        <script type="text/javascript">
            jQuery('#newCustomerForm2').submit(ajaxSubmit2);
            function ajaxSubmit2() {

                var newCustomerForm2 = jQuery(this).serialize();

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo get_site_url(); ?>/wp-admin/admin-ajax.php",
                    data: newCustomerForm2,
                    success: function (data) {
                        jQuery("#myModal").modal('show');

                        setTimeout(function () {
                            jQuery("#myModal").modal('hide');
                        }, 5000);

                        jQuery("#emailmmgv2").val('');

                    }
                });

                return false;
            }
        </script>


        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        
    }

}

// class Foo_Widget
// register Foo_Widget widget
function register_mmgv_widget_footer() {
    register_widget('MmgvMailChimpFooter');
}

add_action('widgets_init', 'register_mmgv_widget_footer');

//

function addCustomerMmgv() {

    $apiKey = "0a9609e577b0d0543ce4319b6c9b688d-us6";
    $listId = "cb5eb4d82a";


    $api = new MCAPI($apiKey);
    //$merge_vars = array('FNAME' => $_POST["fname"], 'LNAME' => $_POST["lname"]);
    // Submit subscriber data to MailChimp
    // For parameters doc, refer to: http://apidocs.mailchimp.com/api/1.3/listsubscribe.func.php
    $retval = $api->listSubscribe($listId, $_POST["email"], '', 'html', true, true);




    if ($api->errorCode) {
        echo '<div class="alert alert-danger" role="alert">';
        echo "<p>" . $api->errorMessage . "<p>";
        echo "</div>";
    } else {
        ?>
        <script>

        </script>
        <?php
    }



    die();
}

add_action('wp_ajax_addCustomer', 'addCustomerMmgv');
add_action('wp_ajax_nopriv_addCustomer', 'addCustomerMmgv'); // not really needed