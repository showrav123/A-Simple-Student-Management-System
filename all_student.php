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
        <link rel="stylesheet" href="css/all_student.css">
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
        <div class="h1">
            <h1>Welcome to Admin Panel</h1>
            <a href="after_admin_login.php">Back</a>
        </div>
        
        <hr>
        <div class="content">
            <div class="bar">
                <ul>
                    
                    <li><a href="all_student.php">See all student's</a></li>
                    <li><a href="insert_student.php">Add a new student</a> </li>
                    <li><a href="mng_std.php">Manage student information</a></li>
                    <li><a href="a_change.php">Change Admin Password</a></li>
                    <li><a href="logout.php">logout</a></li>
                    

                </ul>
            </div>
            <div class="main_content">
                 <form>
                    <table cellpadding="10">
                        <tr>
                            <th>Name</th>
                            <th>ID</th>
                            <th>Age</th>
                            <th>Department</th>
                            <th>Phone</th>

                        </tr>
                        <?php
                            $query="select * from tbl_studemt";
                            
                            $result=  mysqli_query($connection, $query);
                           
                           
                            
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <tr>
                                <td><?php echo $row['std_name']?></td>
                                <td><?php echo $row['std_id']?></td>
                                <td><?php echo $row['std_age']?></td>
                                <td><?php echo $row['std_dept']?></td>
                                <td><?php echo $row['std_phone']?></td>
                               </tr>
                        <?php
                            }
                        ?>

                    </table>
                </form>
            </div>
        </div>
    </body>
</html>

