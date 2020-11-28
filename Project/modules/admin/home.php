<?php
<<<<<<< HEAD
    include'styles.css';
=======
    require $_SERVER['DOCUMENT_ROOT'].'/Smart-Cycle/Project/config/config.php';
>>>>>>> origin/paavai

    ini_set('memory_limit', '-1');
    require $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

   // $sql = "SELECT cycle_number, availability, station_name, stand_name FROM Cycle join Stand join Station";
    $getCycleNo = "SELECT station_name, stand_name, no_of_cycles FROM Stand INNER JOIN Station on Stand.station_id = Station.station_id";
    $result = (mysqli_query($conn,$getCycleNo)) or die(mysqli_error($conn));

    echo "<table>";
    echo "<tr>
            <td> <h4> Station name</h4> </td>
            <td> <h4>Stand name</h4> </td> 
            <td> <h4>  No of cycles</h4> </td>
        </tr>";
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {   
        echo "<tr>";
        echo "<td>". $row[0] . "</td>";
        echo "<td>". $row[1] . "</td>";
        echo "<td>". $row[2] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
?>
