<?php $text = get_sub_field('text'); ?>
<?php $image = get_sub_field('image'); ?>
<?php $img_src  = ($image)  ? $image['sizes']['large'] : ''; ?>
<?php $image_position = get_sub_field('image_position'); ?>
<?php $bg_src = '';
$side_src = '';
$fc_class = 'col-sm-12';
$ws_class = ''; ?>
<?php if ($image_position == 'background') {
    $bg_src = $img_src;
} else if ($image_position == 'side') {
    $ws_class = 'blue';
    $side_src = $img_src;
    if ($image) {
        $fc_class = 'col-sm-8';
    }
}

?>

<section class="welcome_section <?php echo $ws_class; ?>" style="background-image:url(<?php echo $bg_src; ?>)">
    <div class="container" style="position:relative;">

        <div class="<?php echo $fc_class; ?>">
            <div class="welcome_text ">
                <?php echo $text; ?>
            </div>
        </div>
        <?php if ($side_src) : ?>
            <div class="col-sm-4">
                <img class="side_image" src="<?php echo $side_src; ?>">
            </div>
        <?php endif; ?>

    </div>


</section>