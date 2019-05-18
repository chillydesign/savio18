<?php get_header(); ?>


	<!-- section -->
	<section>
        <div class="container">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>

					<?php the_post_thumbnail(); // Fullsize image for the single post ?>

			<?php endif; ?>
			<!-- /post thumbnail -->

			<h1><?php the_title(); ?></h1>


			<?php the_content(); // Dynamic Content ?>

			<?php // comments_template(); ?>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>
</div>
	</section>
	<!-- /section -->


<?php get_footer(); ?>
