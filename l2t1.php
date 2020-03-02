<?php

    ob_start();
    session_start();
    if($_SESSION['name']!="ashik"){
        header('location: login.php');
    }
?>
    
<?php
    include('config.php');
    
    
    if(isset($_POST['insert'])){
        try{
            if(empty($_POST['std_id'])){
                throw new Exception("ID cannot be empty");
            } 
            $id=$_POST['std_id'];
            $result=("update tbl_studemt set l2t1='$_POST[l2t1]' where std_id='$id'");
            if(mysqli_query($connection, $result)){
                
                $success_mesege="Data has been saved succesfully";
            }
            else{
               die('query problem'.mysqli_error($connection)); 
            }
           
        }
        catch(Exception $e){
            $error_messege=$e->getMessage();
     
 }
    }
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
                <?php 
                    if(isset($error_messege)){
                        echo $error_messege;
                    }
                    if(isset($success_mesege)){
                        echo $success_mesege;
                    }
                ?>
            </div>
                <div class="form">
                    <form action="" method="post">
                        <table>

                            <tr>
                                <td>Student ID</td>
                                <td><input type="text" name="std_id"></td>
                            </tr>
                             <tr>
                                <td>Level-2,Term-1 :</td>
                                <td><input type="text" name="l2t1"></td>
                            </tr>
                             <tr>
                                <td></td>
                                <td><input type="submit" name="insert" value="submit"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            
            
            <p><a href="add_result.php">Back to previous page</a></p><br>
            <a href="logout.php">logout</a>
        </div>
    </body>
</html>



