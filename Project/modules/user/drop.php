<?php

    require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

    if(isset($_POST['drop-submit'])){

        // POST variables
        $station_name = $_POST["station_name"];
        $stand_name = $_POST["stand_name"];

        $user_id = $_SESSION['user_id'];
        // check if the user has taken a cycle

        $sql = "SELECT booked AS check FROM User WHERE user_id = '$user_id'";
        $res = mysqli_fetch_assoc(mysqli_query($conn, $sql)) or die(mysqli_error($conn));

        if($res["check"]) {
            // user has taken a cycle

            // get cycle number
            $sql = "SELECT cycle_number AS no FROM Cycle_Usage WHERE user_id = '$user_id'";
            $res = mysqli_fetch_assoc(mysqli_query($conn, $sql)) or die(mysqli_error($conn));

            if($res["no"]) {
                $cycle_number = $res["no"];
                // remove record from Cycle_Usage
                $sql = "DELETE FROM Cycle_Usage WHERE cycle_number = '$cycle_number'";
                if(mysqli_query($conn, $sql)) {
                    $sql = "SELECT station_id as id FROM Station WHERE station_name = '$station_name'";
                    $res = mysqli_fetch_assoc(mysqli_query($conn, $sql)) or die(mysqli_error($conn));

                    if($res["id"]) {
                        $sql = "SELECT stand_id as id FROM Station WHERE station_id = '$station_id' AND stand_name = '$stand_name'";
                        $res = mysqli_fetch_assoc(mysqli_query($conn, $sql)) or die(mysqli_error($conn));
                        if($res["id"]) {
                            $sql = "UPDATE Cycle SET stand_id = '$stand_id' AND SET availability = '1' WHERE cycle_number = $cycle_number";
                            if(mysqli_query($conn, $sql)) {
                                $sql = "UPDATE Stand SET no_of_cycles = no_of_cycles + 1 stand_id = '$stand_id'";
                                if(mysqli_query($conn, $sql)) {
                                    // calculate amount
                                    $sql = "SELECT TIME_FORMAT(TIMEDIFF(NOW(), start_datetime), '%H') AS hr FROM Cycle_Usage";
                                    $res = mysqli_fetch_assoc(mysqli_query($conn, $sql)) or die(mysqli_error($conn));
                                    if($res['hr']) {
                                        // calculate amount
                                    } else {
                                        // check error
                                    }
                                } else {
                                    $message = "Cannot return cycle. Try again later";
                                    $sql = "UPDATE Cycle SET availability = '0'";
                                    mysqli_query($conn, $sql)
                                }
                            } else {
                                $message = "Cannot return cycle. Try again later";
                            }
                        } else {
                            $message = "Cannot return cycle. Try again later";
                        }
                    } else {
                        $message = "Cannot return cycle. Try again later";
                    }
                } else {
                    $message = "Cannot return cycle. Try again later";
                }
            }
        } else {
            $message = "No cycle to return";
        }

    }
?>


