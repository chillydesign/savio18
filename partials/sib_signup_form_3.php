<?php if (isset($_GET['success'])) :; ?>
    <div class="alert alert_success">Succès!</div>
<?php endif; ?>
<?php if (isset($_GET['problem'])) :; ?>
    <div class="alert alert_danger">Un problème est survenu</div>
<?php endif; ?>
<form id="brevo_signup_3" class="signup_form" method="POST" action="<?php echo  esc_url(admin_url('admin-post.php')); ?>">
    <div class="sib-form">



        <div class="columns">


            <div class="column">

                <label class="entry__label" for="EMAIL" data-required="*">
                    Email *
                </label>

                <input class="input" type="text" id="EMAIL" name="EMAIL" autocomplete="off" placeholder="EMAIL" data-required="true" required />

            </div>
            <div class="column">
                <label class="entry__label" for="NOM" data-required="*">
                    Nom *
                </label>
                <input class="input" maxlength="200" type="text" id="NOM" name="NOM" autocomplete="off" placeholder="NOM" data-required="true" required />

            </div>

            <div class="column">
                <label for="ROLE"> Je suis *</label>

                <label>
                    <input type="radio" name="ROLE" class="input_replaced" value="1" required>
                    <span class="radio-button"></span><span>Parent</span> </label>
                <label>
                    <input type="radio" name="ROLE" class="input_replaced" value="2" required>
                    <span class="radio-button"></span><span>Enseignant / École</span> </label>


            </div>
            <div class="column">
                <button>Envoyer</button>
                <input type="hidden" name="action" value="brevo_signup_3">

                <div id="maths_input">
                    <label for="maths">3+5?</label>
                    <input type="text" placholder="3+5=?" name="maths" id="maths">
                </div>

            </div>
        </div>
    </div>

</form>