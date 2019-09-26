<?php  $column_count =  sizeof(  get_sub_field('person')  ); ?>
<?php  $column_class = count_to_bootstrap_class($column_count); ?>

<section  class="section  section_who_are_we blue">

	<div class="container">
		<div class="row">
			<?php while ( have_rows('person') ) : the_row(); ?>
				<div class="<?php echo $column_class; ?> ">
					<div class="column">
						<div class="photo_border flip-container" ontouchstart="this.classList.toggle('hover');">
							<div class="flipper">
								<div class="photo front" style="background-image:url('<?php echo get_sub_field('drawing')['url']; ?>');"></div>
								<div class="photo back" style="background-image:url('<?php echo get_sub_field('photo')['url']; ?>');"></div>
							</div>
						</div>
						<div class="heading">

							<div class="person_name">
								<h3><?php echo get_sub_field('name'); ?>
									<hr><span><?php echo get_sub_field('title'); ?></span></h3>
									<h6><?php echo get_sub_field('infos'); ?></h6>
								</div>
							</div>
							<?php echo get_sub_field('description'); ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div> <!-- END OF ROW -->
		</div><!--  END OF CONTAINER -->

	</section>
