<html>

<head>
    <title>Smart Cycle</title>
</head>

<body>
    <?php include_once "../modules/user/login.php" ?>
    <h1>LOGIN</h1>
    <?php echo $message ?>
    <form id="login-form" class="form" method="POST">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" name="login-submit" value="Login">
    </form>
</body>

</html>