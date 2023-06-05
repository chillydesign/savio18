<!-- Begin Brevo Form -->
<!-- START - We recommend to place the below code in head tag of your website html  -->
<style>
    #sib-container input:-ms-input-placeholder {
        text-align: left;

        color: #c0ccda;
    }

    #sib-container input::placeholder {
        text-align: left;

        color: #c0ccda;
    }

    #sib-container textarea::placeholder {
        text-align: left;

        color: #c0ccda;
    }
</style>
<link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">
<!--  END - We recommend to place the above code in head tag of your website html -->

<!-- START - We recommend to place the below code where you want the form in your website html  -->
<div class="sib-form">
    <div id="sib-form-container" class="sib-form-container">
        <div id="error-message" class="sib-form-message-panel">
            <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                <svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
                    <path d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-11.49 120h22.979c6.823 0 12.274 5.682 11.99 12.5l-7 168c-.268 6.428-5.556 11.5-11.99 11.5h-8.979c-6.433 0-11.722-5.073-11.99-11.5l-7-168c-.283-6.818 5.167-12.5 11.99-12.5zM256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28z" />
                </svg>
                <span class="sib-form-message-panel__inner-text">
                    Votre inscription à la newsletter a échoué. Veuillez réessayer.
                </span>
            </div>
        </div>
        <div></div>
        <div id="success-message" class="sib-form-message-panel">
            <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
                <svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
                    <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z" />
                </svg>
                <span class="sib-form-message-panel__inner-text">
                    Votre inscription a été enregistrée. Vous avez reçu un email de confirmation pour finaliser votre inscription. Cliquez sur le lien de confirmation pour recevoir toute l&#039;actualité Savio !
                </span>
            </div>
        </div>
        <div></div>
        <div id="sib-container" class="sib-container--large sib-container--vertical">
            <form id="sib-form" class="signup_form" method="POST" action="https://c8f1151e.sibforms.com/serve/MUIEAACq0aZerhtzv-YvhXxuGQ_B5oPdzYiPqZC3jACQUuuTuwR1T1sabHw9DCYgQUQXgf9nrQVrQk4nG2wmbiVihTGli1GfYeOfK30mf4E4Xue3512JwxoEUwa5rvHbf_dA9htDMWBY-a8_mCWbYtzWlNHsfiJLP5BTQm6m6FVE470Yt_Bzv8Cj4LEVeWX6KWmpUaOERjCcD9e3" data-type="subscription">

                <div class="form-field">
                    <div class="sib-input sib-form-block">
                        <div class="form__entry entry_block">
                            <div class="form__label-row ">
                                <label class="entry__label" for="EMAIL" data-required="*">
                                    Email
                                </label>

                                <div class="entry__field">
                                    <input class="input" type="text" id="EMAIL" name="EMAIL" autocomplete="off" placeholder="EMAIL" data-required="true" required />
                                </div>
                            </div>

                            <label class="entry__error entry__error--primary">
                            </label>

                        </div>
                    </div>
                </div>
                <div class="form-field">
                    <div class="sib-input sib-form-block">
                        <div class="form__entry entry_block">
                            <div class="form__label-row ">
                                <label class="entry__label" for="NOM" data-required="*">
                                    Nom
                                </label>

                                <div class="entry__field">
                                    <input class="input" maxlength="200" type="text" id="NOM" name="NOM" autocomplete="off" placeholder="NOM" data-required="true" required />
                                </div>
                            </div>

                            <label class="entry__error entry__error--primary">
                            </label>

                        </div>
                    </div>
                </div>
                <div class="form-field">
                    <div class="sib-radiobutton-group sib-form-block" data-required="true">
                        <div class="form__entry entry_mcq">
                            <div class="form__label-row ">
                                <label class="entry__label" for="ROLE" data-required="*">
                                    Je suis
                                </label>
                                <div>
                                    <div class="entry__choice">
                                        <label>
                                            <input type="radio" name="ROLE" class="input_replaced" value="1" required>
                                            <span class="radio-button"></span><span>Parent</span> </label>
                                    </div>
                                    <div class="entry__choice">
                                        <label>
                                            <input type="radio" name="ROLE" class="input_replaced" value="2" required>
                                            <span class="radio-button"></span><span>Enseignant / École</span> </label>
                                    </div>
                                </div>
                            </div>
                            <label class="entry__error entry__error--primary">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-field">
                    <div class="sib-form-block">
                        <button class="sib-form-block__button sib-form-block__button-with-loader" form="sib-form" type="submit">
                            <svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon" viewBox="0 0 512 512">
                                <path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
                            </svg>
                            Envoyer
                        </button>
                    </div>
                </div>

                <input type="text" name="email_address_check" value="" class="input--hidden">
                <input type="hidden" name="locale" value="en">
            </form>
        </div>
    </div>
</div>
<!-- END - We recommend to place the below code where you want the form in your website html  -->

<!-- START - We recommend to place the below code in footer or bottom of your website html  -->
<script>
    window.REQUIRED_CODE_ERROR_MESSAGE = 'Please choose a country code';
    window.LOCALE = 'en';
    window.EMAIL_INVALID_MESSAGE = window.SMS_INVALID_MESSAGE = "Les informations communiquées ne sont pas valides. Veuillez vérifiez le format de chaque champ et réessayer.";

    window.REQUIRED_ERROR_MESSAGE = "Veuillez entrer une valeur. ";

    window.GENERIC_INVALID_MESSAGE = "Les informations communiquées ne sont pas valides. Veuillez vérifiez le format de chaque champ et réessayer.";




    window.translation = {
        common: {
            selectedList: '{quantity} list selected',
            selectedLists: '{quantity} lists selected'
        }
    };

    var AUTOHIDE = Boolean(0);
</script>
<script defer src="https://sibforms.com/forms/end-form/build/main.js"></script>


<style>
    #sib-container {
        background-color: transparent;
        padding: 0;
        margin: 0;
    }

    .signup_form label {
        font-size: 1em;
    }

    .sib-form {
        padding: 0;
        font-size: initial;
    }

    .sib-form .entry__field {
        background-color: transparent;
        border: 0;
    }

    .sib-form-block {
        padding: 0;
    }

    .sib-form-block button {
        font-size: 1.5em;
    }

    .sib-form .input,
    .sib-form .input__affix {
        border-bottom: 1px solid white;

    }

    #follow_savio .signup_form label.entry__error {
        color: #fddcdc;
        font-weight: bold;
    }
</style>
<!-- END - We recommend to place the above code in footer or bottom of your website html  -->
<!-- End Brevo Form -->