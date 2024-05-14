<?php
global $follow_header;
global $follow_paragraph;
global $newsletter_text_footer;


if (!isset($follow_header)) {
    $follow_header =  "<h2>Suivez Savio</h2>";
};

if (!isset($follow_paragraph)) {
    $follow_paragraph =  "<p>Inscrivez-vous à la newsletter et recevez les nouveautés du site et des codes de réduction sur les abonnements.</p>";
};

if (!isset($newsletter_text_footer)) {
    $newsletter_text_footer =  "";
};

?>


<section id="follow_savio">

    <div class="container">
        <div class="follow_savio_flex">

            <div class="follow_savio_text">
                <?php echo $follow_header; ?>
                <?php echo $follow_paragraph; ?>

                <?php
                // get_template_part('partials/mailchimp_signup_form'); 
                //get_template_part('partials/sib_signup_form_2');
                get_template_part('partials/sib_signup_form_3');
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