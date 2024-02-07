<?php $title =  get_sub_field('title'); ?>
<section class="section section_videos">
	<?php $column_count =  sizeof(get_sub_field('video_repeater')); ?>


	<div class="container">
		<?php if ($title) : ?>
			<h2><?php echo $title; ?></h2>
		<?php endif; ?>
		<div class="row">
			<?php $i = 1; ?>
			<?php while (have_rows('video_repeater')) : the_row(); ?>
				<div class="col-sm-4">
					<div class="video_container">
						<?php $video_link =  get_sub_field('link'); ?>
						<?php $video_title =  get_sub_field('title'); ?>
						<?php $video_subtitle =  get_sub_field('subtitle'); ?>
						<?php $video_image =  get_sub_field('image'); ?>
						<?php if ($video_image) : ?>
							<a href="<?php echo $video_link; ?>">
								<div class="video_image" style="background-image:url(<?php echo $video_image['url']; ?>)"></div>
							</a>
						<?php else : ?>
							<?php echo apply_filters('the_content', $video_link);   ?>

						<?php endif; ?>
						<?php if ($video_title) : ?>
							<h4><?php echo $video_title; ?></h4>
						<?php endif; ?>
						<?php if ($video_subtitle) : ?>
							<h5><?php echo $video_subtitle; ?></h5>
						<?php endif; ?>
					</div>
				</div>
				<?php if ($i % 3 == 0) : ?>
		</div>
		<div class="row">
		<?php endif; ?>
		<?php $i++; ?>
	<?php endwhile; ?>
		</div> <!-- END OF ROW -->

	</div><!--  END OF CONTAINER -->

</section>