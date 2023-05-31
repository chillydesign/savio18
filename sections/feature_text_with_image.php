<?php $text = get_sub_field('text'); ?>
<?php $image = get_sub_field('image'); ?>
<?php $img_src  = ($image)  ? $image['sizes']['large'] : ''; ?>
<?php $image_position = get_sub_field('image_position'); ?>
<?php $bg_src;
$side_src; ?>
<?php if ($image_position == 'background') {
    $bg_src = $img_src;
} else if ($image_position == 'side') {
    $side_src = $img_src;
}

?>

<section class="welcome_section" style="background-image:url(<?php echo $bg_src; ?>)">
    <div class="container" style="position:relative;">
        <div class="welcome_text">
            <div class="welcome_text_inner">
                <?php echo $text; ?>
            </div>

            <?php if ($side_src) : ?>
                <div class="side_image" style="background-image:url(<?php echo $side_src; ?>)"></div>
            <?php endif; ?>
        </div>
    </div>

</section>