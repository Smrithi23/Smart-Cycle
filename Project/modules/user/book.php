<?php
    require $_SERVER['DOCUMENT_ROOT']."/smart-cycle/Smart-cycle/Project/config/config.php";


    if(isset($_POST['submit'])){ 
    
        //set variables from form
        $cycle_number = $_POST['cycle_number'];
        $card_number = $_POST['card_number'];
        $exp_month = $_POST['exp_month'];
        $exp_year = $_POST['exp_year'];
        $cvv = $_POST['cvv'];

        //check if cycle number is valid
        $isCycle = "select * from Cycle where cycle_number = '$cycle_number'";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $isCycle));
        if($result == null || $result['availability'] == false) {
            echo "Cycle is not available.";

        }
        else{
            $cycle_id =  $result['cycle_id'];
            $stand_id = $result['stand_id'];
        }
        //user id
        $username = $_SESSION["username"];
        $getUserId = "select user_id from User where username = '$username'";
        $result = mysqli_fetch_assoc(mysqli_query($conn,$getUserId)) or die(mysqli_error($conn));
        $user_id = $result['user_id'];

        //set timezone
        date_default_timezone_set("Asia/kolkata");

        //start date
        $start_date = date('Y-m-d');
    
        //start time
        $start_time = date('H:i:sa');

    //Insert the details into cycle_usage table when cycle is booked
    $insertCycleUsageOnBook = "INSERT into cycle_usage 
    values ($cycle_id, $user_id, $start_date, $start_time,$card_number,$exp_month, $exp_year, $cvv)";

    if(mysqli_query($con,$insertCycleUsageOnBook)){

    } 
    else{
        
    }

    //Update the cycle table - availability attribute when a cycle is booked
    $updateAvailabilityOnBook = "UPDATE Cycle
    SET availability = False
    where cycle_number = $cycle_number";

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


