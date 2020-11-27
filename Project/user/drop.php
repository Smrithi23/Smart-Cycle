<html>

<head>
    <title>Smart Cycle</title>
</head>

<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/modules/user/drop.php"; ?> 
    <h1>DROP CYCLE</h1>
    <h3>CYCLE NO:</h3>
    <form id="drop-form" class="form" method="POST" action="">
        Station Name: <input type="text" name="station_name" required><br>
        Stand Name: <input type="text" name="stand_name" required><br>
        <input type="submit" name="drop-submit" value="Submit" required>
    </form>
</body>

</html>