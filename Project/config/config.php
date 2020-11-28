<?php

    //Include the config file in every other page
    session_start();
    $servername = "localhost";
    $dBUsername = "root";
    $dBPassword = "Password12345678$";
    $dBName = "SmartCycle";
    $conn = mysqli_connect($servername,$dBUsername,$dBPassword) or die( "Unable to connect");
    mysqli_select_db($conn, $dBName) or die( "Unable to select database");

?>