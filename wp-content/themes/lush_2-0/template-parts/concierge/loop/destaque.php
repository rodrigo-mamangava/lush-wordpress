<?php ?>

<?php get_new_vitrine_completo(); ?>

<div class="container faixa-explore-concierge">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <p>
                Bem-vindo ao Lush, um novo conceito de hospedagem Private 
                Urban Resort. Esse concierge digital vai ajudá-lo a 
                aproveitar ao máximo todos os serviços que estão a sua 
                disposição e tornar sua experiência conosco ainda mais 
                especial. Navegue pelos campos abaixo e divirta-se!
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
                        <p>
                            <a href="#<?php echo $item->slug; ?>">
                                <?php echo $item->name; ?>
                            </a>
                        </p>
                    </div>

                <?php endforeach; ?>


            </div>
        </div>
    </div>
</div><!-- lista-cat-concierge -->
