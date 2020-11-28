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
    <div class="page-header">
       <h1>Smart Cycle Management</h1>
    </div>
    <nav>
        <a href="/user/home.php"><button>Back</button></a>
    </nav>
    <?php
        $message = "";
        include_once $_SERVER['DOCUMENT_ROOT']."/modules/user/book.php";
        include_once $_SERVER['DOCUMENT_ROOT']."/user/css/style.php";
    ?>
    <div class="container">
        <form class="form-horizontal" id="book-form" action="" method="POST">
            <div>
                <h2 class="form-header">Rent a cycle</h2>
            </div>
            <div class="input-wrapper">
                <div class="inside-wrapper">
                    <?php echo $message; ?>
                </div>
            </div>
            <div class="input-wrapper">
                <div class="inside-wrapper">
                    <label>Cycle Number</label>
                    <input type="number" class="form-control" name="cycle_number" placeholder="Enter cycle number" required>
                </div>
            </div>
            <div class="input-wrapper">
                <div class="inside-wrapper">
                    <label>Card Number</label>
                    <input type="number" class="form-control" name="card_number" placeholder="Enter card number" required>
                </div>
            </div>
            <div class="input-wrapper">
                <div class="inside-wrapper">
                    <label>Exp Month</label>
                    <select name="exp_month" id="exp_month">
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
            </div>
            <div class="input-wrapper">
                <div class="inside-wrapper">
                    <label>Exp Year</label>
                    <select name="exp_year" id="exp_year">
                        <option value="2020">20</option>
                        <option value="2021">21</option>
                        <option value="2022">22</option>
                        <option value="2023">23</option>
                        <option value="2024">24</option>
                        <option value="2025">25</option>
                        <option value="2026">26</option>
                        <option value="2027">27</option>
                        <option value="2028">28</option>
                        <option value="2029">29</option>
                        <option value="2030">30</option>
                        <option value="2031">31</option>
                        <option value="2032">32</option>
                        <option value="2033">33</option>
                        <option value="2034">34</option>
                        <option value="2035">35</option>
                        <option value="2036">36</option>
                        <option value="2037">37</option>
                        <option value="2038">38</option>
                        <option value="2039">39</option>
                        <option value="2040">40</option>
                    </select>
                </div>
            </div>
            <div class="input-wrapper">
                <div class="inside-wrapper">
                    <label>cvv</label>
                    <input type="number" class="form-control" name="cvv" placeholder="Enter cvv" required>
                </div>
            </div>
            <div class="input-wrapper">
                <button class="inside-wrapper btn btn-default" type="submit" name="book-submit" value="book">Rent</button>
            </div>
        </form>
    </div>
</body>

</html>