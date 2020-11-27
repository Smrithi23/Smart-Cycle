<?php
    require "../config.php";
    if(isset($_POST['login-submit'])) {
        // POST variables
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql1 = "SELECT MD5('$password') AS password";
        $password = mysqli_fetch_assoc(mysqli_query($conn, $sql1))["password"] or die(mysqli_error($conn));

        $sql2 = "SELECT COUNT(*) FROM Admin WHERE username = '$username' AND password = '$password'";
        $count = mysqli_fetch_assoc(mysqli_query($conn, $sql2)) or die(mysqli_error($conn));

        $sql3 = "SELECT * FROM Admin WHERE username = '$username'";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $sql3)) or die(mysqli_error($conn));

        var_dump($password);
        var_dump($count);
        var_dump($result);
        
        if($count) {
            // Login successful
            // Set session variables
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