<?php get_header(); ?>


		<!-- section -->
		<section class="container">

			<!-- article -->
			<article id="post-404">

                <section id="welcome_section" >
                    <div class="container">
                        <div class="welcome_text">
                            <h1><?php _e( 'Page not found', 'webfactor' ); ?></h1>
            				<p>
            					<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'webfactor' ); ?></a>
            				</p>
                        </div>
                    </div>
                </section>



			</article>
			<!-- /article -->

		</section>
		<!-- /section -->

<?php get_footer(); ?>
