<?php $image = thumbnail_of_post_url(get_the_ID(), 'medium'); ?>
<?php $date = get_field('date', get_the_ID()); ?>

<div class="horizontal_blog_post">
    <div class="horizontal_blog_post_image" style="background-image:url(<?php echo $image; ?>)"></div>
    <div class="horizontal_blog_post_text">
        <div class="horizontal_blog_post_text_inner">
            <h4>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php if ($date) : ?>
                        <?php echo short_date_of($date); ?>:
                    <?php endif; ?>
                    <?php the_title(); ?>
                </a>
            </h4>
            <hr>
            <?php html5wp_excerpt(20, false); // Build your custom callback length in functions.php 
            ?>
        </div>
        <a class="button" href="<?php the_permalink(); ?>">Lire plus</a>
    </div>
</div>

<div class="cool_orange_bar"></div>