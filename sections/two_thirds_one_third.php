<?php $background =  get_sub_field('background'); ?>

<section class="section  section_two_thirds_one_third <?php echo $background; ?>  <?php if (get_sub_field('increase_pad')) {
																						echo 'increase_pad';
																					} ?>">



	<?php $text = get_sub_field('text'); ?>
	<?php $image = get_sub_field('image'); ?>
	<?php $image_side = get_sub_field('image_side'); ?>
	<?php if ($image_side == 'flipped') {
		$class_text = '';
		$class_image = 'col-sm-push-1';
	} else {
		$class_text = 'col-sm-push-4';
		$class_image = 'col-sm-pull-8';
	} ?>

	<div class="container">


		<div class="row">
			<div class="col-sm-8 <?php echo $class_text; ?>">
				<?php echo $text; ?>
			</div>
			<div class="col-sm-3 <?php echo $class_image; ?>">
				<?php if ($image) : ?>
					<img src="<?php echo $image['sizes']['medium']; ?>" alt="" />
				<?php endif; ?>
			</div>
		</div>
	</div><!--  END OF CONTAINER -->


</section>