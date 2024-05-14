<?php get_header(); ?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>




        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <section class="welcome_section">
                <div class="container">
                    <div class="welcome_text">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            </section>

            <!-- section -->
            <section>
                <div class="container">


                    <div class="row">

                        <div class="col-sm-8">

                            <div class="blog_with_date">

                                <div class="blog_content">



                                    <?php if (has_post_thumbnail()) : // Check if Thumbnail exists 
                                        the_post_thumbnail(); // Fullsize image for the single post 
                                    endif; ?>




                                    <?php the_content(); // Dynamic Content 
                                    ?>


                                    <?php generate_social_links(get_the_permalink(), get_the_title()); ?>

                                    <!--
									<div class="comment_form">
										<?php // comments_template(); 
                                        ?>
									</div>
									-->

                                </div>


                            </div>




                        </div>
                        <div class="col-sm-4">




                        </div>

                    </div>



                </div>
            </section>
            <!-- /section -->
        </article>
        <!-- /article -->

    <?php endwhile; ?>

<?php else : ?>

    <!-- article -->
    <article>
        <div class="container">
            <h1><?php _e('Sorry, nothing to display.', 'webfactor'); ?></h1>

        </div>

    </article>
    <!-- /article -->

<?php endif; ?>



<?php get_footer(); ?>