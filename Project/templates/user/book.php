<html>

<head>
    <title>Smart Cycle</title>
</head>

<body>
    <?php include_once "../../modules/user/book.php"; ?>
    <h1>RENT A CYCLE</h1>
    <form id="book-form" class="form" method="POST" action="">
        Cycle Number: <input type="number" name="cycle_number"><br>
        Card number: <input type="number" name="card_number"><br>
        Exp month: <input type="number" name="exp_month"><br>
        Exp year: <input type="number" name="exp_year"><br>
        CVV: <input type="number" name="cvv"><br>
        <input type="submit" name="submit" value="submit">

    </form>
</body>

</html>