<html>

<head>
    <title>Smart Cycle</title>
</head>

<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/smart-cycle/Smart-cycle/Project/modules/user/book.php"; ?>
    <h1>RENT A CYCLE</h1>
    <form id="book-form" class="form" method="POST" action="">
        Cycle Number: <input type="number" name="cycle_number" required><br>
        Card number: <input type="number" name="card_number" required><br>
        Exp month: <input type="number" name="exp_month" required><br>
        Exp year: <input type="number" name="exp_year" required><br>
        CVV: <input type="number" name="cvv" required><br>
        <input type="submit" name="submit" value="submit">

    </form>
</body>

</html>