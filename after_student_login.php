<?php

    ob_start();
    session_start();
    if($_SESSION['name_e']!="showrab"){
        header('location: std_login.php');
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
        <link rel="stylesheet" href="css/after_student_login.css">
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
        <div class="header1">
            <h1><u>YOUR PROFILE</u></h1>
        </div>
        <div class="form1">
            <div class="form">
                <form action="" method="post">
                    <table>
                        <?php echo '<img src="'.$_SESSION["img"].'" class="img">';?>
                        
                        <tr>
                            <th>Name: </th>
                            <td><?php echo $_SESSION['name']; ?></td>
                        </tr>
                        <tr>
                            <th>ID: </th>
                            <td><?php echo $_SESSION['id'];?></td>
                        </tr>
                        <tr>
                            <th>Age: </th>
                            <td><?php echo $_SESSION['age'];?></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td><?php if($_SESSION['gender']==1){echo "Male";} else{echo "Female";}?></td>
                        </tr>
                        <tr>
                            <th>Department: </th>
                            <td><?php echo $_SESSION['dept'];?></td>
                        </tr>
                        <tr>
                            <th>Phone number: </th>
                            <td><?php echo $_SESSION['phone'];?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $_SESSION['email'];?></td>
                        </tr>
                        <tr><td><h1><u>RESULT</u></h1></td></tr>
                        <tr>
                            <th>Level-1,Term-1 : </th>
                            <td><?php echo  $_SESSION['l1t1'];?></td>
                        </tr>
                        <tr>
                            <th>Level-1,Term-2 : </th>
                            <td><?php echo  $_SESSION['l1t2'];?></td>
                        </tr>
                        <tr>
                            <th>Level-2,Term-1 : </th>
                            <td><?php echo  $_SESSION['l2t1'];?></td>
                        </tr>
                        <tr>
                            <th>Level-2,Term-2 : </th>
                            <td><?php echo  $_SESSION['l2t2'];?></td>
                        </tr>
                        <tr>
                            <th>Level-3,Term-1 : </th>
                            <td><?php echo  $_SESSION['l3t1'];?></td>
                        </tr>
                        <tr>
                            <th>Level-3,Term-2 : </th>
                            <td><?php echo  $_SESSION['l3t2'];?></td>
                        </tr>
                        <tr>
                            <th>Level-4,Term-1 : </th>
                            <td><?php echo  $_SESSION['l4t1'];?></td>
                        </tr>
                        <tr>
                            <th>Level-4,Term-2 : </th>
                            <td><?php echo  $_SESSION['l4t2'];?></td>
                        </tr>
                    </table>

                </form>
            </div>
        </div>
        <div class="footer">
            <a href="std_change_password.php">Change Password</a><br>
            <a href="std_logout.php">logout</a>
        </div>
        <div class="final">
            
        </div>
        
    </body>
</html>

