<?php
   echo $_SERVER['REQUEST_URI'];
   var_dump($_SERVER);
   if ($_SERVER['REQUEST_URI'] === '/') {
      include_once "../templates/user/login.php";
   }
?>
