<?php get_header(); ?>





<section class="welcome_section">
    <div class="container">
        <div class="welcome_text">
            <h1><?php single_term_title(); ?></h1>
        </div>
    </div>
</section>


<?php get_template_part('partials/breadcrumbs'); ?>

<section class="section_faq">
    <div class="container">


        <?php if (have_posts()) : ?>

            <div class="questions_container">
                <?php while (have_posts()) : the_post(); ?>
                    <?php $question_id = 'question_' . get_the_ID(); ?>
                    <?php global $post;
                    $question_slug =  $post->post_name; ?>
                    <div class="single_question" id="<?php echo $question_slug; ?>">
                        <h2 class="single_question_title" data-question="#<?php echo $question_slug; ?>">
                            <a class="single_question_link" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="single_question_content">
                            <?php the_content(); ?>
                        </div>

                    </div>

                <?php endwhile; ?>
            </div><!--  end of questions_container -->
        <?php else : ?>
        <?php endif; ?>
    </div>
</section>




<?php get_footer(); ?>