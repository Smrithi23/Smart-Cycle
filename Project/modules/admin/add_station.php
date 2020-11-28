<?php

    require $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

    if(isset($_POST['add-station-submit'])) {

        // POST variables
        $station_name = $_POST['station_name'];

        // QUERY to insert
        $sql = "INSERT INTO Station (station_name) VALUES ('$station_name');";
        if (!mysqli_query($conn, $sql)) {
            $message = "<div class=\"alert alert-danger\" role=\"alert\">Station already exits</div>";
        } else {
            $message = "<div class=\"alert alert-success\" role=\"alert\">Station added successfully</div>";
        }
    }

?>