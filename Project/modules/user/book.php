<?php

    require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

    if(isset($_POST['book-submit'])){

        /*
            Order of checking :
            1. Check if the user has already taken a cycle
            2. Check if the cycle number is correct
            3. Check if the cycle is available
            4. Check if the credit card is valid
            5. Check if the cvv is valid
            6. Enter Record in Cycle Usage
            7. Make the cycle not available
            8. Change booked attribute of user to 1
            9. Reduce the number of cycles in station by 1
        */

        //set variables from form
        $cycle_number = $_POST['cycle_number'];
        $card_number = $_POST['card_number'];
        $exp_month = $_POST['exp_month'];
        $exp_year = $_POST['exp_year'];
        $cvv = $_POST['cvv'];

        // SESSION variables
        $user_id = $_SESSION["user_id"];
        // 1. Check if the user hasnt already taken a cycle
        $sql = "SELECT COUNT(*) AS num FROM Cycle_Usage WHERE user_id = '$user_id'";
        $res = mysqli_fetch_assoc(mysqli_query($conn, $sql)) or die(mysqli_error($conn));

        if(!$res["num"]) {
            // 2. Check if cycle number is correct
            $sql = "SELECT COUNT(*) AS num FROM Cycle WHERE cycle_number = '$cycle_number'";
            $res = mysqli_fetch_assoc(mysqli_query($conn, $sql)) or die(mysqli_error($conn));

            if($res["num"]) {
                // Entered cycle number is correct

                // 3. Check if the cycle is available
                $sql = "SELECT availability AS available FROM Cycle WHERE cycle_number = '$cycle_number'";
                $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));

                if($res["available"]) {
                    // Cycle is available
                    // $user_id = $_SESSION['user_id'];

                    // Check if the credit card is valid
                    if(strlen($card_number) === 16) {
                        if(strlen($cvv) === 3) {
                            // Enter record into Cycle_Usage table
                            $sql = "INSERT INTO Cycle_Usage (cycle_number, user_id, start_datetime, card_no, exp_month, exp_year, cvv) 
                            VALUES ('$cycle_number', '$user_id', NOW(), '$card_number', '$exp_month', '$exp_year', '$cvv')";

                            if(mysqli_query($conn, $sql)) {

                                // Make the cycle not available
                                $sql = "UPDATE Cycle SET availability = '0' WHERE cycle_number = '$cycle_number'";

                                if(mysqli_query($conn, $sql)) {

                                    // Find station_id
                                    $sql = "SELECT stand_id AS id FROM Cycle WHERE cycle_number = '$cycle_number'";
                                    $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                    $stand_id = $res['id'];

                                    // Reduce the number of cycles in the station
                                    $sql = "UPDATE Stand SET no_of_cycles = no_of_cycles - 1 WHERE stand_id = '$stand_id'";
                                    mysqli_query($conn, $sql);

                                    $message = "<div class=\"alert alert-success\" role=\"alert\">Successfully booked cycle. Deducted Rs 21.00.</div>";

                                } else {

                                    $message = "<div class=\"alert alert-danger\" role=\"alert\">Couldn't change the availability of the cycle</div>";

                                    // REVERSE inorder to make the change atomic
                                    $sql = "DELETE FROM Cycle_Usage WHERE cycle_number = '$cycle_number'";

                                }

                            } else {

                                echo mysqli_error($conn);
                                $message = "<div class=\"alert alert-danger\" role=\"alert\">Couldn't add record into Cycle_Usage table</div>";

                            }
                        } else {

                            // CVV is invalid
                            $message = "<div class=\"alert alert-danger\" role=\"alert\">CVV is invalid</div>";

                        }
                    } else {

                        // Credit card is invalid
                        $message = "<div class=\"alert alert-danger\" role=\"alert\">Credit card is invalid</div>";

                    }
                } else {

                    // Cycle is not available
                    $message = "<div class=\"alert alert-danger\" role=\"alert\">Cycle is not available</div>";

                }
            } else {

                // Entered cycle number is wrong
                $message = "<div class=\"alert alert-danger\" role=\"alert\">Cycle number is wrong</div>";

            }
        } else {
            $message = "<div class=\"alert alert-danger\" role=\"alert\">You can book only one cycle at a time</div>";
        }
    }

?>