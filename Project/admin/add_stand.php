<html>
<head>
    <title>Smart Cycle</title>
</head>
<body>
    <?php
        $message = "";
        include_once $_SERVER['DOCUMENT_ROOT']."/modules/admin/add_stand.php";
    ?>
    <?php echo $message; ?>
    <form id="add-stand-form" class="form" method="POST">
        Stand Name: <input type="text" name="stand_name" required><br>
        Station Name: <input type="text" name="station_name" required><br>
        <input type="submit" name="add-stand-submit" value="Add">
    </form>
</body>
</html>