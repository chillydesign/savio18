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


function newBrevoAPITransactional() {
    global $config;
    $apiInstance = new Brevo\Client\Api\TransactionalEmailsApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    return $apiInstance;
}



add_action('admin_post_nopriv_download_kit_2024_04',    'process_download_kit_2024_04');
add_action('admin_post_download_kit_2024_04',  'process_download_kit_2024_04');

function process_download_kit_2024_04() {
    $referer = $_SERVER['HTTP_REFERER'];
    $referer =  explode('?',   $referer)[0];

    $role = $_POST['ROLE'];

    if (isset($_POST['action'])  && $_POST['action'] == 'download_kit_2024_04') {

        $role = $_POST['ROLE'];
        $role_string = ($role == '1') ? 'parent' : 'teacher';
        $sendtransemail =  false; //  makeTransactionalEmailDownloadKit2024_04($role_string);

        if ($sendtransemail) {
            // wp_redirect($referer . '?success', $status = 302);
        } else {
            // wp_redirect($referer . '?problem', $status = 302);
        }
    } else {
        // wp_redirect($referer . '?problem', $status = 302);
    }
}


function makeTransactionalEmailDownloadKit2024_04($type) {
    if ($type == 'parent') {
        $template_id = 92;
        $attachment_url = 'https://savio.fr/wp-content/uploads/2018/08/chevalier-e1612273795738.jpg';
    } else {
        $template_id = 92;
        $attachment_url = 'https://savio.fr/wp-content/uploads/2018/08/chevalier-e1612273795738.jpg';
    }
    $apiInstance = newBrevoAPITransactional();
    $email = [];
    $email['to'] = array(array('email' => 'harvey.charles+new@gmail.com'));
    $email['templateId'] = $template_id;
    $email['attachment'] = array(array('url' => $attachment_url));
    try {
        $result = $apiInstance->sendTransacEmail($email);
        print_r($result);
        return true;
    } catch (Exception $e) {
        echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
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


    $output = '<div class="download_kit_2024_04_container">';
    $output .= '<form id="download_kit_2024_04" action="' . esc_url(admin_url('admin-post.php')) . ' " method="post">';

    $output .= '<label class="entry__label" for="ROLE" data-required="*">Je suis</label>
                <div class="entry__choice">
                <label>
                <input type="radio" name="ROLE" class="input_replaced" value="1" required>
                <span class="radio-button"></span><span>Parent</span> </label>
                </div>
                <div class="entry__choice">
                <label>
                <input type="radio" name="ROLE" class="input_replaced" value="2" required>
                <span class="radio-button"></span><span>Enseignant / École</span> </label>
                </div>';


    $output .= '<input type="hidden" name="action" value="download_kit_2024_04">';
    $output .= '<input class="button" id="download_kit_2024_04_form_submit_button" type="submit" value="Envoyer">';
    $output .= '</form>';
    $output .= '</div>';
    return $output;
}
