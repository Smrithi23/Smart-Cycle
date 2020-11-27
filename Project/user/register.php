<html>

<head>
    <title>Smart Cycle</title>
</head>

<body>
    <?php include_once "../modules/user/register.php"; ?>
    <h1>REGISTER</h1>
    <form id="register-form" class="form" method="POST" action="">
        Username: <input type="text" name="username"><br>
        First Name: <input type="text" name="first_name"><br>
        Last Name: <input type="text" name="last_name"><br>
        Phone Number: <input type="tel" name="phone_number"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>