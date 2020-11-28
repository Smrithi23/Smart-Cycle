<html>

<head>
    <title>Rent Cycle</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .container {  width: 40%; padding-top: 10%; font-size: 17px }
        .btn {background-color: #6495ED; font-size: 20px; color: #ADD8E6; width: 120	}
        </style>
</head>

<body>

    <?php
        $message = "";
        include_once $_SERVER['DOCUMENT_ROOT']."/Smart-Cycle/Project/modules/user/book.php";
    ?>


<div class="container">
  <h2 style="color: blue">RENT A CYCLE</h2>
  <form class="form-horizontal" id="book-form" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2">Cycle Number</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="cycle_number" placeholder="cycle number" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Card-Number:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="card_number" placeholder="card number" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Exp Month:</label>
      <div class="col-sm-10">          
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
    <div class="form-group">
      <label class="control-label col-sm-2">Exp Year:</label>
      <div class="col-sm-10">
     
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
    <div class="form-group">
      <label class="control-label col-sm-2">cvv:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="cvv" placeholder="cvv"required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="book-submit" value="book" class="btn btn-default">Rent</button>
      </div>
    </div>
  </form>
  <?php echo $message ?>
</div>

    
</body>

</html>