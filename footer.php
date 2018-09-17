
	<?php $tdu = get_template_directory_uri(); ?>

    <footer>

        <div id="copyright">
            <p class="container">&copy; <?php echo date('Y'); ?> <?php echo  get_bloginfo( 'site_name' ); ?> | <a href="<?php echo get_home_url();?>/information-sur-la-protection-des-donnees-personnelles" target="infosavio">Protection des données</a> | Website by <a target="_blank" href="https://webfactor.ch">Webfactor</a></p>
        </div>

    </footer>



		<?php wp_footer(); ?>

		<script type="text/javascript" src="<?php echo $tdu; ?>/js/min/scripts.bundle.js?v=<?php echo wf_version(); ?>"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123170854-2"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-123170854-2');
        </script>


	</body>
</html>
