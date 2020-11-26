<?php
//   use Auth\Login;
   
//    if ($_SERVER['REQUEST_URI'] === '/authentication') {
//       $result = Login($_REQUEST['username'], $_REQUEST['password']);
//       include_once "../Templates/Auth/login_results.php";
//    }
    include_once "../config.php";
    if ($result = mysqli_query($con, "SELECT * FROM Persons")) {
        echo "Returned rows are: " . mysqli_num_rows($result);
        // Free result set
        mysqli_free_result($result);
    }
?>
