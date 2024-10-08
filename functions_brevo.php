<?php


$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', BREVO_KEY);




function newBrevoAPIDefault() {
    global $config;
    $apiInstance = new Brevo\Client\Api\AccountApi(
        new GuzzleHttp\Client(),
        $config
    );

    return $apiInstance;
}





function newBrevoAPIContacts() {
    global $config;
    $apiInstance = new Brevo\Client\Api\ContactsApi(
        new GuzzleHttp\Client(),
        $config
    );
    return $apiInstance;
}


function newBrevoAPITransactional() {
    global $config;
    $apiInstance = new Brevo\Client\Api\TransactionalEmailsApi(
        new GuzzleHttp\Client(),
        $config
    );
    return $apiInstance;
}



add_action('admin_post_nopriv_brevo_signup_3',    'process_brevo_signup_3');
add_action('admin_post_brevo_signup_3',  'process_brevo_signup_3');


function process_brevo_signup_3() {
    $referer = $_SERVER['HTTP_REFERER'];
    $referer =  explode('?',   $referer)[0];

    if (isset($_POST['action'])  && $_POST['action'] == 'brevo_signup_3') {

        $maths = $_POST['maths'];

        if ($maths == 8 || $maths == '8' || !$maths || !isset($maths)) {
            $role = $_POST['ROLE'];
            $email = $_POST['EMAIL'];
            $nom = $_POST['NOM'];
            $role_string = ($role == '1') ? 'parent' : 'teacher';

            $added_to_contacts = addEmailToContactsFromSignupForm($email, $nom, $role);
            if ($added_to_contacts) {
                wp_redirect($referer . '?success=si_co#brevo_signup_3', $status = 302);
            } else {
                wp_redirect($referer . '?problem=co#brevo_signup_3', $status = 302);
            };
        } else {
            // SPAM
            wp_redirect($referer . '?problem=spm#brevo_signup_3', $status = 302);
        }
    } else {
        wp_redirect($referer . '?problem=act#brevo_signup_3', $status = 302);
    }
}

add_action('admin_post_nopriv_download_kit_2024_04',    'process_download_kit_2024_04');
add_action('admin_post_download_kit_2024_04',  'process_download_kit_2024_04');

function process_download_kit_2024_04() {
    $referer = $_SERVER['HTTP_REFERER'];
    $referer =  explode('?',   $referer)[0];

    if (isset($_POST['action'])  && $_POST['action'] == 'download_kit_2024_04') {
        $role = $_POST['ROLE'];
        $email = $_POST['EMAIL'];
        $agree_to_emails = $_POST['agree_to_emails'];
        $agree_to_terms = $_POST['agree_to_terms'];

        if ($agree_to_terms === 'true') {
            $role_string = ($role == '1') ? 'parent' : 'teacher';
            $sendtransemail =  makeTransactionalEmailDownloadKit2024_04($email, $role_string);
            if ($sendtransemail) {
                if ($agree_to_emails == 'true') {
                    $added_to_contacts = addEmailToContactsFromDownloadKit($email, $role);
                    if ($added_to_contacts) {
                        wp_redirect($referer . '?success=tr_co', $status = 302);
                    } else {
                        wp_redirect($referer . '?success=tr&problem=co', $status = 302);
                    };
                } else {
                    wp_redirect($referer . '?success=tr', $status = 302);
                }
            } else {
                wp_redirect($referer . '?problem=tr', $status = 302);
            }
        } else {
            wp_redirect($referer . '?problem=att', $status = 302);
        }
    } else {
        wp_redirect($referer . '?problem=act', $status = 302);
    }
}



function makeTransactionalEmailDownloadKit2024_04($email, $type) {
    if ($type == 'parent') {
        $template_id = 92;
        $attachment_url = 'https://savio.fr/wp-content/uploads/2018/08/chevalier-e1612273795738.jpg';
    } else {
        $template_id = 92;
        $attachment_url = 'https://savio.fr/wp-content/uploads/2018/08/chevalier-e1612273795738.jpg';
    }
    $apiInstance = newBrevoAPITransactional();
    $recipient = [];
    $recipient['to'] = array(array('email' => $email));
    $recipient['templateId'] = $template_id;
    $recipient['attachment'] = array(array('url' => $attachment_url));
    try {
        $result = $apiInstance->sendTransacEmail($recipient);
        print_r($result);
        return true;
    } catch (Exception $e) {
        echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
        return false;
    }
}




