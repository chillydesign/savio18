
<?php global $post; ?>
<?php $site_url = site_url(); ?>


<?php if( is_page() && $post->post_parent  ){ ?>
<?php $parent = get_post($post->post_parent); ?>
<div class="container">   
<ul class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
<li><a href="<?php echo $site_url; ?>">Home</a></li>
<li><a href="<?php echo $parent->guid; ?>"><?php echo $parent->post_title; ?></a></li>
</ul>
</div>
<?php } else if ( is_tax( 'question_cat') ): ?>
<div class="container">   
<ul class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
<li><a href="<?php echo $site_url; ?>">Home</a></li>
<li><a href="<?php echo $site_url; ?>/faq">FAQ</a></li>
</ul>
</div>


<?php endif; ?>