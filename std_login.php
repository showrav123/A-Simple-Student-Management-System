<?php
   include('config.php');
    if(isset($_POST['std_login'])){
        try{
            if(empty($_POST['std_id'])){
                throw new Exception("Username can not be empty");
            }
            if(empty($_POST['password'])){
                throw new Exception("Password cannot be empty");
            }
            $result=  mysqli_query($connection,"select * from tbl_studemt where std_id='$_POST[std_id]' and password='$_POST[password]'" );
            $num=  mysqli_num_rows($result);
            if($num>0){
                session_start();
                $row=  mysqli_fetch_assoc($result);
                $_SESSION['name_e']="showrab";
                $_SESSION['name']=$row['std_name'];
                $_SESSION['id']=$row['std_id'];
                $_SESSION['age']=$row['std_age'];
                $_SESSION['gender']=$row['gender'];
                $_SESSION['dept']=$row['std_dept'];
                $_SESSION['phone']=$row['std_phone'];
                $_SESSION['email']=$row['email'];
                $_SESSION['img']=$row['imglink'];
                $_SESSION['l1t1']=$row['l1t1'];
                $_SESSION['l1t2']=$row['l1t2'];
                $_SESSION['l2t1']=$row['l2t1'];
                $_SESSION['l2t2']=$row['l2t2'];
                $_SESSION['l3t1']=$row['l3t1'];
                $_SESSION['l3t2']=$row['l3t2'];
                $_SESSION['l4t1']=$row['l4t1'];
                $_SESSION['l4t2']=$row['l4t2'];
                header('location: after_student_login.php');
            }
            else{
                throw new Exception("Invalid username or password");
            }
            
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
        <link rel="stylesheet" href="css/std_login.css">
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
            <h1 style="text-align: center">Student login</h1>
            </div>
            <hr>
         <div class="loginBox">
        

            <p class="error"> <?php
             if(isset($error_messege)){echo $error_messege;}
             ?></p>
             <img src="img/user.png" class="user">
             <h2>Log in here</h2>
             <form action="" method="post">
                 <table>
                     <tr>
                         <td>Username:   </td>
                         <td><input type="text" name="std_id"></td>
                     </tr>
                     <tr>
                         <td>Password:   </td>
                         <td><input type="password" name="password"></td>
                     </tr>
                     <tr>
                         <td></td>
                         <td><input type="submit" name="std_login" value="Login"></td>
                     </tr>
                 </table>
             </form>
        </div>
            <div class="footer">
                
            </div>
        </div>
    </body>
</html>


