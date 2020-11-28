<html>

<head>
    <title>Smart Cycle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
        $message = "";
        include_once $_SERVER['DOCUMENT_ROOT']."/modules/admin/add_station.php";
    ?>
    <?php echo $message; ?>
    <div class="container">
        <h2 style="color: blue">ADD STATION</h2>
        <form class="form-horizontal" id="add-stand-form" action="" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-2">Station Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="station_name" placeholder="station name" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="add-station-submit" value="Add" class="btn btn-default">Add Station</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>