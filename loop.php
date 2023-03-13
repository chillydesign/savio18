<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php $image = thumbnail_of_post_url(get_the_ID(), 'medium'); ?>
		<?php $date = get_field('date', get_the_ID()); ?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="loop_with_image">

				<div class="loop_image" style="background-image:url(<?php echo $image; ?>)"></div>
				<div class="loop_content">




					<div class="blog_with_date">
						<?php if ($date) : ?>
							<?php echo make_date_container($date); ?>
						<?php endif; ?>
						<div class="blog_content">

							<h4>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h4>
							<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php 
							?>

						</div>
					</div>



				</div>
			</div>





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