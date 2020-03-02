<?php
    ob_start();
    session_start();
    if($_SESSION['name']!="ashik"){
        header('location: login.php');
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
if(isset($_POST['u_password'])){
    try{
        if(empty($_POST['old_password'])){
            throw new Exception("Old password cannot be empty");
        }
        if(empty($_POST['new_password'])){
            throw new Exception("New password cannot be empty");
        }
        if(empty($_POST['c_new_password'])){
            throw new Exception("Confirm password cannot be empty");
        }
       
        $result= mysqli_query($connection, "select * from tbl_admin where a_password='$_POST[old_password]'");
        $num= mysqli_num_rows($result);
        if($num==FALSE){
            throw new Exception("OLd password does not match");
        }
        if($_POST['new_password']!=$_POST['c_new_password']){
            throw new Exception("New password does not match");
        }
       
        $result= mysqli_query($connection, "update tbl_admin set a_password='$_POST[new_password]' where id=1");
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
        <link rel="stylesheet" href="css/a_change.css">
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
                <h1>Change admin Password</h1>
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
                            <td><input type="password" name="old_password"></td>
                        </tr>
                        <tr>
                            <td>New password: </td>
                            <td><input type="password" name="new_password"></td>
                        </tr>
                        <tr>
                            <td>Confirm New password: </td>
                            <td><input type="password" name="c_new_password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Update" name="u_password"></td>
                        </tr>
                    </table>
                </form>
            
            <p><a href="after_admin_login.php">Back to previous page</a></p>
            <a href="logout.php">logout</a>
            </div>
        </div>
    </body>
</html>

