<?php /* Template Name: Authorisation Parents Template */
$lang = 'fr';
if (isset($_GET['lang'])) {

    $lang = $_GE['lang'];
}


if ($lang == 'en') {
    $file_id = get_field('authorization_parents_en', 'options');
} else {
    $file_id = get_field('authorization_parents_fr', 'options');
}


$file = get_attached_file($file_id);



// // Header content type
header("Content-type: application/pdf");

header("Content-Length: " . filesize($file));

// Send the file to the browser.
readfile($file);
