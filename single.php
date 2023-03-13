<?php get_header(); ?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php $post_type = get_field('post_type'); ?>
		<?php $date = get_field('date'); ?>
		<?php $link = get_field('link'); ?>
		<?php $link_text = get_field('link_text'); ?>




		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<section class="welcome_section">
				<div class="container">
					<div class="welcome_text">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</section>

			<!-- section -->
			<section>
				<div class="container">


					<div class="row">

						<div class="col-sm-8">
							<!-- post thumbnail -->
							<?php if (has_post_thumbnail()) : // Check if Thumbnail exists 
							?>

								<?php the_post_thumbnail(); // Fullsize image for the single post 
								?>

							<?php endif; ?>
							<!-- /post thumbnail -->



							<div class="blog_with_date">
								<?php if ($date) : ?>
									<div class="date_container">
										<div class="month">
											<?php echo shortmonth_of($date); ?>
										</div>
										<div class="day">
											<?php echo date_of($date); ?>
										</div>

									</div>

								<?php endif; ?>

								<div class="blog_content">
									<?php the_content(); // Dynamic Content 
									?>

									<?php if ($link && $link_text) : ?>
										<a href="<?php echo $link; ?>" target="_blank" class="button"><?php echo $link_text; ?></a>
									<?php endif; ?>


								</div>

							</div>




						</div>
						<div class="col-sm-4">
							<?php get_sidebar(); ?>

						</div>

					</div>



				</div>
			</section>
			<!-- /section -->
		</article>
		<!-- /article -->

	<?php endwhile; ?>

<?php else : ?>

	<!-- article -->
	<article>
		<div class="container">
			<h1><?php _e('Sorry, nothing to display.', 'webfactor'); ?></h1>

		</div>

	</article>
	<!-- /article -->

<?php endif; ?>



<?php get_footer(); ?>