function addEmailToContactsFromSignupForm($email, $nom,  $role) {

    $contact = array('email' => $email, 'attributes' => array(
        'ROLE' => $role,
        'NOM' => $nom,
        'OPT_IN' => true,
        'FROM_WP' => true
    ));
    $apiInstance = newBrevoAPIContacts();
    try {
        $result = $apiInstance->createContact($contact);
        print_r($result);
        return true;
    } catch (Exception $e) {
        echo 'Exception when calling ContactsApi->createContact: ', $e->getMessage(), PHP_EOL;
        return false;
    }
}


function addEmailToContactsFromDownloadKit($email, $role) {

    $contact = array('email' => $email, 'attributes' => array(
        'ROLE' => $role,
        'OPT_IN' => true,
        'FROM_WP' => true,
        'FROM_DOWNLOAD_KIT' => true
    ));


    $apiInstance = newBrevoAPIContacts();
    try {
        $result = $apiInstance->createContact($contact);
        print_r($result);
        return true;
    } catch (Exception $e) {
        echo 'Exception when calling ContactsApi->createContact: ', $e->getMessage(), PHP_EOL;
        return false;
    }
}

function getAccountDetails() {
    try {
        $apiInstance = newBrevoAPIDefault();
        $result = $apiInstance->getAccount();
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling AccountApi->getAccount: ', $e->getMessage(), PHP_EOL;
    }
}


add_shortcode('download_kit_2024_04', 'webfactor_download_kit_2024_04_shortcode');
function webfactor_download_kit_2024_04_shortcode($atts) {


    $output = '<div class="download_kit_form" id="download_kit_2024_04_container">';

    if (isset($_GET['success'])) :
        $output .= '<div class="alert alert_success">Succès!</div>';
    endif;
    if (isset($_GET['problem'])) :
        $output .= '<div class="alert alert_danger">Un problème est survenu</div>';
    endif;

    $output .= '<form id="download_kit_2024_04" action="' . esc_url(admin_url('admin-post.php')) . ' " method="post">';

    $output .= '  <div class=""> <label class="" for="EMAIL" >Email *</label>
       
        <input class="input" type="text" id="EMAIL" name="EMAIL" autocomplete="off" placeholder="EMAIL" data-required="true" required />
        </div>';
    $output .= '<div class=""> <input class="input" type="checkbox" value="true" id="agree_to_emails" name="agree_to_emails" autocomplete="off"  /><label class="inline" for="agree_to_emails"> &nbsp; Je souhaite recevoir la newsletter de Savio</label> </div>';
    $output .= '<div class=""> <input class="input" type="checkbox" value="true" id="agree_to_terms" name="agree_to_terms" autocomplete="off"  required  /><label class="inline" for="agree_to_terms"> &nbsp; J’ai pris connaissance des <a href="https://savio.fr/conditions-generales/" target="_blank">conditions d’utilisation</a> et la <a href="https://savio.fr/information-sur-la-protection-des-donnees-personnelles/" target="_blank"> politique de confidentialité</a>. * </label> </div>';


    $output .= '<div class=""><label class="" for="ROLE" >Je suis *</label>
                <label>
                <input type="radio" name="ROLE" class="input_replaced" value="1" required>
                <span class="radio-button"></span><span>Parent</span> </label>
                <label>
                <input type="radio" name="ROLE" class="input_replaced" value="2" required>
                <span class="radio-button"></span><span>Enseignant / École</span> </label>
                </div>';


    $output .= '<input type="hidden" name="action" value="download_kit_2024_04">';
    $output .= '<div><input class="button" id="download_kit_2024_04_form_submit_button" type="submit" value="Recevoir le document"></div>';
    $output .= '</form>';
    $output .= '</div>';
    return $output;
}
