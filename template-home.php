<?php /* Template Name: Home Page Template */ get_header(); ?>

<?php $tdu =  get_template_directory_uri(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


        <?php $welcome_paragraph = get_field('welcome_paragraph'); ?>
        <?php $launch_date = get_field('launch_date'); ?>
        <?php $newsflash = get_field('newsflash'); ?>
        <?php $top_testimonial = get_field('top_testimonial'); ?>

        <?php $news_slider = get_field('news_slider'); ?>
        <?php $pre_newsletter_paragraph = get_field('pre_newsletter_paragraph'); ?>
        <?php $newsletter_text = get_field('newsletter_text'); ?>
        <?php $info_paragraph = get_field('info_paragraph'); ?>
        <?php $image_child1 = get_field('image_child1')['url']; ?>
        <?php $what_savio_paragraph = get_field('what_savio_paragraph'); ?>
        <?php $what_savio_gallery = get_field('what_savio_gallery'); ?>
        <?php $features = get_field('features'); ?>
        <?php $for_parents_paragraph_1 = get_field('for_parents_paragraph_1'); ?>
        <?php $image_parents1 = get_field('image_parents1')['url']; ?>
        <?php $for_parents_paragraph_2 = get_field('for_parents_paragraph_2'); ?>
        <?php $image_parents2 = get_field('image_parents2')['url']; ?>
        <?php $interactive_paragraph = get_field('interactive_paragraph'); ?>
        <?php $interactive_gallery = get_field('interactive_gallery'); ?>
        <?php $for_tutors_paragraph = get_field('for_tutors_paragraph'); ?>
        <?php $image_enseignants2 = get_field('image_enseignants2')['url']; ?>
        <?php $tutor2 = get_field('tutors2'); ?>
        <?php $image_enseignants3 = get_field('image_enseignants3')['url']; ?>
        <?php $follow_header = get_field('follow_header'); ?>
        <?php $follow_paragraph = get_field('follow_paragraph'); ?>
        <?php $newsletter_text_footer = get_field('newsletter_text_footer'); ?>

        <?php $testing = isset($_GET['testing']); ?>
        <!-- article -->
        <article id="post-<?php the_ID(); ?>">

            <section class="welcome_section">
                <div class="container" style="position:relative;">
                    <div class="welcome_text">
                        <?php echo $welcome_paragraph; ?>
                    </div>
                </div>
            </section>
            <?php if ($newsflash) : ?>
                <section class="section section_announcement">



                    <div class="container">
                        <h5><?php echo $newsflash; ?></h5>
                    </div>

                    <div class="testlink">
                        <a target="_blank" href="https://app.savio.fr/test-de-niveau" class="freetest_opener">
                            <img src="<?php echo $tdu; ?>/images/Savio-test-gratuit-coupe.png" alt="Testez votre niveau gratuitement!" />
                        </a>
                    </div>


                </section>
            <?php endif; ?>


            <?php if ($top_testimonial) : ?>
                <section id="top_testimonial">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6"><?php echo $top_testimonial; ?></div>
                            <div class="col-sm-6">
                                <div class="videocontainer">

                                    <div id="video_iframe">
                                        <img src="<?php echo $tdu; ?>/images/youtube_preview.jpg" alt="Youtube preview">
                                        <div id="youtube_player"></div>
                                        <p class="spinner"></p>
                                    </div>
                                    <script>
                                        const iframe_url = "https://www.youtube-nocookie.com/embed/sWtVLDZWqX0?modestbranding=1&showinfo=0&rel=0&color=white";
                                        const video_id = "sWtVLDZWqX0";
                                    </script>



                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            <?php endif; ?>

            <?php if ($news_slider) : ?>
                <section id="countdown_section">
                    <div class="container">
                        <div class="what_is_savio_slider">
                            <?php foreach ($news_slider as $slide) : ?>
                                <div class="what_is_savio_flex">
                                    <div class="what_is_savio_text">
                                        <?php echo $slide['content']; ?>
                                    </div>
                                    <!-- <div class="what_is_savio_slider_container"> -->
                                    <!-- <div><img src="<?php echo $slide['image']['url']; ?>" alt="" /></div> -->
                                    <div class="testlink">
                                        <a target="_blank" href="https://app.savio.fr/test-de-niveau" class="freetest_opener">
                                            <img src="<?php echo $tdu; ?>/images/macaron-savio2.png" alt="Testez votre niveau gratuitement!" />
                                        </a>
                                    </div>

                                    <!-- </div> -->
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif;  // if news_slider
            ?>




            <?php if (false) : ?>
                <?php $date_paragraph = get_field('date_paragraph'); ?>
                <section id="countdown_section">

                    <!-- <ol id="saviocountdown">
                <li><span id="span_jours">0</span> jours</li>
                <li><span id="span_heures">0</span> heures</li>
                <li><span id="span_minutes">0</span> minutes</li>
                <li><span id="span_secondes">0</span> secondes</li>
            </ol> -->

                    <div class="countdown_text">
                        <?php echo $date_paragraph; ?>
                    </div>
                </section>
                <!-- <section id="newsletter_signup">
                <div class="container">

                <div class="newsletter_signup flipped">
                  <img src="https://savio.fr/wp-content/uploads/2019/01/small_picture.png" alt="">
                  <div class="newsletter_signup_text">
                  <?php //echo $pre_newsletter_paragraph ;
                    ?>
                <?php //get_template_part( 'partials/mailchimp_signup_form' );
                ?>
                <div class="newsletter_promise"><?php echo $newsletter_text; ?></div>
              </div>
            </div>
            </div>

        </section> -->
            <?php endif; // if date_paragraph  and if false
            ?>



            <section id="info_section">
                <div class="container">
                    <div class="info_flex">
                        <!-- <img src="<?php echo $tdu; ?>/images/girl-knight.png" alt="" /> -->
                        <img src="<?php echo $image_child1; ?>" alt="" />
                        <div class="info_text">
                            <?php echo $info_paragraph; ?>
                            <a href="" class="hidden button">Inscrivez votre enfant</a>
                        </div>
                    </div>
                    <hr>
                    <div class="what_is_savio_flex">
                        <div class="what_is_savio_text">
                            <?php echo $what_savio_paragraph; ?>
                        </div>
                        <div class="what_is_savio_slider_container">
                            <div class="what_is_savio_slider">
                                <?php foreach ($what_savio_gallery as $image) : ?>
                                    <div><img src="<?php echo $image['url']; ?>" alt="" /></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <!-- <section id="what_is_savio">
            <div class="container">



            </div>
        </section> -->

            <section id="features">
                <div class="container">
                    <div class="features_container">

                        <?php foreach ($features as $feature) : ?>
                            <?php $image = $feature['image']['url']; ?>
                            <div class="feature_box">
                                <div class="feature_logo" style="background-image:url(<?php echo $image; ?>)"></div>
                                <h3><?php echo $feature['header']; ?></h3>
                                <?php echo $feature['paragraph']; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>


            <section id="for_parents">
                <div class="container">
                    <div class="for_parent_flex flipped">
                        <!-- <img src="<?php echo $tdu; ?>/images/beach-chair.png" alt="" /> -->
                        <img src="<?php echo $image_parents1; ?>" alt="" />
                        <div class="for_parent_text">
                            <?php echo $for_parents_paragraph_1; ?>
                        </div>
                    </div>
                    <hr />
                    <div class="for_parent_flex ">
                        <!-- <img src="<?php echo $tdu; ?>/images/hotairballoon.png" alt="" /> -->
                        <img src="<?php echo $image_parents2; ?>" alt="" />
                        <div class="for_parent_text">
                            <?php echo $for_parents_paragraph_2; ?>
                        </div>
                    </div>
                </div>

            </section>

            <section id="interactive">
                <div class="container">

                    <div class="interactive_flex">

                        <div class="interactive_slider_container">
                            <div class="interactive_slider">
                                <?php foreach ($interactive_gallery as $image) : ?>
                                    <div><img src="<?php echo $image['url']; ?>" alt="" /></div>
                                <?php endforeach; ?>
                            </div>
                        </div>


                        <div class="interactive_text">
                            <?php echo $interactive_paragraph; ?>
                        </div>
                    </div>

                    <hr>

                    <div class="for_parent_flex">
                        <div class="for_tutors_text">
                            <?php echo $for_tutors_paragraph; ?>
                            <a href="" class="hidden button">Inscrivez votre enfant</a>
                        </div>
                        <!-- <img src="<?php echo $tdu; ?>/images/girl-knight.png" alt="" /> -->
                        <img src="<?php echo $image_enseignants2; ?>" alt="" />
                    </div>

                    <hr>

                    <div class="info_flex">
                        <!-- <img src="<?php echo $tdu; ?>/images/girl-knight.png" alt="" /> -->
                        <img src="<?php echo $image_enseignants3; ?>" alt="" />
                        <div class="info_text">
                            <?php echo $tutor2; ?>
                            <a href="" class="hidden button">Inscrivez votre enfant</a>
                        </div>
                    </div>

                </div>
            </section>


            <!-- <section id="for_tutors_section">
            <div class="container">

            </div>
        </section> -->




            <?php $testimonials =  false; //get_posts(array('post_type'  => 'testimonial', 'posts_per_page' => 15)); 
            ?>
            <?php if ($testimonials) : ?>
                <div class="testimonial_slider">
                    <?php foreach ($testimonials as $testimonial) : ?>
                        <div class="testimonial">
                            <blockquote>
                                <p><?php echo $testimonial->post_content; ?></p>
                            </blockquote>
                            <cite><?php echo $testimonial->post_title; ?></cite>
                        </div>
                    <?php endforeach;  ?>
                </div>
            <?php endif; ?>

            <section id="testimonials">
                <div class="container">
                    <div class="testimonials_flex">
                        <img src="<?php echo $tdu; ?>/images/quote.png" alt="" />
                        <div class="testimonials_container">
                            <h2>Ce qu’ils en disent</h2>
                            <?php echo do_shortcode('[brb_collection id="773"]'); ?>
                        </div><!--  END OF testimonials_container -->
                    </div><!--  END OF testimonials_flex -->
                </div>
            </section>

            <?php get_template_part('sections/newsletter_signup'); ?>




        </article>
        <!-- /article -->


        <?php if ($launch_date) : ?>
            <script>
                var launch_date = new Date('<?php echo $launch_date; ?> 12:00:00');
            </script>
        <?php endif; ?>


    <?php endwhile; ?>

<?php else : ?>

    <!-- article -->
    <article class="container">

        <h2><?php _e('Sorry, nothing to display.', 'webfactor'); ?></h2>

    </article>
    <!-- /article -->

<?php endif; ?>






<?php get_footer(); ?>