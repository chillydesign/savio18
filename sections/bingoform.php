<?php $content =  get_sub_field('content'); ?>
<?php $image =  get_sub_field('image'); ?>
<?php $img_src  = ($image)  ? $image['sizes']['large'] : ''; ?>
<section class="bingo_section">
    <div id="bingo_popup">
        <div id="bingo_popup_inner">

            <div class="container-fluid">

                <div class="col-sm-6">
                    <?php if ($content) : ?>
                        <?php echo $content; ?>
                    <?php endif; ?>

                    <? php //  echo do_shortcode('[bingo_form]'); 
                    ?>
                </div>
                <div class="col-sm-6">
                    <img class="side_image" src="<?php echo $img_src; ?>">
                </div>
            </div>


        </div>
        <div id="close_bingo_popup">X</div>
    </div>
</section>