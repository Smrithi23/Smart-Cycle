<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require '../templates/user/login.php';
        break;
    case '/admin' :
        require '../templates/admin/login.php';
        break;
    default:
        echo "NOT FOUND";
}
?>