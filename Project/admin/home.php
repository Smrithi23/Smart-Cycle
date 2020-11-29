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
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/modules/admin/logout.php"; ?>
    <div class="page-header">
       <h1>Smart Cycle Management</h1>
       <form class = "logout" method="POST">
            <button type="submit" name="logout-submit">Logout</button>
       </form>
    </div>
    <nav>
        <a href="/admin/view_cycle.php"><button>View cycle </button></a>
        <a href="/admin/view_station.php"><button>View station </button></a>
        <a href="/admin/view_stand.php"><button>View stand </button></a>
        <a href="/admin/add_cycle.php"><button>Add cycle </button></a>
        <a href="/admin/add_station.php"><button>Add station </button></a>
        <a href="/admin/add_stand.php"><button>Add stand </button></a>
    </nav>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/modules/admin/home.php";
        include_once $_SERVER['DOCUMENT_ROOT']."/admin/css/style.php";
    ?>
</body>

</html>