<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part('loop_single'); ?>
	<?php endwhile; ?>

<?php else : ?>

	<article>
		<h2 style="text-align:center"><?php _e('Sorry, nothing to display.', 'webfactor'); ?></h2>
	</article>

<?php endif; ?>