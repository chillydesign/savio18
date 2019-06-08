
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
