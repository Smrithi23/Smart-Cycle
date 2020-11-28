<?php

    require $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

    if(isset($_POST['add-cycle-submit'])) {

        // POST variables
        $station_name = $_POST['station_name'];
        $stand_name = $_POST['stand_name'];
        $cycle_number = $_POST['cycle_number'];

        // QUERY to check if the cycle already exists
        $sql = "SELECT COUNT(*) AS num FROM Cycle WHERE cycle_number = '$cycle_number'";
        $check = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        if($check["num"]) {
            $message = "<div class=\"alert alert-danger\" role=\"alert\">Cycle already exists</div>";
        } else {
            // QUERY to find station id
            $sql = "SELECT station_id AS id FROM Station WHERE station_name = '$station_name'";
            $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            if($res['id']) {

                $station_id = $res['id'];

                // QUERY to find stand id
                $sql = "SELECT stand_id AS id FROM Stand WHERE station_id = '$station_id' AND stand_name = '$stand_name'";
                $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));

                if($res['id']) {

                    $stand_id = $res['id'];

                    // QUERY to insert
                    $sql = "INSERT INTO Cycle (cycle_number, availability, stand_id) VALUES ('$cycle_number', '1', '$stand_id')";

                    if(mysqli_query($conn, $sql)) {

                        // QUERY to update no_of_cycles in Stand table
                        $sql = "UPDATE Stand SET no_of_cycles = no_of_cycles + 1 WHERE stand_id = '$stand_id'";
                        if(mysqli_query($conn, $sql)) {

                            $message = "<div class=\"alert alert-success\" role=\"alert\">Cycle added successfully</div>";

                        } else {

                            $message = "<div class=\"alert alert-danger\" role=\"alert\">Cycle couldn't be added<div>";
                            
                        }

                    } else {

                        $message = "<div class=\"alert alert-danger\" role=\"alert\">Cycle couldn't be added</div>";

                    }

                } else {

                    $message = "<div class=\"alert alert-danger\" role=\"alert\">Stand does not exist</div>";

                }
            } else {

                $message = "<div class=\"alert alert-danger\" role=\"alert\">Station does not exist</div>";

            }
        }
    }

?>