<?php

    require $_SERVER['DOCUMENT_ROOT']."/Smart-Cycle/Project/config/config.php";

    if(isset($_POST['login-submit'])) {
        // POST variables
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql1 = "SELECT COUNT(*) AS num FROM User WHERE username = '$username' AND password = MD5('$password')";
        $count = mysqli_fetch_assoc(mysqli_query($conn, $sql1)) or die(mysqli_error($conn));

        if($count["num"]) {
            // Login successful
            // Set session variables
            $sql3 = "SELECT * FROM User WHERE username = '$username'";
            $result = mysqli_fetch_assoc(mysqli_query($conn, $sql3)) or die(mysqli_error($conn));
            $_SESSION["username"] = $result["username"];
            $_SESSION["first_name"] = $result["first_name"];
            $_SESSION["last_name"] = $result["last_name"];
            $message = "Successfully logged in";
        } else {
            // Login not successful
            $message = "Incorrect credentials";
        }
    }
?>