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
        require $_SERVER['DOCUMENT_ROOT']."/modules/admin/login.php";
    ?>
    <?php echo $message; ?>
    <div class="container">
        <h2 style="color: blue">ADMIN LOGIN</h2>
        <form class="form-horizontal" id="login-form" action="" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-2">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" placeholder="username" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="password" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="login-submit" value="Login" class="btn btn-default">Log-In</button>
                </div>
            </div>
        </form>
    </div>


</body>

</html>