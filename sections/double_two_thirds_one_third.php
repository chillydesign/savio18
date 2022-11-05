<?php $background =  get_sub_field('background'); ?>


<section class="section  section_double_two_thirds_one_third <?php echo $background; ?>  <?php if (get_sub_field('increase_pad')) {
                                                                                                echo 'increase_pad';
                                                                                            } ?>">

    <?php $order = get_sub_field('order'); ?>
    <?php $text1 = get_sub_field('text1'); ?>
    <?php $image1 = get_sub_field('image1'); ?>
    <?php $link1 = get_sub_field('link1'); ?>
    <?php $text2 = get_sub_field('text2'); ?>
    <?php $image2 = get_sub_field('image2'); ?>
    <?php $link2 = get_sub_field('link2'); ?>


    <div class="container">
        <div class="unequalcols flipped">
            <!-- <img src="<?php echo $tdu; ?>/images/beach-chair.png" alt="" /> -->
            <img src="<?php echo $image1; ?>" alt="" />
            <div class="unequalcols_text">
                <?php echo $text1; ?>
            </div>
        </div>
        <hr />
        <div class="unequalcols">
            <!-- <img src="<?php echo $tdu; ?>/images/hotairballoon.png" alt="" /> -->
            <img src="<?php echo $image2; ?>" alt="" />
            <div class="unequalcols_text">
                <?php echo $text2; ?>
            </div>
        </div>
    </div>
</section>