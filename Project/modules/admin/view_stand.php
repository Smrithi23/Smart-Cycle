<?php

    ini_set('memory_limit', '-1');
    require $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

   // $sql = "SELECT cycle_number, availability, station_name, stand_name FROM Cycle join Stand join Station";
    $getCycleNo = "SELECT stand_id, stand_name, station_name, no_of_cycles FROM Stand INNER JOIN Station on Stand.station_id = Station.station_id";
    $result = (mysqli_query($conn,$getCycleNo)) or die(mysqli_error($conn));

    echo "<table>";
    echo "<tr>
            <th>S.No.</th>
            <th>Stand name</th>
            <th>Station name</th>
            <th>No of cycles</th>
        </tr>";
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {   
        echo "<tr>";
        echo "<td>". $row[0] . "</td>";
        echo "<td>". $row[1] . "</td>";
        echo "<td>". $row[2] . "</td>";
        echo "<td>". $row[3] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
?>
