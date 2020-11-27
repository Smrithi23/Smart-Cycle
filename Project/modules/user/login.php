<?php
    include_once "../config.php";
    echo "included";
    if(isset($_POST['login-submit'])) {
        // POST variables
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql1 = "SELECT MD5($password) AS 'password'";
        $password = mysqli_query($conn, $sql1);

        $sql2 = "SELECT COUNT(*) FROM 'User' WHERE 'username' = $username AND 'password' = $password";
        $count = mysqli_query($conn, $sql2);

        $sql3 = "SELECT * FROM 'User' WHERE 'username' = $username AND 'password' = $password";
        $result = mysqli_query($conn, $sql3);

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