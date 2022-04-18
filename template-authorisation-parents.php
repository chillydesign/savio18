<?php /* Template Name: Authorisation Parents Template */
$lang = 'fr';
if (isset($_GET['lang'])) {

    $lang = $_GE['lang'];
}


if ($lang == 'en') {
    $file = get_field('authorization_parents_en', 'options');
} else {
    $file = get_field('authorization_parents_fr', 'options');
}



// Header content type
header("Content-type: application/pdf");

header("Content-Length: " . filesize($file));

// Send the file to the browser.
readfile($file);
