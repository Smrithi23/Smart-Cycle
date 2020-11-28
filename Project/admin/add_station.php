<html>
<?php
    session_start();
    session_regenerate_id();
    if(!$_SESSION["admin"]) {
        header("Location: /admin/login.php");
    }
?>
<head>
    <title>Smart Cycle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <?php header("Content-Type: text/html; charset=ISO-8859-1"); ?>
</head>

<body>
    <div class="page-header">
       <h1>Smart Cycle Management</h1>
    </div>
    <nav>
        <a href="/admin/home.php"><button>Back</button></a>
    </nav>
    <?php
        $message = "";
        include_once $_SERVER['DOCUMENT_ROOT']."/modules/admin/add_station.php";
        include_once $_SERVER['DOCUMENT_ROOT']."/admin/css/style.php";
    ?>
    <div class="container">
        <form class="form-horizontal" id="add-stand-form" method="POST">
            <div>
                <h2 class="form-header">Add Station</h2>
            </div>
            <div class="input-wrapper">
                <div class="inside-wrapper">
                    <?php echo $message; ?>
                </div>
            </div>
            <div class="input-wrapper">
                <div class="inside-wrapper">
                    <label>Station Name</label>
                    <input type="text" class="form-control" name="station_name" placeholder="Enter station name" required>
                </div>
            </div>
            <div class="input-wrapper">
                <button class="inside-wrapper btn btn-default" type="submit" name="add-station-submit" value="Add">Add Station</button>
            </div>
        </form>
    </div>
</body>

</html>