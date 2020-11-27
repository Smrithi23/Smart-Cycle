<?php

    //Include the config file in every other page
    session_start();
    $servername = "localhost";
    $dBUsername = "root";
    $dBPassword = "Password12345678$";
    $dbName = "SmartCycle";
    $conn=mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

?>