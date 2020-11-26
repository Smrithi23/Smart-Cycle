<?php

    //Include the config file in every other page


    $con = mysqli_connect("localhost","root","","SmartCycle");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

?>