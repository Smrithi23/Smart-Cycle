<?php
    require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

    if(isset($_POST['book-submit'])){

        //set variables from form
        $cycle_number = $_POST['cycle_number'];
        $card_number = $_POST['card_number'];
        $exp_month = $_POST['exp_month'];
        $exp_year = $_POST['exp_year'];
        $cvv = $_POST['cvv'];

        // Check if the user hasnt already taken a cycle
        $sql = "SELECT COUNT(*) AS num FROM User WHERE username = 'smrithi";
        $res = mysqli_fetch_assoc(mysqli_query($conn, $sql)) or die(mysqli_error($conn));

        if($res["num"]) {
            // Check if cycle number is correct
            $sql = "SELECT COUNT(*) AS num FROM Cycle WHERE cycle_number = '$cycle_number'";
            $res = mysqli_fetch_assoc(mysqli_query($conn, $sql)) or die(mysqli_error($conn));

            if($res["num"]) {
                // Entered cycle number is correct

                // Check if the cycle is available
                $sql = "SELECT availability AS available FROM Cycle WHERE cycle_number = '$cycle_number'";
                $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));

                if($res["available"]) {
                    // Cycle is available
                    $user_id = $_SESSION['user_id'];
                    // Enter record into Cycle_Usage table
                    $sql = "INSERT INTO Cycle_Usage (cycle_number, user_id, start_datetime, card_no, exp_month, exp_year, cvv) 
                            VALUES ('$cycle_number', '3', NOW(), '$card_number', '$exp_month', '$exp_year', '$cvv')";

                    if(mysqli_query($conn, $sql)) {

                        // Make the cycle not available
                        $sql = "UPDATE Cycle SET availability = '0' WHERE cycle_number = '$cycle_number'";

                        if(mysqli_query($conn, $sql)) {

                            // Change booked attribute of user to 1
                            $username = $_SESSION['username'];
                            $sql = "UPDATE User SET booked = 1 WHERE username = 'smrithi'";
                            mysqli_query($conn, $sql);

                            // Find station_id
                            $sql = "SELECT stand_id AS id FROM Cycle WHERE cycle_number = '$cycle_number'";
                            $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                            $stand_id = $res['id'];

                            // Reduce the number of cycles in the station
                            $sql = "UPDATE Stand SET no_of_cycles = no_of_cycles - 1 WHERE stand_id = '$stand_id'";
                            mysqli_query($conn, $sql);

                            $message = "Successfully booked cycle. Deducted Rs 21.00.";

                        } else {

                            $message = "Couldn't change the availability of the cycle";
                            // REVERSE inorder to make the change atomic
                            $sql = "DELETE FROM Cycle_Usage WHERE cycle_number = '$cycle_number'";

                        }

                    } else {
                        echo mysqli_error($conn);
                        $message = "Couldn't add record into Cycle_Usage table";

                    }
                } else {

                    // Cycle is not available
                    $message = "Cycle is not available";

                }
            } else {

                // Entered cycle number is wrong
                $message = "Cycle number is wrong";

            }
        } else {
            $message = "You can book only one cycle at a time";
        }
    }

?>