<?php $text = get_sub_field('text'); ?>
<?php $image = get_sub_field('image'); ?>
<?php $img_src  = ($image)  ? $image['sizes']['large'] : ''; ?>

<section class="welcome_section" style="background-image:url(<?php echo $img_src; ?>)">
    <div class="container" style="position:relative;">
        <div class="welcome_text">
            <?php echo $text; ?>
        </div>
    </div>

</section>