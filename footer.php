
	<?php $tdu = get_template_directory_uri(); ?>
	<?php $hurl = get_home_url(); ?>

    <footer>

        <div id="copyright">
            <p class="container">
            &copy; <?php echo date('Y'); ?> Savio | <a href="<?php echo $hurl;?>/information-sur-la-protection-des-donnees-personnelles" target="infosavio">Protection des données</a> | <a href="<?php echo $hurl;?>/contact" target="infosavio">Contact</a> | <a href="<?php echo $hurl;?>/conditions-generales/" target="infosavio">Conditions générales</a> |
              <a target="_blank" class="social_icon social_icon_instagram" href="https://www.instagram.com/savio.fr/"></a>
              <a target="_blank" class="social_icon social_icon_facebook" href="https://www.facebook.com/Savio-Le-français-en-samusant-389735735185222/"></a>
            <br>
            <span id="website_author"> Website by <a target="_blank" href="https://webfactor.ch">Webfactor</a></span>
            </p>
        </div>

    </footer>

<div class="freetest_popup" style="display:none;position: fixed; top: 0; bottom: 0; background: rgba(0,0,0,0.6); width: 100%; height: 100vh;">
	<a href="https://app.savio.fr/gratuit" target="_blank" style="display: table-cell; text-align: center; vertical-align: middle;">
		<img alt="Accéder au test gratuit" src="<?php echo $tdu; ?>/images/Savio-popup.jpg" style="max-height: 70vh; max-width: 70vw; width: auto; height: auto; margin: auto!important;"/>
	</a>
</div>


		<?php wp_footer(); ?>


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
