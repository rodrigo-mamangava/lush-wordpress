<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<?php
$category = get_term_by('slug', 'pacote', 'product_cat');

$term_id = $category->term_id;
$taxonomy_name = 'product_cat';
//$term_children = get_term_children($term_id, $taxonomy_name);
$term_children = get_terms( $taxonomy_name, array( 'child_of' => $term_id,'hide_empty' => false, ) );



foreach ($term_children as $pacote_cat) {

    $sub_pacote = get_term_by('id', $pacote_cat->term_id, 'product_cat');
    $term_img_src = get_term_img($sub_pacote->term_id);
    ?>
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-center">
            <div class="sessao-subcat" >  

                <?php wp_get_attachment_image($sub_pacote->id, 'thumbnail') ?>
                <img src="<?php echo $term_img_src; ?>">
                <h2><?php echo $sub_pacote->name; ?></h2>

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                        <p class="subcat-desc"><?php _e($sub_pacote->description); ?></p>                        
                    </div>
                </div>


                <?php
                $args = array(
                    'posts_per_page' => '999',
                    'post_type' => 'product',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'term_id',
                            'terms' => $pacote_cat->term_id,
                            'operator' => 'IN'
                        )
                    )
                );


                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    ?><div class="row"> <?php
                    while ($the_query->have_posts()) : $the_query->the_post();

                        get_template_part('template-parts/experiencia/pacote/item');
                    endwhile;
                    ?></div> <?php
                endif;
                wp_reset_postdata();
                ?>

                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">

                        <p class="subcat-desc-extra">
                            <?php echo get_field('desc_extra', $sub_pacote); ?>
                        </p>                        
                    </div>
                </div>



            </div><!-- .sessao-subcat -->         
        </div>
    </div>
    <?php
}





