<?php

    if($_SERVER['REQUEST_URI'] === '/') {
        require $_SERVER['DOCUMENT_ROOT']."/user/login.php";
    }

?>