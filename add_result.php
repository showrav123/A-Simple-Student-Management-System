<?php

    ob_start();
    session_start();
    if($_SESSION['name']!="ashik"){
        header('location: login.php');
    }
?>
    
<?php
    include('config.php');
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/add_result.css">
        
        
    </head>
    <body>
        <div class="header">
                <div class="logo">
                    <img src="img/logo.gif">
                </div>
                <div class="name">
                    <h1>Bangladesh Army International University of Science & Technology</h1>
                    <p>Comilla Cantonment, Comilla.</p>
                    
                </div>
        </div>
        
         <div class="nav">
                <ul>
                    <li><a href="l1t1.php">Level-1,Term-1</a></li>
                    <li><a href="l1t2.php">Level-1,Term-2</a></li>
                    <li><a href="l2t1.php">Level-2,Term-1</a></li>
                    <li><a href="l2t2.php">Level-2,Term-2</a></li>
                    <li><a href="l3t1.php">Level-3,Term-1</a></li>
                    <li><a href="l3t2.php">Level-3,Term-2</a></li>
                    <li><a href="l4t1.php">Level-4,Term-1</a></li>
                    <li><a href="l4t2.php">Level-4,Term-2</a></li>
                </ul>
            </div>
        <div class="content">
            <div class="header_content">
                <h1>Add Result</h1>
                <hr>
               
            </div>
            
            <p><a href="after_admin_login.php">Back to previous page</a></p><br>
            <a href="logout.php">logout</a>
        </div>
    </body>
</html>




