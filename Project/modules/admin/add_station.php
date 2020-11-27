<?php
    require '../../config/config.php';

    $station_name = mysqli_real_escape_string($con, $REQUEST['station_name']);

    $sql = "INSERT INTO Station (station_name) VALUES ('$station_name');";

    if(mysqli_query($con, $sql)){
        echo "Station added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }

    mysqli_close($con)
?>