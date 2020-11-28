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
    <h1>ADMIN<h1>
            <nav>
                <a href="/admin/add_cycle.php"><button>Add cycle </button></a>
                <a href="/admin/add_station.php"><button>Add station </button></a>
                <a href="/admin/add_stand.php"><button>Add stand </button></a>
            </nav>
            <br>
            <br>
            <h2>Cycle availability</h2>
            <?php include_once $_SERVER['DOCUMENT_ROOT']."/modules/admin/home.php";
    // $result = $_SESSION['result'];
    // print_r($result);
    ?>


</body>

</html>