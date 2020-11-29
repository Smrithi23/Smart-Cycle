<?php
    if(isset($_POST['logout-submit'])) {
        session_destroy();
        header('Location: /user/login.php');
    }
?>