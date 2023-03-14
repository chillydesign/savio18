<?php

$type_post =  get_sub_field('type_post');
$args = array(
    'post_type' => 'post',
    'meta_key' => 'post_type',
    'meta_value' =>   $type_post,
    'posts_per_page' => 1,
    'paged' => get_query_var('paged')
);
$the_query = new WP_Query($args);

?>

<section class="news_section">
    <div class="container">
        <div class="news_container">


            <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php get_template_part('loop_single'); ?>
                <?php endwhile; ?>
            <?php endif; ?>


        </div>
        <div class="pagination">
            <?php html5wp_pagination($the_query); ?>
        </div>

        <?php wp_reset_postdata(); ?>
    </div>

</section>