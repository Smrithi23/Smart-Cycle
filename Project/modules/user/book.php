<?php
    include_once "../config.php";

    if(isset($_POST['submit'])){ 
        //get these variables from database
        $cycle_id;
        $user_id;
        $start_date;
        $start_time;
        //set variables from form
        $cycle_number = $_POST['cycle_number'];
        $card_number = $_POST['card_number'];
        $exp_month = $_POST['exp_month'];
        $exp_year = $_POST['exp_year'];
        $cvv = $_POST['cvv'];

    //Insert the details into cycle_usage table when cycle is booked
    $insertCycleUsageOnBook = "INSERT into cycle_usage 
    values (<cycle_id>, <user_id>, <start_date>, <start_time>,< card_number>,< exp_month>, <exp_year>,< cvv>)";

    if(mysqli_query($con,$insertCycleUsageOnBook)){

    } 
    else{
        
    }

    //Update the cycle table - availability attribute when a cycle is booked
    $updateAvailabilityOnBook = "UPDATE Cycle
    SET availability = False
    where cycle_number = $cno";

    if(mysqli_query($con,$updateAvailabilityOnBook)){

    } 
    else{
        
    }


    //Update the stand table - no_of_cycles when a cycle is booked 
    $updateStandOnBook = "UPDATE Stand
    Set no_of_cycles = no_of_cycles - 1  
    Where stand_id = $stand_id";

    if(mysqli_query($con,$updateStandOnBook)){

    } 
    else{
        
    }
    }
?>


