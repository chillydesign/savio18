<?php $site_url = site_url(); ?>




<section class="section section_press2">

    <div class="container">
        <?php if (get_sub_field('title')) : ?><h2><?php the_sub_field('title'); ?></h2><?php endif; ?>

        <div class="press_items">
            <?php $post_number = 0; ?>

            <div class="row">
                <?php while (have_rows('press_item')) : the_row(); ?>
                    <div class="col-sm-4">
                        <article class="single_article_loop2 <?php echo ($post_number % 2 == 1) ? 'odd' : ''; ?>">
                            <?php $image =  get_sub_field('logo'); ?>
                            <?php $link =  get_sub_field('link'); ?>
                            <?php $description =  get_sub_field('description'); ?>
                            <?php $title =  get_sub_field('title'); ?>
                            <?php $date =  get_sub_field('date'); ?>
                            <?php $publication =  get_sub_field('publication'); ?>

                            <div class="horizontal_blog_post">
                                <div class="horizontal_blog_post_image image_contain" style="background-image:url(<?php echo $image['url']; ?>)"></div>
                                <div class="horizontal_blog_post_text">
                                    <div class="horizontal_blog_post_text_inner">

                                        <h4>
                                            <a href="<?php echo $link; ?>" target="_blank" title="<?php echo $title; ?>">
                                                <?php echo $title; ?>
                                            </a>
                                        </h4>
                                        <hr>

                                        <?php if ($date || $publication) : ?>
                                            <p class="date">
                                                <?php echo ($date); // short_date_of  
                                                ?>
                                                <?php if ($date && $publication) : ?> | <?php endif; ?>
                                                <?php echo $publication; ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php echo $description; ?>
                                    </div>
                                    <a class="button" target="_blank" href="<?php echo $link; ?>">Lire plus</a>
                                </div>
                            </div>

                            <div class="cool_orange_bar"></div>

                        </article>
                    </div>
                    <?php $post_number++; ?>

                    <?php if ($post_number % 3 == 0) : ?>
            </div><!-- end of row -->
            <div class="row">
            <?php endif; ?>

        <?php endwhile; ?>
            </div> <!-- end of row -->
        </div> <!--  end of press items -->

    </div>
</section>