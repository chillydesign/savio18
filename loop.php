<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php $image = thumbnail_of_post_url(get_the_ID(), 'medium'); ?>
		<?php $date = get_field('date', get_the_ID()); ?>
		<article class="single_article_loop">


			<a href="<?php the_permalink(); ?>" class="loop_image" style="background-image:url(<?php echo $image; ?>)"></a>
			<div class="loop_content">




				<div class="blog_with_date">
					<?php if ($date) : ?>
						<?php echo make_date_container($date); ?>
					<?php endif; ?>
					<div class="blog_content">

						<h4>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h4>
						<?php html5wp_excerpt(20, false); // Build your custom callback length in functions.php 
						?>

						<a class="button" href="<?php the_permalink(); ?>"><?php _e('View Article', 'webfactor'); ?></a>


					</div>
				</div>




			</div>

			<div class="cool_orange_bar"></div>




		</article>

	<?php endwhile; ?>

<?php else : ?>

	<article>
		<h2><?php _e('Sorry, nothing to display.', 'webfactor'); ?></h2>
	</article>

<?php endif; ?>