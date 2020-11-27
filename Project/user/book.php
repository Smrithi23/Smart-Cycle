<html>

<head>
    <title>Smart Cycle</title>
</head>

<body>
    <?php
        $message = "";
        include_once $_SERVER['DOCUMENT_ROOT']."/modules/user/book.php";
    ?>
    <h1>RENT A CYCLE</h1>
    <?php echo $message ?>
    <form id="book-form" class="form" method="POST" action="">
        Cycle Number: <input type="number" name="cycle_number" required><br>
        Card number: <input type="number" name="card_number" required><br>
        Exp month: 
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
        </select><br>
        Exp year: 
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
        </select><br>
        CVV: <input type="number" name="cvv" required><br>
        <input type="submit" name="book-submit" value="Book">
    </form>
</body>

</html>