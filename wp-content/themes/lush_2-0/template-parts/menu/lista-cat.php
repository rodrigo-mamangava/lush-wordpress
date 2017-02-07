<?php
$categories = get_terms('cat-menu', array('hide_empty' => false));
$menuCat = array();
sort_terms_hierarchicaly($categories, $menuCat);
?>




<?php foreach ($menuCat as $itemMenu): ?>

    <?php
    $slug = $itemMenu->slug;
    $term = get_term_by('slug', $slug, 'cat-menu');
    ?>


    <div class="col-sm-4 col-sm-offset-1 item-cat-menu ">

        <div class="row">
            <div class="col-xs-12">
                <img src="<?php uri(); echo '/img/'.$slug;?>.png">              
                <h2 id="<?php echo $termSlug ?>" ><?php _e($term->name); ?></h2>
            </div>
        </div>

        <div class="row">
            <?php if (count($itemMenu->children) == 0) : ?>
                <?php printMenu($slug); ?>
            <?php else : ?>
                <?php foreach ($itemMenu->children as $filho) : ?>
                    <div  class="col-xs-12">
                        <h3 id="<?php echo $filho->slug ?>" ><?php _e($filho->name); ?></h3>
                        <?php printMenuFilho($filho->slug); ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div><!-- item-cat-menu -->







<?php endforeach; ?>





