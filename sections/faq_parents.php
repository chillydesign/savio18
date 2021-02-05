<?php $site_url = site_url(); ?>
<?php $question_categories = get_terms('question_parents_cat'); ?>

<section class="section_faq">

    <div class="container">

        <?php foreach ($question_categories as $question_category) : ?>

            <h2> <?php echo $question_category->name; ?></h2>
            <div class="questions_container">
                <?php $questions = get_posts(array(
                    'post_type' => 'question_parent',
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                    'orderby' => 'menu_order',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'question_parent_cat',
                            'field' => 'slug',
                            'terms' => $question_category->slug
                        )
                    )
                )); ?>

                <?php foreach ($questions as $question) :;  ?>
                    <div class="single_question" id="question_<?php echo $question->ID; ?>">
                        <h2 class="single_question_title" data-question="#question_<?php echo $question->ID; ?>">
                            <a class="single_question_link" href="<?php echo $quesion->guid; ?>">
                                <?php echo $question->post_title; ?>
                            </a>
                        </h2>
                        <div class="single_question_content">

                            <?php echo $question->post_content; ?>
                        </div>

                    </div>

                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>


            </div><!--  end of questions_container -->
        <?php endforeach; ?>

    </div>
</section>