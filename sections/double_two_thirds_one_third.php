<?php $background =  get_sub_field('background'); ?>


<section class="section  section_double_two_thirds_one_third <?php echo $background; ?>  <?php if (get_sub_field('increase_pad')) {
                                                                                                echo 'increase_pad';
                                                                                            } ?>">
    <?php $order = get_sub_field('order'); ?>
    <?php $text1 = get_sub_field('text1'); ?>
    <?php $image1 = get_sub_field('image'); ?>
    <?php $link1 = get_sub_field('link1'); ?>
    <?php $text2 = get_sub_field('text2'); ?>
    <?php $image2 = get_sub_field('image2'); ?>
    <?php $link2 = get_sub_field('link2'); ?>

    <?php $swapped = get_sub_field('swapped') ?>
    <?php $swapped_1 = $swapped ?  '' : 'flipped'; ?>
    <?php $swapped_2 = $swapped ?  'flipped' : ''; ?>

    <div class="container">
        <div class="unequalcols <?php echo $swapped_1; ?>">

            <?php if ($link1) : ?>
                <a href="<?php echo $link1; ?>" target="_blank">
                <?php endif; ?>
                <img src="<?php echo $image1['sizes']['medium']; ?>" alt="" />
                <?php if ($link1) : ?>
                </a>
            <?php endif; ?>
            <div class="unequalcols_text">
                <?php echo $text1; ?>
            </div>
        </div>
        <hr />
        <div class="unequalcols <?php echo $swapped_2; ?>">

            <?php if ($link1) : ?>
                <a href="<?php echo $link1; ?>" target="_blank">
                <?php endif; ?>
                <img src="<?php echo $image2['sizes']['medium']; ?>" alt="" />

                <?php if ($link1) : ?>
                </a>
            <?php endif; ?>


            <div class="unequalcols_text">
                <?php echo $text2; ?>
            </div>
        </div>
    </div>
</section>