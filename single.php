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
						<h1>Actualités</h1>
					</div>
				</div>
			</section>

			<!-- section -->
			<section>
				<div class="container">

					<ul class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
						<li><a href="<?php echo site_url(''); ?>">Accueil</a></li>
						<li><a href="<?php echo site_url('actualites'); ?>">Actualités</a></li>
					</ul>
					<div class="row">

						<div class="col-sm-8">



							<div class="blog_with_date">
								<?php if ($date) : ?>
									<?php echo make_date_container($date); ?>
								<?php endif; ?>
								<div class="blog_content">
									<h2><?php the_title(); ?></h2>

									<p class="meta"><em>
											<?php echo get_the_date(); ?>
											<?php
											foreach (get_the_tags() as $category) {
												echo sprintf(
													'<a href="%1$s" alt="%2$s">%3$s</a> ',
													esc_url(get_category_link($category->term_id)),
													esc_attr(sprintf(__('%s', 'textdomain'), $category->name)),
													esc_html($category->name)
												);
											}; ?>

										</em></p>

									<?php if (has_post_thumbnail()) : // Check if Thumbnail exists 
										the_post_thumbnail(); // Fullsize image for the single post 
									endif; ?>


									<?php the_content(); // Dynamic Content 
									?>
									<?php if ($link && $link_text) : ?>
										<a href="<?php echo $link; ?>" target="_blank" class="button"><?php echo $link_text; ?></a>
									<?php endif; ?>

									<div class="comment_form">
										<?php get_template_part('comments'); ?>
									</div>

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