<section id="follow_savio">

    <div class="container">
        <div class="follow_savio_flex">

            <div class="follow_savio_text">
                <h2><?php echo $follow_header; ?></h2>
                <?php echo $follow_paragraph; ?>

                <?php // get_template_part('partials/mailchimp_signup_form'); 
                ?>
                <?php get_template_part('partials/sib_signup_form');
                ?>
                <?php echo $newsletter_text_footer; ?>
            </div>



            <aside class="hidden">

                <h2>Liens utiles</h2>
                <ul>
                    <li><a href="">A propos</a></li>
                    <li><a href="">FAQ</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">S’inscrire</a></li>
                </ul>

            </aside>


        </div>
    </div>
</section>