<?php

    require $_SERVER['DOCUMENT_ROOT']."/config/config.php";
    
    //if form is submitted
    if(isset($_POST['submit'])){

    //set variables
    $username = $_POST['username'];
    $first_name =  $_POST['first_name'];
    $last_name =  $_POST['last_name'];
    $phone_number =  $_POST['phone_number'];
    $password = $_POST['password'];


    //QUERY - Check if entered credentials are correct
        
    $register = "INSERT INTO User (username, first_name, last_name, 
    phone_number, password) VALUES ($username, $first_name,   
    $last_name, $phone_number, $password)";

    if(mysqli_query($con,$register)){
        echo "registered successfully";
    }
    else{
        echo "error";
    }
    }
?>


