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

        <?php $background_image = ( has_post_thumbnail() ) ? thumbnail_of_post_url( get_the_ID(), 'large' ) : ''; ?>

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

                        <!--End mc_embed_signup-->
                        <form action="https://savio.us18.list-manage.com/subscribe/post?u=9c83ec87618595ab02b9b6bc0&amp;id=9961b629c9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate signup_form" target="_blank" novalidate>
                            <input type="text" value="" name="LNAME" class="" id="mce-LNAME" placeholder="Nom" />
                            <input type="email" value="" name="EMAIL" class="required email"  id="mce-EMAIL" placeholder="Email" />
                            <select name="MMERGE1" class="" id="mce-MMERGE1">
                                <option value="">Je suis</option>
                                <option value="Parent">Parent</option>
                                <option value="Enseignant / Tuteur">Enseignant / Tuteur</option>
                                <option value="Ecole">Ecole</option>
                            </select>
                            <input type="submit" value="Envoyer" name="subscribe" id="mc-embedded-subscribe" class="button">
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_9c83ec87618595ab02b9b6bc0_9961b629c9" tabindex="-1" value=""></div>
                        </form>
                        <!--End mc_embed_signup-->
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
                                    <div><img src="images/screen1.png" alt="" /></div>
                                    <div><img src="images/screen2.png" alt="" /></div>
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


                <section id="testimonials">

                    <div class="container">
                        <div class="testimonials_flex">
                            <img src="images/quote.png" alt="" />
                            <div class="testimonials_container">
                                <h2>Ce qu’ils en disent</h2>
                                <div class="testimonial">
                                    <blockquote>
                                        <p>La qualité du site m'a paru excellente avec en prime un joli graphisme. J'ai trouvé les explications très claires, j'ai bien aimé la possibilité des dictées sur le clavier et beaucoup apprécié l'introduction des poésies. </p>
                                        <p>Les enfants se sont immédiatement et facilement approprié l'outil et ont tout de suite "accroché" au système d'achat d'accessoires. Ils ont été très sensibles à la possibilité de gagner des trophées. Bref ils étaient ravis...et moi aussi car ils ont pu travailler seuls!</p>
                                    </blockquote>
                                    <cite>Isabelle, mère de 5 enfants, Paris</cite>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>



                <section id="follow_savio">

                    <div class="container">
                        <div class="follow_savio_flex">

                            <div class="follow_savio_text">
                                <h2><?php echo $follow_header; ?></h2>
                                <p><?php echo $follow_paragraph; ?></p>

                                <!--End mc_embed_signup-->
                                <form action="https://savio.us18.list-manage.com/subscribe/post?u=9c83ec87618595ab02b9b6bc0&amp;id=9961b629c9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate signup_form" target="_blank" novalidate>
                                    <input type="text" value="" name="LNAME" class="" id="mce-LNAME" placeholder="Nom" />
                                    <input type="email" value="" name="EMAIL" class="required email"  id="mce-EMAIL" placeholder="Email" />
                                    <select name="MMERGE1" class="" id="mce-MMERGE1">
                                        <option value="">Je suis</option>
                                        <option value="Parent">Parent</option>
                                        <option value="Enseignant / Tuteur">Enseignant / Tuteur</option>
                                        <option value="Ecole">Ecole</option>
                                    </select>
                                    <input type="submit" value="Envoyer" name="subscribe" id="mc-embedded-subscribe" class="button">
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_9c83ec87618595ab02b9b6bc0_9961b629c9" tabindex="-1" value=""></div>
                                </form>
                                <!--End mc_embed_signup-->
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

<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article class="container">

        <h2><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h2>

    </article>
    <!-- /article -->

<?php endif; ?>






<?php get_footer(); ?>
