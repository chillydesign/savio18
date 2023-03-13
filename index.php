<?php get_header(); ?>




<section class="welcome_section">
	<div class="container">
		<div class="welcome_text">
			<h1><?php _e('Latest Posts', 'webfactor'); ?></h1>
		</div>
	</div>
</section>

<section>

</section>

<!-- section -->
<section class="news_section">
	<div class="container">
		<div class="news_container">
			<?php get_template_part('loop'); ?>
		</div>
		<?php get_template_part('pagination'); ?>


	</div>

</section>
<!-- /section -->




<?php get_footer(); ?>