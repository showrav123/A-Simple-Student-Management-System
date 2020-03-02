<?php
    include('config.php');
    if(isset($_POST['a_form'])){
        try{
            if(empty($_POST['a_username'])){
                throw new Exception("User name cannot be empty");
            }
            if(empty($_POST['a_password'])){
                throw new Exception("Password cannot be empty");
            }
            
            $result=  mysqli_query($connection,"select * from tbl_admin where a_username='$_POST[a_username]' and a_password='$_POST[a_password]'" );
            $num= mysqli_num_rows($result);
            if($num>0)
            {
                session_start();
                $_SESSION['name']="ashik";
                header('location: after_admin_login.php');
            }
            else{
                throw new Exception("Invalid username or password");
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
         <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <div>
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
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Gallery</a></li>
                    <li><a href="">Department</a></li>
                    <li><a href="">Faculty</a></li>
                    <li><a href="">Baiust-Club</a></li>
                    <li><a href="std_login.php">Student Login</a></li>
                    <li><a href="login.php">Admin Panel</a></li>
                </ul>
            </div>
            <div class="std">    
                <h1>Admin login</h1>
            </div>
            <hr>
            <div class="loginBox">
                <?php
                   if(isset($error_messege)){
                       echo $error_messege;
                   }
                ?>
                <br/>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>Username: </td>333.
                            
                            
                            q
                            <td><input type="text" name="a_username"></td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td><input type="password" name="a_password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="a_form" value="login"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
