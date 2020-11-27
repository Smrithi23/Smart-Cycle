<?php
    include_once "../config.php";

    function authenticate ($username, $password) {
        // POST variables
        $password = "SELECT MD5($password)";
        $count = "SELECT COUNT(*) FROM 'User' WHERE 'username' = $username AND 'password' = $password";
        $res = "SELECT * FROM 'User' WHERE 'username' = $username AND 'password' = $password";
        if($count === 1) {
            // Login successful
            // Set session variables
            $_SESSION["username"] = $res["username"];
            $_SESSION["first_name"] = $res["first_name"];
            $_SESSION["last_name"] = $res["last_name"];
            return 'Successfully Logged In';
        } else {
            // Login not successful
            return 'Incorrect credentials';
            
        }
    }
    
    if(isset($_POST['login'])) {
        $message = authenticate($_POST['username'], $_POST['password']);
    }
?>