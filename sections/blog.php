<?php

$type_post =  get_sub_field('type_post');
$args = array(
    'post_type' => 'post',

    'posts_per_page' => 12,
    'paged' => get_query_var('paged')
);
$the_query = new WP_Query($args);



// 'meta_query' => array(
//     array(
//         'key'     => 'post_type',
//         'value'   =>  $type_post,
//         'compare' => '=',
//     ),
// ),
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

    </div>

</section>
<?php wp_reset_postdata(); ?>