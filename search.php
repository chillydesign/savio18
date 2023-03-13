<?php get_header(); ?>





<section class="welcome_section">
    <div class="container">
        <div class="welcome_text">
            <h1><?php echo sprintf(__('%s Search Results for ', 'webfactor'), $wp_query->found_posts);
                echo get_search_query(); ?></h1>
        </div>
    </div>
</section>



<section>
    <div class="container">
        <?php get_template_part('loop'); ?>

        <?php get_template_part('pagination'); ?>
    </div>
</section>



<?php get_footer(); ?>