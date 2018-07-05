<?php /* Template Name: Home Page Template */ get_header(); ?>




<?php if (have_posts()): while (have_posts()) : the_post(); ?>


    <?php $welcome_header = get_field('welcome_header'); ?>
    <?php $welcome_paragraph = get_field('welcome_paragraph'); ?>
    <?php $launch_date = get_field('launch_date'); ?>
    <?php $date_header = get_field('date_header'); ?>
    <?php $date_paragraph = get_field('date_paragraph'); ?>
    <?php $info_header = get_field('info_header'); ?>
    <?php $info_paragraph = get_field('info_paragraph'); ?>
    <?php $what_savio_list = get_field('what_savio_list'); ?>
    <?php $what_savio_gallery = get_field('what_savio_gallery'); ?>
    <?php $for_parents_header_1 = get_field('for_parents_header_1'); ?>
    <?php $for_parents_paragraph_1 = get_field('for_parents_paragraph_1'); ?>
    <?php $for_parents_header_2 = get_field('for_parents_header_2'); ?>
    <?php $for_parents_paragraph_2 = get_field('for_parents_paragraph_2'); ?>
    <?php $interactive_header = get_field('interactive_header'); ?>
    <?php $interactive_paragraph = get_field('interactive_paragraph'); ?>
    <?php $features = get_field('features'); ?>
    <?php $follow_header = get_field('follow_header'); ?>
    <?php $follow_paragraph = get_field('follow_paragraph'); ?>


    <!-- article -->
    <article id="post-<?php the_ID(); ?>" >

        <section id="welcome_section">
            <div class="container">
                <div class="welcome_text">
                    <h1><?php echo $welcome_header; ?></h1>
                    <p><?php echo $welcome_paragraph; ?></p>
                    <a href="#countdown_section" class="button fancy_button scroll_link">S’inscrire</a>
                </div>
            </div>
        </section>

        <section id="countdown_section">

            <ol id="saviocountdown">
                <li><span id="span_jours">0</span> jours</li>
                <li><span id="span_heures">0</span> heures</li>
                <li><span id="span_minutes">0</span> minutes</li>
                <li><span id="span_secondes">0</span> secondes</li>
            </ol>

            <div class="countdown_text">
                <h2><?php echo $date_header; ?></h2>
                <p><?php echo $date_paragraph; ?></p>
                <?php get_template_part( 'partials/mailchimp_signup_form' ); ?>

            </div>
        </section>


        <section id="info_section">
            <div class="container">
                <div class="info_flex">
                    <img src="images/girl-knight.png" alt="" />
                    <div class="info_text">
                        <h2><?php echo $info_header; ?></h2>
                        <p><?php echo $info_paragraph; ?></p>
                        <a  href="" class="hidden button">Inscrivez votre enfant</a>
                    </div>
                </div>
            </div>
        </section>


        <section id="what_is_savio">
            <div class="container">

                <div class="what_is_savio_flex">
                    <dl>
                        <?php foreach ($what_savio_list as $what_item) : ?>
                            <dt><?php echo $what_item['item_header']; ?></dt>
                            <dd><?php echo $what_item['item_paragraph']; ?></dd>
                        <?php endforeach; ?>
                    </dl>

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



        <section id="for_parents">
            <div class="container">
                <div class="for_parent_flex flipped">
                    <img src="images/beach-chair.png" alt="" />
                    <div class="for_parent_text">
                        <h2><?php echo $for_parents_header_1; ?></h2>
                        <p><?php echo $for_parents_paragraph_1; ?></p>
                    </div>
                </div>
                <hr />
                <div class="for_parent_flex ">
                    <img src="images/hotairballoon.png" alt="" />
                    <div class="for_parent_text">
                        <h2><?php echo $for_parents_header_2; ?></h2>
                        <p><?php echo $for_parents_paragraph_2; ?></p>
                    </div>
                </div>
            </div>

        </section>

        <section id="interactive">
            <div class="container">

                <div class="interactive_flex">

                    <div class="interactive_slider_container">
                        <div class="interactive_slider">
                            <div><img src="images/screen1.png" alt="" /></div>
                            <div><img src="images/screen2.png" alt="" /></div>
                        </div>
                    </div>
                    <div class="interactive_text">
                        <h2><?php echo $interactive_header; ?></h2>
                        <p><?php echo $interactive_paragraph; ?></p>
                    </div>
                </div>

            </div>
        </section>


        <section id="features">

            <div class="container">

                <div class="features_container">

                    <?php foreach ($features as $feature) : ?>
                        <div class="feature_box">
                            <div class="feature_logo feature_logo_clock"></div>
                            <h3><?php echo $feature['header']; ?></h3>
                            <p><?php echo $feature['paragraph']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

                <a href="#follow_savio" class="button  scroll_link">Inscription en tant qu’école ou enseignant</a>


            </div>
        </section>



        <?php $testimonials = get_posts(array( 'post_type'  => 'testimonial', 'posts_per_page' => 3 )); ?>

        <?php if ($testimonials) : ?>
            <section id="testimonials">
                <div class="container">
                    <div class="testimonials_flex">
                        <img src="images/quote.png" alt="" />
                        <div class="testimonials_container">
                            <h2>Ce qu’ils en disent</h2>
                            <div class="testimonial_slider">
                                <?php foreach ($testimonials as $testimonial) : ?>
                                    <div class="testimonial">
                                        <blockquote>
                                            <p><?php echo $testimonial->post_content; ?></p>
                                        </blockquote>
                                        <cite><?php echo $testimonial->post_title; ?></cite>
                                    </div>
                                <?php endforeach;  // end of testimonials loop ?>
                            </div><!--  END OF testimonial_slider -->
                        </div><!--  END OF testimonials_container -->
                    </div><!--  END OF testimonials_flex -->
                </div>
            </section>
        <?php endif; ?>



        <section id="follow_savio">

            <div class="container">
                <div class="follow_savio_flex">

                    <div class="follow_savio_text">
                        <h2><?php echo $follow_header; ?></h2>
                        <p><?php echo $follow_paragraph; ?></p>
                        <?php get_template_part( 'partials/mailchimp_signup_form' ); ?>
                    </div>

                    <aside class="hidden">

                        <h2>Liens utiles</h2>
                        <ul>
                            <li><a href="">A propos</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">S’inscrire</a></li>
                        </ul>

                    </aside>


                </div>
            </div>
        </section>



    </article>
    <!-- /article -->


    <?php if ($launch_date) : ?>
        <script>
        var launch_date =  new Date('<?php echo $launch_date; ?> 12:00:00');
        </script>
    <?php endif; ?>


<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article class="container">

        <h2><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h2>

    </article>
    <!-- /article -->

<?php endif; ?>






<?php get_footer(); ?>
