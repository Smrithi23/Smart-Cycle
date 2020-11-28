<?php
    require $_SERVER['DOCUMENT_ROOT']."/Smart-Cycle/Project/config/config.php";

    //Check if entered credentials are correct


    if(isset($_POST['search'])){

        
    //QUERY - Get list of cycles available
    $availableCycles = "SELECT cycle_number
    FROM Cycle 
    WHERE availability = True";


    if(mysqli_query($con,$availableCycles)){
        echo "success";
    }
    else{
        echo "error";
    }   
    }
?>


