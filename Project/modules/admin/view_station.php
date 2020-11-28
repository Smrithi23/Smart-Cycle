<?php

    ini_set('memory_limit', '-1');
    require $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

   // $sql = "SELECT cycle_number, availability, station_name, stand_name FROM Cycle join Stand join Station";
    $getCycleNo = "SELECT station_name FROM Station";
    $result = (mysqli_query($conn,$getCycleNo)) or die(mysqli_error($conn));

    echo "<table>";
    echo "<tr>
            <th>S.No</th>
            <th>Station Name</th>
        </tr>";
    $index = 1;
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {   
        echo "<tr>";
        echo "<td>". $index . "</td>";
        echo "<td>". $row[0] . "</td>";
        echo "</tr>";
        $index = $index + 1;
    }
    echo "</table>";
?>
