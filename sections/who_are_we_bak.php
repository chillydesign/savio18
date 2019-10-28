<?php  $column_count =  sizeof(  get_sub_field('person')  ); ?>
<?php  $column_class = count_to_bootstrap_class($column_count); ?>

<section  class="section  section_who_are_we section_founder blue">

	<div class="container">
		<div class="row">
			<h2 style="font-weight: bold;color: white;text-align: center;border: solid 4px;padding: 11px 50px 10px;max-width: 300px;margin: 0 auto 50px;font-size: 2.5em;">L'équipe</h2>
			<?php while ( have_rows('person') ) : the_row(); ?>
				<div class="col-md-6">
					<div class="column person_box">
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
