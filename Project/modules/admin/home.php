<?php

    ini_set('memory_limit', '-1');
    require $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

   // $sql = "SELECT cycle_number, availability, station_name, stand_name FROM Cycle join Stand join Station";
    $sql = "SELECT COUNT(*) AS num FROM Cycle";
    $res = mysqli_fetch_assoc(mysqli_query($conn,$sql));

    $total_cycles = $res["num"];

    $sql = "SELECT COUNT(*) AS num FROM Cycle WHERE availability = '1'";
    $res = mysqli_fetch_assoc(mysqli_query($conn,$sql));

    $available_cycles = $res["num"];

    $sql = "SELECT COUNT(*) AS num FROM Cycle WHERE availability = '0'";
    $res = mysqli_fetch_assoc(mysqli_query($conn,$sql));

    $unavailable_cycles = $res["num"];

    $sql = "SELECT COUNT(*) AS num FROM Stand";
    $res = mysqli_fetch_assoc(mysqli_query($conn,$sql));

    $stand = $res["num"];

    $sql = "SELECT COUNT(*) AS num FROM Station";
    $res = mysqli_fetch_assoc(mysqli_query($conn,$sql));

    $station = $res["num"];
    

    echo "<table>";
    echo "<tr>
            <td>Total No. of Cycles</td>
            <td>".$total_cycles."</td>
        </tr>";
    echo "<tr>
            <td>Available Cycles</td>
            <td>".$available_cycles."</td>
        </tr>";
    echo "<tr>
            <td>Cycles in use</td>
            <td>".$unavailable_cycles."</td>
        </tr>";
    echo "<tr>
            <td>No. of Stations</td>
            <td>".$station."</td>
        </tr>";
    echo "<tr>
            <td>No. of Stands</td>
            <td>".$stand."</td>
        </tr>";
    echo "</table>";

    $sql = "SELECT User.user_id, username, cycle_number, start_datetime FROM Cycle_Usage INNER JOIN User ON Cycle_Usage.user_id = User.user_id";
    $result = (mysqli_query($conn,$sql));

    echo "<table>";
    echo "<tr>
            <th>S.No</th>
            <th>User ID</th>
            <th>Username</th>
            <th>Cycle Number</th>
            <th>Start Date and Time</th>
        </tr>";
    $index = 1;
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {   
        echo "<tr>";
        echo "<td>". $index . "</td>";
        echo "<td>". $row[0] . "</td>";
        echo "<td>". $row[1] . "</td>";
        echo "<td>". $row[2] . "</td>";
        echo "<td>". $row[3] . "</td>";
        echo "</tr>";
        $index = $index + 1;
    }
    echo "</table>";
?>
