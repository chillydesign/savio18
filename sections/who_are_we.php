<section  class="section  section_who_are_we blue">
<div class="container">
	<div class="row">
	<?php $i = 1; ?>
	<?php while ( have_rows('person') ) : the_row(); ?>
		<div class="person_box">
			<div class="heading">
				<div class="photo" style="background-image:url('<?php echo get_sub_field('photo')['url']; ?>'); background-size:cover; height: 200px; width:200px; border-radius:50%; border:solid 2px blue; display:inline-block;"></div>
				<div class="person_name">
					<h3><?php echo get_sub_field('name'); ?>
					<hr><?php echo get_sub_field('title'); ?></h3>
				</div>
			</div>
			<hr>
			<?php echo get_sub_field('description'); ?>
		</div>

	<?php $i++; ?>
	<?php endwhile; ?>
	</div> <!-- END OF ROW -->
</div><!--  END OF CONTAINER -->

</section>