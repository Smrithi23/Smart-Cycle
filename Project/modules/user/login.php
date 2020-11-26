<?php
include_once "../config.php";



if(isset($_POST['submit'])){

//set variables
$username = $_POST['username'];
$password = $_POST['password'];

//QUERY -Check if entered credentials are correct

$login = "SELECT MD5($username) INTO @password
SELECT * FROM User WHERE username = $username AND password = @password"; 

if(mysqli_query($con,$login)){

    echo "logged in";
}
else{
    echo "error";
}
}
?>


