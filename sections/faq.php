<?php $site_url = site_url(); ?>
<?php $question_categories = get_terms('question_cat'); ?>

<section>

    <div class="container">

        <div class="questions_container">
            <?php foreach ($question_categories as $question_category) : ?>
                <?php $question_id = $question_category->slug; ?>
                <?php $permalink = $site_url . '/question_cat/' . $question_category->slug; ?>
                <div class="single_question" id="question_<?php echo $question_id; ?>">
                    <h2 class="single_question_title" data-question="#question_<?php echo $question_id; ?>">
                        <a class="single_question_link" href="<?php echo $permalink; ?>">
                            <?php echo $question_category->name; ?>
                        </a>
                    </h2>
                    <div class="single_question_content">
                        <?php $questions = get_posts( array(
                            'post_type' => 'question',
                            'posts_per_page' => -1 ,
                            'order' => 'DESC',
                            'orderby' => 'date',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'question_cat',
                                    'field' => 'slug',
                                    'terms' => $question_category->slug
                                )
                            )
                        )); ?>

                        <ul>


                            <?php foreach ($questions as $question) : ;  ?>
                                <li>
                                    <a href="<?php echo $permalink; ?>#<?php echo $question->post_name; ?>"><?php echo $question->post_title; ?></a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                        <?php wp_reset_postdata();?>

                    </div>

                </div>

            <?php endforeach; ?>
        </div><!--  end of questions_container -->


    </div>
</section>
