<?php

    require $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

    if(isset($_POST['add-station-submit'])) {

        // POST variables
        $station_name = $_POST['station_name'];

        // QUERY to insert
        $sql = "INSERT INTO Station (station_name) VALUES ('$station_name');";
        if (!mysqli_query($conn, $sql)) {
            $message = "Station already exits";
        } else {
            $message = "Station added successfully";
        }
    }

?>