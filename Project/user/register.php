<html>

<head>
    <title>Smart Cycle</title>
</head>

<body>
    <?php
        $message = "";
        $error = "";
        include_once $_SERVER['DOCUMENT_ROOT']."/modules/user/register.php";
    ?>
    <h1>REGISTER</h1>
    <?php
        echo $message;
    ?>
    <form id="register-form" class="form" method="POST" action="">
        Username: <input type="text" name="username" required><br>
        First Name: <input type="text" name="first_name" required><br>
        Last Name: <input type="text" name="last_name" required><br>
        Phone Number: <input type="tel" name="phone_number" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" name="register-submit" value="Register">
    </form>
</body>

</html>