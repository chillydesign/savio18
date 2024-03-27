<?php

ini_set('default_charset', 'UTF-8');
header('Content-Type: application/json;charset=UTF-8');


require_once('../../../../../wp-config.php');
require_once('functions.php');


error_reporting(E_ALL);
ini_set('display_errors', 1);



if (isset($_GET['route'])) {
    $route = $_GET['route'];


    if ($route == 'secure_files' || $route == 'secure_file_downloads') {
        if (isset($_GET['id'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
                include('routes/' . $route . '/delete.php');
            } else if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
                include('routes/' . $route . '/update.php');
            } else {
                include('routes/' . $route . '/show.php');
            }
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include('routes/' . $route . '/create.php');
        } else {
            include('routes/' . $route . '/index.php');
        }
    } // end of if route is answers


} else {
    //  error
    http_response_code(404);
    echo json_encode('error');
}
