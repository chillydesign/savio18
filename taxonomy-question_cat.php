<?php get_header(); ?>



<section >


    <section id="welcome_section">
        <div class="container">
            <div class="welcome_text">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </section>


    <div class="container">
        <?php if (have_posts()): ?>

            <div class="questions_container">
                <?php while (have_posts()) : the_post(); ?>
                    <?php $question_id = get_the_ID(); ?>
                    <div class="single_question" id="question_<?php echo $question_id; ?>">
                        <h2 class="single_question_title" data-question="#question_<?php echo $question_id; ?>">
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
        <?php else: ?>
        <?php endif; ?>
    </div>
</section>




<?php get_footer(); ?>
