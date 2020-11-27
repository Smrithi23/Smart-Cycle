<?php
    require '../../config/config.php';

    $sql = "SELECT cycle_number, availability, station_name, stand_name FROM Cycle natural join Stand natural join Station";

    $result = $con->query($sql);

    $con->close();
?>
