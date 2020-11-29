<html>
<?php
    session_start();
    session_regenerate_id();
    if(!$_SESSION["authenticated"]) {
        header("Location: /user/login.php");
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
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/modules/user/logout.php"; ?>
    <div class="page-header">
       <h1>Smart Cycle Management</h1>
       <form class="logout" method="POST">
            <button type="submit" name="logout-submit">Logout</button>
       </form>
    </div>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT']."/modules/user/home.php";
        include_once $_SERVER['DOCUMENT_ROOT']."/user/css/style.php";
    ?>
</body>

</html>