
	<?php $tdu = get_template_directory_uri(); ?>

    <footer>

        <div id="copyright">
            <p class="container">&copy; <?php echo date('Y'); ?> <?php echo bloginfo( 'site_name' ); ?>.  Website by <a href="https://webfactor.ch">Webfactor</a>. </p>
        </div>

    </footer>



		<?php wp_footer(); ?>

		<script type="text/javascript" src="<?php echo $tdu; ?>/js/min/scripts.bundle.js?v=<?php echo wf_version(); ?>"></script>
		<script>
		// (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		// (f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		// l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		// })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		// ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		// ga('send', 'pageview');
		</script>

	</body>
</html>
