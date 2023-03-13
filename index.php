<?php get_header(); ?>




<section class="welcome_section">
	<div class="container">
		<div class="welcome_text">
			<h1><?php _e('Latest Posts', 'webfactor'); ?></h1>

		</div>
	</div>
</section>

<!-- section -->
<section>
	<div class="container">
		<?php get_template_part('loop'); ?>

		<?php get_template_part('pagination'); ?>



	</div>

</section>
<!-- /section -->




<?php get_footer(); ?>