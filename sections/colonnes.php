<section  class="section  section_colonnes <?php echo get_sub_field('background'); ?>">
		<?php $column_count =  sizeof(  get_sub_field('columns')  ); ?>
<?php $column_class = count_to_bootstrap_class($column_count); ?>


<div class="container">
	<div class="row">
	<?php while ( have_rows('columns') ) : the_row(); ?>
		<div class="<?php echo $column_class; ?> ">
			<div class="column">
				<?php if(get_sub_field('background')=='blue'): ?>
					<div class="feature_logo" style="background-image:url(<?php echo get_sub_field('image')['sizes']['medium']; ?>)"></div>
				<?php endif; ?>
				<?php echo get_sub_field('content'); ?>
			</div>
		</div>
	<?php endwhile; ?>
	</div> <!-- END OF ROW -->
</div><!--  END OF CONTAINER -->

</section>
