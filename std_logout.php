<?php

    session_start();
    session_destroy();
    header('location: std_login.php');
    
?>
<?php
include('config.php');
?>


