<section  class="section  section_slider
<?php if(get_sub_field('increase_pad')){echo 'increase_pad';}?>">



<?php $text = get_sub_field('text'); ?>
<?php $gallery = get_field('slider'); ?>
<?php $image_side = get_sub_field('image_side'); ?>
<?php if($image_side == 'flipped'){
	$class_text = 'col-sm-push-6';
	$class_image = 'col-sm-pull-6';
} else{
	$class_text = '';
	$class_image = '';
}?>

<div class="container">


	<div class="row">
			<div class="col-sm-6 <?php echo $class_text; ?>">
					<?php echo $text; ?>
			</div>
			<div class="col-sm-6 <?php echo $class_image; ?>">
				<div class="slider_container">
						<div class="slider">
								<?php foreach ($what_savio_gallery as $image) : ?>
										<div><img src="<?php echo $image['sizes']['medium']; ?>" alt="" /></div>
								<?php endforeach; ?>
						</div>
				</div>

			</div>
	</div>
</div><!--  END OF CONTAINER -->


</section>
