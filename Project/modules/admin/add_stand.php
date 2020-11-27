<?php
    require '../../config/config.php';

    $station_id = mysqli_real_escape_string($con, $REQUEST['station_id']);
    $stand_name = mysqli_real_escape_string($con, $REQUEST['stand_name']);
    $noc = mysqli_real_escape_string($con, $REQUEST['no_of_cycles']);

    $sql = "INSERT INTO Stand (stand_name, station_id, no_of_cycles) 
    VALUES ($stand_name, $station_id, $noc)";

    if(mysqli_query($con, $sql)){
        echo "Stand added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }

    mysqli_close($con)
?>