<?php

    require $_SERVER['DOCUMENT_ROOT'].'/Smart-Cycle/Project/config/config.php';

    if(isset($_POST['add-stand-submit'])) {

        // POST variables
        $station_name = $_POST['station_name'];
        $stand_name = $_POST['stand_name'];

        // QUERY to check if the stand already exists
        $sql = "SELECT COUNT(*) AS num FROM Station NATURAL JOIN Stand WHERE station_name = '$station_name' AND stand_name = '$stand_name'";
        $check = mysqli_fetch_assoc(mysqli_query($conn, $sql)) or die(mysqli_error($conn));
        if($check["num"]) {
            $message = "Station already exists";
        } else {
            // QUERY to find station id
            $sql = "SELECT station_id AS id FROM Station WHERE station_name = '$station_name'";
            $res = mysqli_fetch_assoc(mysqli_query($conn, $sql)) or die(mysqli_error($conn));
            if($res['id']) {
                $station_id = $res['id'];

                // QUERY to insert
                $sql = "INSERT INTO Stand (stand_name, station_id) VALUES ('$stand_name', '$station_id');";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $message = "Station added successfully";
            } else {
                $message = "Station does not exist";
            }
        }
    }

?>