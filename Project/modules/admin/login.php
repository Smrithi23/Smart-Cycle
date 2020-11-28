<?php
    require $_SERVER['DOCUMENT_ROOT']."/config/config.php";
    if(isset($_POST['login-submit'])) {
        session_destroy();
        session_start();
        // POST variables
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql1 = "SELECT COUNT(*) AS num FROM Admin WHERE username = '$username' AND password = MD5('$password')";
        $count = mysqli_fetch_assoc(mysqli_query($conn, $sql1)) or die(mysqli_error($conn));
        
        if($count["num"]) {
            // Login successful
            // Set session variables
            $_SESSION["admin"] = 1;
            header('Location: /admin/home.php');
            $message = "<div class=\"alert alert-success\" role=\"alert\">Successfully logged in<div>";
        } else {
            // Login not successful
            $message = "<div class=\"alert alert-danger\" role=\"alert\">Incorrect credentials</div>";
        }
    }
?>