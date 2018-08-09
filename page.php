<?php get_header(); ?>





<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <!-- article -->
    <article id="post-<?php the_ID(); ?>" >

        <?php $background = ( has_post_thumbnail() ) ? thumbnail_of_post_url( get_the_ID(), 'large' ) : false; ?>
        <section id="welcome_section" <?php if ($background ): ?> style="background-image:url('<?php echo $background; ?>')";  <?php endif; ?> >
            <div class="container">
                <div class="welcome_text">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </section>


        <?php include('section-loop.php'); ?>

<!--
        <section>
            <div class="container">
                <?php //the_content(); ?>
            </div>
        </section> -->



    </article>
    <!-- /article -->

<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article class="container">

        <h2><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h2>

    </article>
    <!-- /article -->

<?php endif; ?>






<?php get_footer(); ?>
