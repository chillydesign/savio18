<?php get_header(); ?>




<!-- article -->
<article id="post-404">

    <section class="welcome_section">
        <div class="container">
            <div class="welcome_text">
                <h1><?php _e('Page not found', 'webfactor'); ?></h1>
                <p>
                    <a href="<?php echo home_url(); ?>"><?php _e('Return home?', 'webfactor'); ?></a>
                </p>
            </div>
        </div>
    </section>

    <div style="height:600px;background:white"></div>



</article>
<!-- /article -->


<?php get_footer(); ?>