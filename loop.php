<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article style="padding: 0 20px 30px" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



			<!-- post title -->
			<h4>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h4>
			<!-- /post title -->


			<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php 
			?>



		</article>
		<!-- /article -->

	<?php endwhile; ?>

<?php else : ?>

	<!-- article -->
	<article>
		<h2><?php _e('Sorry, nothing to display.', 'webfactor'); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>