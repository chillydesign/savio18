<?php

$args = array(
    'post_type' => 'post',
    'meta_query' => array(
        array(
            'key'     => 'post_type',
            'value'   =>  'post',
            'compare' => '=',
        ),
    ),
    'posts_per_page' => 12,
    'paged' => get_query_var('paged')
);
$the_query = new WP_Query($args);

$s = new DateTime('today');
$today = $s->format('Ymd');
$event_args = array(
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            array(
                'key'     => 'date',
                'value'   =>  $today,
                'compare' => '>=',
            ),
            array(
                'key'     => 'post_type',
                'value'   =>  'event',
                'compare' => '=',
            )
        ),
    ),
    'posts_per_page' => -1,
    'paged' => get_query_var('paged')
);
$events_query = new WP_Query($event_args);
$has_events = $events_query->have_posts();
$show_sidebar = false;
?>

<section class="news_section">
    <div class="container">


        <?php if ($has_events || $show_sidebar) :
            echo ' <div class="row"><div class="col-sm-8">';
        endif; ?>
        <div class="news_container ">

            <div class="row">

                <?php $post_number = 0; ?>
                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <div class="col-sm-4">
                            <article class="single_article_loop2 <?php if ($post_number % 2 == 1) {
                                                                        echo "odd";
                                                                    } ?>">
                                <?php get_template_part('loop_single2'); ?>
                                <?php $post_number++;  ?>
                            </article>
                        </div>


                        <?php if ($post_number % 3 == 0) : ?>
            </div>
            <div class="row">
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
            </div>


        </div>
        <div class="pagination">
            <?php html5wp_pagination($the_query); ?>
        </div>


        <?php if ($has_events || $show_sidebar) :
            echo '  </div>  <div class="col-sm-4">';
        endif; ?>


        <?php if ($show_sidebar) :
            get_sidebar();
        endif; ?>




        <?php if ($has_events) : ?>
            <div id="events_container">
                <h3>Agenda</h3>
                <?php if ($events_query->have_posts()) : while ($events_query->have_posts()) : $events_query->the_post(); ?>
                        <?php get_template_part('loop_single'); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <div class="cool_orange_bar"></div>

            </div>
        <?php endif; ?>

        <?php if ($has_events || $show_sidebar) :
            echo '  </div>  </div>';
        endif; ?>
    </div>


</section>
<?php wp_reset_postdata(); ?>