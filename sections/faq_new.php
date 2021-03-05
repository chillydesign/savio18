<?php $site_url = site_url(); ?>
<?php $type= get_sub_field('type'); ?>
<?php $question_categories = get_terms('question_parents_cat'); ?>

<section class="section_faq">

    <div class="container">

        <?php foreach ($question_categories as $question_category) : ?>

            <h2> <?php echo $question_category->name; ?></h2>
            <div class="questions_container">

              <?php if ($type== 'parent'): ?>
                <?php $questions = get_posts(array(
                    'post_type' => 'question_parent',
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                    'orderby' => 'menu_order',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'question_parents_cat',
                            'field' => 'slug',
                            'terms' => $question_category->slug
                        )
                    )
                )); ?>

              <?php elseif ($type== 'enseignant'): ?>
                  <?php $questions = get_posts(array(
                      'post_type' => 'question_enseignant',
                      'posts_per_page' => -1,
                      'order' => 'DESC',
                      'orderby' => 'menu_order',
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'question_enseignants_cat',
                              'field' => 'slug',
                              'terms' => $question_category->slug
                          )
                      )
                  )); ?>
                <?php else : ?>
                  <?php $questions = get_posts(array(
                      'post_type' => 'question_ecole',
                      'posts_per_page' => -1,
                      'order' => 'DESC',
                      'orderby' => 'menu_order',
                      'tax_query' => array(
                          array(
                              'taxonomy' => 'question_ecoles_cat',
                              'field' => 'slug',
                              'terms' => $question_category->slug
                          )
                      )
                  )); ?>

                <?php endif; ?>

                <?php foreach ($questions as $question) :;  ?>



                    <div class="single_question" id="question_<?php echo $question->ID; ?>">
                        <h2 class="single_question_title" data-question="#question_<?php echo $question->ID; ?>">
                            <a class="single_question_link" href="<?php echo $question->guid; ?>">
                                <?php echo $question->post_title; ?>
                            </a>
                        </h2>
                        <div class="single_question_content">

                            <?php echo apply_filters('the_content', $question->post_content); ?>
                            <?php $slider = get_field('slider', $question->ID); ?>

                            <?php if ($slider) : ?>
                                <div class="faq_gallery_slider">
                                    <?php foreach ($slider as $image) : ?>
                                        <div>
                                            <a class="slider_gallery" href="<?php echo $image['sizes']['large']; ?>">
                                                <img class="school_logo" src="<?php echo $image['sizes']['medium']; ?>" alt="" />
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>

                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>


            </div><!--  end of questions_container -->
        <?php endforeach; ?>

    </div>
</section>
