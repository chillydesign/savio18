<?php $site_url = site_url(); ?>




<section class="section section_press">

    <div class="container">
        <?php if(get_sub_field('title')) : ?><h2><?php the_sub_field('title'); ?></h2><?php endif; ?>

    <div class="press_items">
    <?php while ( have_rows('press_item') ) : the_row(); ?>

        <div class="press_item">
            <?php $cover_image =  get_sub_field('cover_image'); ?>
            <?php $gallery =  get_sub_field('gallery'); ?>
            <?php $link =  get_sub_field('link'); ?>

            <img class="cover_image" src="<?php echo $cover_image['sizes']['medium']; ?>" alt="Cover Image" />


            <div class="gallery_container">
              <a href="<?php echo $cover_image['sizes']['large']; ?>"><img class="pres_img" src="<?php echo $cover_image['sizes']['medium']; ?>" alt="Cover Image" /></a>
            <?php foreach ($gallery as $image) : ?>
                <a href="<?php echo $image['sizes']['large']; ?>"><img class="pres_img" src="<?php echo $image['sizes']['medium']; ?>" alt="" /></a>

            <?php endforeach; ?>
            </div>
            <?php if ($link): ?>
            <div class="link_container">
            <?php echo $link; ?>
            </div>
            <?php endif; ?>

        </div>   <!--  end of press item -->


    <?php endwhile; ?>
    </div>   <!--  end of press items -->

    </div>
</section>
