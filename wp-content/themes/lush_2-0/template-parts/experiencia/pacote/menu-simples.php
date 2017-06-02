<?php
$category = get_term_by('slug', 'pacote', 'product_cat');
$term_id = $category->term_id;
$taxonomy_name = 'product_cat';
$terms = get_terms($taxonomy_name, array('child_of' => $term_id, 'hide_empty' => false,));
?>

<div class="container lista-cat-exp">
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
