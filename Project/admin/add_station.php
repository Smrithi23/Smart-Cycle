<html>
<head>
    <title>Smart Cycle</title>
</head>
<body>
    <?php
        $message = "";
        include_once $_SERVER['DOCUMENT_ROOT']."/modules/admin/add_station.php";
    ?>
    <?php echo $message; ?>
    <form id="add-station-form" class="form" method="POST">
        Station Name: <input type="text" name="station_name" required><br>
        <input type="submit" name="add-station-submit" value="Add">
    </form>
</body>
</html>