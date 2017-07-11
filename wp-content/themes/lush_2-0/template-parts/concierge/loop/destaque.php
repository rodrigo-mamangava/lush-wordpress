<?php ?>

<?php
$img = get_template_directory_uri() . "/img/lush_concierge.jpg";
get_new_vitrine($img, 'CONCIERGE')
?>

<div class="container faixa-explore-concierge">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <p>
                <?php
                _traduz(
                        'Bem-vindo ao Lush, um novo conceito de hospedagem Urban Resort. Esse concierge digital vai ajudá-lo a aproveitar ao máximo todos os serviços que estão a sua disposição e tornar sua experiência conosco ainda mais especial. Navegue pelos campos abaixo e divirta-se!', 
                        'Welcome to Lush, a new concept of Urban Resort hosting. This digital concierge will help you make the most of all the services that are at your disposal and make your experience with us even more special. Browse the fields below and enjoy!'
                );
                ?>
            </p>
        </div>
    </div>

</div><!-- faixa-explore -->

<?php
$terms = get_terms(array(
    'taxonomy' => 'cat-concierge',
    'orderby' => 'name',
    'hide_empty' => false,
        ));
?>

<div class="container lista-cat-concierge">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="row">

                <?php foreach ($terms as $item): ?>

                    <div class="col-xs-4">
                        <h3>
                            <a href="#<?php echo $item->slug; ?>">
                                <?php echo $item->name; ?>
                            </a>
                        </h3>
                    </div>

                <?php endforeach; ?>


            </div>
        </div>
    </div>
</div><!-- lista-cat-concierge -->
