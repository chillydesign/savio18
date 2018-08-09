<section  class="section  section_two_thirds_one_third">



<?php $text = get_field('text'); ?>
<?php $image = get_field('image'); ?>
<?php $image_side = get_field('image_side'); ?>

<div class="container">


	<div class="two_thirds_one_third_flex">
			<div class="flex_text <?php echo $image_side; ?>">
					<?php echo $text; ?>
			</div>
			<img src="<?php echo $image['sizes']['medium']; ?>" alt="" />
	</div>
</div><!--  END OF CONTAINER -->


</section>
