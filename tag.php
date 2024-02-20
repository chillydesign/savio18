<?php get_header(); ?>





<section class="welcome_section">
	<div class="container">
		<div class="welcome_text">
			<h1><?php _e('Tag Archive: ', 'webfactor');
				echo single_tag_title('', false); ?></h1>

		</div>
	</div>
</section>

<section>
	<div class="container">
		<?php get_template_part('loop'); ?>

		<?php get_template_part('pagination'); ?>
	</div>
</section>


<?php get_footer(); ?>