<?php

$type_post =  get_sub_field('type_post');
$args = array(
    'post_type' => 'post',
    'meta_key' => 'post_type',
    'meta_value' =>   $type_post,
    'posts_per_page' => 12,
    'paged' => get_query_var('paged')
);
query_posts($args);

?>

<section class="news_section">
    <div class="container">
        <div class="news_container">
            <?php get_template_part('loop'); ?>
        </div>
        <?php get_template_part('pagination'); ?>


    </div>

</section>

<?php wp_reset_query(); ?>