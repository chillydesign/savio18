<?php $title =  get_sub_field('title'); ?>
<section class="section section_videos">
	<?php $column_count =  sizeof(get_sub_field('video_repeater')); ?>
	<?php $column_class = count_to_bootstrap_3max_class($column_count); ?>


	<div class="container">
		<?php if ($title) : ?>
			<h2><?php echo $title; ?></h2>
		<?php endif; ?>
		<div class="row">
			<?php while (have_rows('video_repeater')) : the_row(); ?>
				<div class="<?php echo $column_class; ?> ">
					<div class="video_container">
						<?php $video =  get_sub_field('link'); ?>
						<?php $video_title =  get_sub_field('title'); ?>
						<?php echo apply_filters('the_content', $video);   ?>
						<?php if ($video_title) : ?>
							<h4><?php echo $video_title; ?></h4>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div> <!-- END OF ROW -->

	</div><!--  END OF CONTAINER -->

</section>