<?php

    require $_SERVER['DOCUMENT_ROOT']."/config/config.php";
    
    if(isset($_POST['register-submit'])){

        // POST variables
        $username = $_POST['username'];
        $first_name =  $_POST['first_name'];
        $last_name =  $_POST['last_name'];
        $phone_number =  $_POST['phone_number'];
        $password = $_POST['password'];

        // QUERY - Check if entered credentials are correct
            
        $register = "INSERT INTO User (username, first_name, last_name, phone_number, password) VALUES 
                    ($username, $first_name, $last_name, $phone_number, $password)";

        if(mysqli_query($conn, $register)){
            echo "registered successfully";
        } else {
            echo "error";
        }
    }
?>


