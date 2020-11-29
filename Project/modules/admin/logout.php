<?php
    if(isset($_POST['logout-submit'])) {
        session_destroy();
        header('Location: /admin/login.php');
    }
?>