<section  class="section  section_two_thirds_one_third">



<?php $text = get_sub_field('text'); ?>
<?php $image = get_sub_field('image'); ?>
<?php $image_side = get_sub_field('image_side'); ?>
<?php if($image_side == 'flipped'){
	$class_text = 'col-sm-push-5';
	$class_image = 'col-sm-pull-7';
} else{
	$class_text = '';
	$class_image = 'col-sm-push-1';
}?>

<div class="container">


	<div class="row">
			<div class="col-sm-7 <?php echo $class_text; ?>">
					<?php echo $text; ?>
			</div>
			<div class="col-sm-4 <?php echo $class_image; ?>">
				<img src="<?php echo $image['sizes']['medium']; ?>" alt="" />
			</div>
	</div>
</div><!--  END OF CONTAINER -->


</section>
