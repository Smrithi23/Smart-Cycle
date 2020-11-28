<?php
    require $_SERVER['DOCUMENT_ROOT']."/Smart-Cycle/Project/config/config.php";

    if(isset($_POST['login-submit'])) {
        // POST variables
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql1 = "SELECT COUNT(*) AS num FROM Admin WHERE username = '$username' AND password = MD5('$password')";
        $count = mysqli_fetch_assoc(mysqli_query($conn, $sql1)) or die(mysqli_error($conn));

        var_dump($count);
        
        if($count["num"]) {
            // Login successful
            // Set session variables
            $_SESSION["authenticated"] = "true";
            $message = "Successfully logged in";
        } else {
            // Login not successful
            $message = "Incorrect credentials";
        }
    }
?>