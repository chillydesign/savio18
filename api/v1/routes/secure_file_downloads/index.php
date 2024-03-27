<?php


if (isset($_GET['secure_file_id'])) {

    $secure_file_id = $_GET['secure_file_id'];
    $secure_file = get_post($secure_file_id);

    if ($secure_file) {

        $file_name = csv_safe_string($secure_file->post_title);

        $opts  = array(
            'post_type'  => 'secure_file_download',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'post_parent' => $secure_file_id,
        );
        $posts = get_posts($opts);



        $data =  'file,email,name,company,phone,date'  . "\n";

        foreach ($posts as $post) {



            $email = csv_safe_string(get_field('email', $post->ID));
            $name = csv_safe_string(get_field('name', $post->ID));
            $company_name = csv_safe_string(get_field('company_name', $post->ID));
            $phone_number = csv_safe_string(get_field('phone_number', $post->ID));

            $ar = array(
                $file_name,
                $email,
                $name,
                $company_name,
                $phone_number,
                $post->post_date,

            );

            $data .=  implode(',', $ar);
            $data .=  "\n";
        }

        // print_r($data);

        $encoded_csv = mb_convert_encoding($data, 'UTF-16LE', 'UTF-8');
        $file = 'secure_file_downloads';
        $filename = $file . '_' . date('Y-m-d_H-i', time());
        header('Content-type: application/vnd.ms-excel');
        header('Content-disposition: csv' . date('Y-m-d') . '.csv');
        header('Content-disposition: filename=' . $filename . '.csv');
        header('Content-Length: ' . strlen($encoded_csv));
        $encoded_csv =   chr(255) . chr(254) . $encoded_csv;
        print $encoded_csv;
    }
}


exit;
