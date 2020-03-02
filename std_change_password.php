<?php

    ob_start();
    session_start();
    if($_SESSION['name_e']!="showrab"){
        header('location: std_login.php');
    }
?>
<?php
    $hostname='localhost';
    $username='root';
    $password='';
    $dbname='db_std';
    $connection=mysqli_connect($hostname, $username, $password);
    if($connection){
        //echo 'server connected';
        $dbselect=mysqli_select_db($connection,$dbname);
        if($dbselect){
           //echo "database connected";
        }
        else{
            die("database not connected".mysqli_error($dbselect));
        }
    }
    else{
        die("server not connected".mysqli_error($connection));
    }
if(isset($_POST['u_std_password'])){
    try{
        if(empty($_POST['old_std_password'])){
            throw new Exception("Old password cannot be empty");
        }
        if(empty($_POST['new_std_password'])){
            throw new Exception("New password cannot be empty");
        }
        if(empty($_POST['c_new_std_password'])){
            throw new Exception("Confirm password cannot be empty");
        }
       
        $result= mysqli_query($connection, "select * from tbl_studemt where password='$_POST[old_std_password]'");
        $num= mysqli_num_rows($result);
        if($num==FALSE){
            throw new Exception("OLd password does not match");
        }
        if($_POST['new_std_password']!=$_POST['c_new_std_password']){
            throw new Exception("New password does not match");
        }
       
        $result= mysqli_query($connection, "update tbl_studemt set password='$_POST[new_std_password]' where std_id='$_SESSION[id]'");
        $success_mesege="Password update succesfully";
    }
 catch (Exception $e){
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
        <link rel="stylesheet" href="css/std_change_password.css">
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
        <div class="container">
            <div class="word">
                <h1>Change Your Password</h1>
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
            <div class="content">
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>Old Password: </td>
                            <td><input type="password" name="old_std_password"></td>
                        </tr>
                        <tr>
                            <td>New password: </td>
                            <td><input type="password" name="new_std_password"></td>
                        </tr>
                        <tr>
                            <td>Confirm New password: </td>
                            <td><input type="password" name="c_new_std_password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Update" name="u_std_password"></td>
                        </tr>
                    </table>
                </form>
                <p><a href="after_student_login.php">Back to previous page</a></p>
                <a href="std_logout.php">Logout</a>
            </div>
        </div>
    </body>
</html>

