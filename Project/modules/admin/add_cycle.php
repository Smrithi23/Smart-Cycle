<?php
    require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

    $station_id = mysqli_real_escape_string($con, $REQUEST['station_id']);
    $stand_name = mysqli_real_escape_string($con, $REQUEST['stand_name']);
    $cycle_no = mysqli_real_escape_string($con, $REQUEST['cycle_number']);

    $sql = "INSERT INTO Cycle (cycle_number, availability, stand_id) 
    VALUES ($cycle_no, True, $station_id)
    ";

    if(mysqli_query($con, $sql)){
        echo "Cycle added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }

    mysqli_close($con)
?>