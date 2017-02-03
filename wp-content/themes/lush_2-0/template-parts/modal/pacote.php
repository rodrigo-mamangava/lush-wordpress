<?php global $product; ?>
<!-- Modal -->
<div class="modal fade" id="modal<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php the_title('<h4 class="modal-title" id="myModalLabel">', '</h4>'); ?>
            </div>
            <div class="modal-body">
                <?php the_content();?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php _e('Close', 'lush_2-0');?></button>
            </div>
        </div>
    </div>
</div>