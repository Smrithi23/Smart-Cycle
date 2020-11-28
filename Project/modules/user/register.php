<?php

    require $_SERVER['DOCUMENT_ROOT']."/config/config.php";
    
    if(isset($_POST['register-submit'])) {

        // POST variables
        $username = $_POST['username'];
        $first_name =  $_POST['first_name'];
        $last_name =  $_POST['last_name'];
        $phone_number =  $_POST['phone_number'];
        $password = $_POST['password'];

        // QUERY to insert
            
        $sql = "INSERT INTO User (username, first_name, last_name, phone_number, password) VALUES 
                    ('$username', '$first_name', '$last_name', '$phone_number', '$password')";
        if(!is_numeric($phone_number)) {
            $message = "<div class=\"alert alert-danger\" role=\"alert\">Enter a valid contact number</div>";
        } else if (strlen($phone_number) != 10) {
            $message = "<div class=\"alert alert-danger\" role=\"alert\">Contact number must be 10 digits long</div>";
        } else  if (!mysqli_query($conn, $sql)) {
            if(substr(mysqli_error($conn), 0, 15) === "Duplicate entry") {
                $message = "<div class=\"alert alert-danger\" role=\"alert\">Username already exists</div>";
            }
        } else {
            $message = "<div class=\"alert alert-success\" role=\"alert\">Registered Successfully</div>";
        }
    }
?>