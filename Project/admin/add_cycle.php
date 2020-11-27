<html>
<head>
    <title>Smart Cycle</title>
</head>
<body>
    <?php
        $message = "";
        include_once $_SERVER['DOCUMENT_ROOT']."/modules/admin/add_cycle.php"; 
    ?>
    <?php echo $message; ?>
    <form id="add-cycle-form" class="form" method="POST">
        Cycle Number: <input type="text" name="cycle_number" required><br>
        Stand Name: <input type="text" name="stand_name" required><br>
        Station Name: <input type="text" name="station_name" required><br>
        <input type="submit" name="add-cycle-submit" value="Add">
    </form>
</body>
</html>