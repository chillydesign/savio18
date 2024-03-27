<?php


$json = file_get_contents('php://input');
// Converts it into a PHP object
$data = json_decode($json);

if (!empty($data)) {

    if ($data->email) {
        $secure_file_id =   $data->secure_file_id;
        $secure_file = get_post($secure_file_id);

        if ($secure_file) {
            $file = get_field('file', $secure_file->ID);

            if ($file) {
                $res  = $file['url'];


                $name = $data->name;
                $company_name = $data->company_name;
                $email = $data->email;
                $phone_number = $data->phone_number;
                $secure_file_download_id =  create_secure_file_download($secure_file_id, $name, $company_name, $email, $phone_number);

                echo json_encode($res, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
            } else {
                http_response_code(404);
                echo json_encode('Error 3');
            }
        } else {
            http_response_code(404);
            echo json_encode('Error 2');
        }
    } else {
        http_response_code(404);

        echo json_encode('Error 4');
    }
} else {
    http_response_code(404);
    echo json_encode('Error 1');
}
