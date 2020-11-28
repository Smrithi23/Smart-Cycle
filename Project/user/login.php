<html>

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
    <?php 
        $message = "";
        include_once $_SERVER['DOCUMENT_ROOT']."/modules/user/login.php";
        include_once $_SERVER['DOCUMENT_ROOT']."/user/css/style.php";
    ?>
    <div class="container">
        <form class="form-horizontal" id="login-form" action="" method="POST">
            <div>
                <h2 class="form-header">User Login</h2>
            </div>
            <div class="input-wrapper">
                <div class="inside-wrapper">
                    <?php echo $message; ?>
                </div>
            </div>
            <div class="input-wrapper">
                <div class="inside-wrapper">
                    <label>Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                </div>
            </div>
            <div class="input-wrapper">
                <div class="inside-wrapper">
                    <label>Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                </div>
            </div>
            <div class="input-wrapper">
                <button class="inside-wrapper btn btn-default" type="submit" name="login-submit" value="Login">Login</button>
            </div>
            <a href="/user/register.php" class="input-wrapper link">Not yet registered?</a>
        </form>
    </div>
</body>

</html>