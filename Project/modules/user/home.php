<?php
    require $_SERVER['DOCUMENT_ROOT']."/config/config.php";

    // Check if entered credentials are correct

    // QUERY - Get list of cycles available
    // $availableCycles = "SELECT cycle_number
    // FROM Cycle 
    // WHERE availability = True";

    // $username = $_SESSION['username'];
    // echo '<br> <h2> Hello '. $username . '</h2><br>';

    $getUserId = "SELECT user_id FROM User WHERE user_id = 3";
    $res = mysqli_fetch_assoc(mysqli_query($conn, $getUserId));
    $user_id = $res["user_id"];

    $sql = "SELECT COUNT(*) AS num FROM Cycle_Usage WHERE user_id = '$user_id'";
    $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $num = $res["num"];

    if($num==0) { 
        echo "<a href = '/user/book.php'><button>Book</button></a><br><br>"; 
    } 
    else { 
        echo "<a href = '/user/drop.php'><button>Drop</button></a><br><br>";
    }


    $getCycleNo = "SELECT station_name, stand_name, no_of_cycles FROM Stand INNER JOIN Station ON Stand.station_id = Station.station_id";
    $result = (mysqli_query($conn,$getCycleNo)) or die(mysqli_error($conn));

    echo "<table>";
    echo "<tr>
            <td><h4>Station name</h4></td><td><h4>Stand name</h4></td><td><h4>No of cycles</h4></td></tr>";
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {   
        echo '<tr>';
        echo '<td>'. $row[0] . '</td>';
        echo '<td>'. $row[1] . '</td>';
        echo '<td>'. $row[2] . '</td>';
        echo '</tr>';
    }  
    echo "</table>";
?>


