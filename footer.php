<?php $tdu = get_template_directory_uri(); ?>
<?php $hurl = get_home_url(); ?>


<?php if (have_rows('schools', 'options')) : ?>
	<section class="partenaires">
		<div class="container">
			<h3 style="text-align: center;position: relative;top: -25px;">Les écoles et associations qui utilisent déjà Savio</h3>
			<div class="slider_container">
				<div class="school_slider">
					<?php while (have_rows('schools', 'options')) : the_row(); ?>

						<div>
							<img class="school_logo" src="<?php echo get_sub_field('logo')['sizes']['medium']; ?>" alt="" />
							<div class="school_description">
								<h5><?php echo get_sub_field('nom'); ?></h5>
								<p><?php echo get_sub_field('adresse'); ?></p>
							</div>
						</div>
					<?php endwhile; ?>

				</div>
				<div class="paginator">
					<ul>
						<li class="prev"></li>
						<li class="next"></li>
					</ul>
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>

<footer>

	<div id="copyright">
		<p class="container">
			&copy; <?php echo date('Y'); ?> Savio | <a href="<?php echo $hurl; ?>/information-sur-la-protection-des-donnees-personnelles" target="infosavio">Protection des données</a> | <a href="<?php echo $hurl; ?>/contact" target="infosavio">Contact</a> | <a href="<?php echo $hurl; ?>/conditions-generales/" target="infosavio">Conditions générales</a> |
			<a target="_blank" class="social_icon social_icon_instagram" href="https://www.instagram.com/savio.fr/"></a>
			<a target="_blank" class="social_icon social_icon_facebook" href="https://www.facebook.com/Savio-Le-français-en-samusant-389735735185222/"></a>
			<br>
			<span id="website_author"> Website by <a target="_blank" href="https://webfactor.ch">Webfactor</a></span>
		</p>
	</div>

</footer>

<div id="freetest_popup">
	<div class="freetestpopupinner">
		<a href="https://app.savio.fr/gratuit" target="_blank">
			<img alt="Accéder au test gratuit" src="<?php echo $tdu; ?>/images/Savio-popup.jpg" />
		</a>
	</div>
</div>


<?php wp_footer(); ?>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123170854-2"></script>
<script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push(arguments);
	}
	gtag('js', new Date());

	gtag('config', 'UA-123170854-2');
</script>


</body>

</html>