<?php

    require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

    if(isset($_POST['drop-submit'])){

        /*

            Order of checking :
            1. Check if the user has already taken a cycle
            2. Get the cycle number from Cycle_Usage
            3. Find time difference in hours
            4. Get station_id from station_name
            5. Get stand_id from station_id and stand_name
            6. Update Cycle set availability = 1 and station_id = station_id
            7. Update Cycle set no_of_cycles = no_of_cycles + 1
            8. Update Stand set no_of_cycles = no_of_cycles + 1
            9. Find the amount to be paid
            10. Remove record from Cycle_Usage

        */

        // POST variables
        $station_name = $_POST["station_name"];
        $stand_name = $_POST["stand_name"];

        // $user_id = $_SESSION['user_id'];
        // 1. Check if the user has taken a cycle

        $sql = "SELECT COUNT(*) AS num FROM Cycle_Usage WHERE user_id = 3";
        $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        
        if($res["num"]) {
         
            // 2. Get cycle number
            $sql = "SELECT cycle_number AS num FROM Cycle_Usage WHERE user_id = 3";
            $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));

            if($res["num"]) {
               
                $cycle_number = $res["num"];

                // 3. Find time difference in hours
                $sql = "SELECT TIME_FORMAT(TIMEDIFF(NOW(), start_datetime), '%H') AS hr FROM Cycle_Usage WHERE cycle_number = '$cycle_number'";
                $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));

                if($res["hr"]) {

                    $hours = $res["hr"];
                        
                    // 4. Get station_id
                    $sql = "SELECT station_id as id FROM Station WHERE station_name = '$station_name'";
                    $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));

                    if($res["id"]) {
                        
                        $station_id = $res["id"];

                        // 5. Get stand_id
                        $sql = "SELECT stand_id as id FROM Stand WHERE station_id = '$station_id' AND stand_name = '$stand_name'";
                        $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));

                        if($res["id"]) {
                            
                            $stand_id = $res["id"];

                            // 6. Update Cycle set stand_id = stand_id

                            $sql = "UPDATE Cycle SET stand_id = '$stand_id' WHERE cycle_number = '$cycle_number'";

                            if(mysqli_query($conn, $sql)) {
                                
                                // 7. Update Cycle set availability = 1
                                $sql = "UPDATE Cycle SET availability = 1 WHERE cycle_number = '$cycle_number'";

                                if(mysqli_query($conn, $sql)) {
                                    
                                    // 8. Update Stand set no_of_cycles = no_of_cycles + 1
                                    $sql = "UPDATE Stand SET no_of_cycles = no_of_cycles + 1 WHERE stand_id = '$stand_id'";
                                
                                    if(mysqli_query($conn, $sql)) {
                                        
                                        // 9. Calculate the amount to be paid
                                        $amount = 10 * $hours;

                                        // 10. Delete record from Cycle_Usage
                                        $sql = "DELETE FROM Cycle_Usage WHERE cycle_number = '$cycle_number'";

                                        if(mysqli_query($conn, $sql)) {

                                            $message = "<div class=\"alert alert-success\" role=\"alert\">Dropped Cycle. Amount to be paid : Rs. $amount</div>";

                                        } else {

                                            $message = "<div class=\"alert alert-danger\" role=\"alert\">Cannot return cycle. Try again later</div>";

                                        }
                                    } else {

                                        $message = "<div class=\"alert alert-danger\" role=\"alert\">Cannot return cycle. Try again later</div>";
                                        
                                    }
                                } else {

                                    $message = "<div class=\"alert alert-danger\" role=\"alert\">Cannot return cycle. Try again later</div>";

                                }
                            } else {

                                $message = "<div class=\"alert alert-danger\" role=\"alert\">Cannot return cycle. Try again later</div>";

                            }
                        } else {

                            $message = "<div class=\"alert alert-danger\" role=\"alert\">Cannot return cycle. Try again later</div>";

                        }
                    } else {

                        $message = "<div class=\"alert alert-danger\" role=\"alert\">Cannot return cycle. Try again later</div>";

                    }
                } else {

                    $message = "<div class=\"alert alert-danger\" role=\"alert\">Cannot return cycle. Try again later</div>";

                }
            } else {

                $message = "<div class=\"alert alert-danger\" role=\"alert\">Cannot return cycle. Try again later</div>";

            }
        } else {

            $message = "<div class=\"alert alert-danger\" role=\"alert\">No cycle to return</div>";

        }
    }
?>


