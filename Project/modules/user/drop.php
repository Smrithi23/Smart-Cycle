<?php
include_once "../config.php";


if(isset($_POST['submit'])){

//set from database
$cno;

//set from form
$stand_name = $_POST['stand_name'];
$station_name = $_POST['station_name'];
//Update the cycle table - stand_id when cycle is dropped
$updateStandIdOnDrop = "UPDATE Cycle
set Cycle.stand_id = Stand.stand_id
From Station
Natural join Stand
Where Station.station_name = $station_name
And Stand.stand_name = $stand_name";

if(mysqli_query($con,$updateStandIdOnDrop)){

} 
else{
    
}



//Update the stand table - no_of_cycles when a cycle is dropped
$updateStandOnDrop = "UPDATE Stand
set Stand.no_of_cycles = Stand.no_of_cycles - 1
Where Stand.stand_id = Stand.stand_id
From Station
Natural join Stand
Where Station.station_name = $station_name
And Stand.stand_name = $stand_name";

if(mysqli_query($con,$updateStandOnDrop)){
    
} 
else{
    
}



//Delete the row from cycle_usage when cycle is dropped
$DeleteCycleUsageOnDrop = "DELETE from cycle_usage
Where cycle_no = $cno";

if(mysqli_query($con,$DeleteCycleUsageOnDrop)){

} 
else{
    
}

//Deduct 21 rupees from credit card


}

?>


