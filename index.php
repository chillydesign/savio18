<?php get_header(); ?>




<section class="welcome_section">
	<div class="container">
		<div class="welcome_text">
			<h1><?php _e('Latest Posts', 'webfactor'); ?></h1>

		</div>
	</div>
</section>

<!-- section -->
<section class="container">

	<?php get_template_part('loop'); ?>

	<?php get_template_part('pagination'); ?>

</section>
<!-- /section -->




<?php get_footer(); ?>