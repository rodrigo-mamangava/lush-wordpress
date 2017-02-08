<?php ?>

<?php
$terms = get_terms(array(
    'taxonomy' => 'cat-menu',
    'orderby' => 'name',
    'hide_empty' => false,
        ));
?>

<div class="container lista-cat-menu">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <ul>
                <?php foreach ($terms as $item): ?>
                    <li>
                        <a href="#<?php echo $item->slug; ?>">
                            <?php echo $item->name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div><!-- lista-cat-concierge -->





