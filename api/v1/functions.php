<?php


function make_random_code() {
    return wp_generate_password(24, false);
}


if (!function_exists('api_remove_line_breaks')) {
    function api_remove_line_breaks($string) {

        $new_string = str_replace(array("\r", "\n"), '', $string);
        $new_string = str_replace(';', ' ', $new_string);
        $new_string = str_replace(',', ' ', $new_string);
        $new_string = strip_tags($new_string);
        return $new_string;
    }
}




function create_secure_file_download($secure_file_id, $name, $company_name, $email, $phone_number) {


    $post = array(
        'post_title'     =>  $name . ' | ' . $email,
        'post_status'    => 'publish',
        'post_type'      => 'secure_file_download',
        'post_content'   => '',
        'post_parent'    => $secure_file_id,
        'post_name' => make_random_code(),

    );
    $post_id = wp_insert_post($post);
    if ($name) {
        add_post_meta($post_id, 'name', $name, true);
    }
    if ($company_name) {
        add_post_meta($post_id, 'company_name', $company_name, true);
    }
    if ($email) {
        add_post_meta($post_id, 'email', $email, true);
    }
    if ($phone_number) {
        add_post_meta($post_id, 'phone_number', $phone_number, true);
    }
    return $post_id;
}


function csv_safe_string($str) {
    return  str_replace(',', ' ', $str);
}
