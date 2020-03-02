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
        <link rel="stylesheet" href="css/after_admin_login.css">
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
        <div class="h1"><h1>Welcome to Admin Panel</h1></div>
        <hr>
        <div class="content">
            <div class="bar">
                <ul>
                    <li><a href="all_student.php">See all student's</a></li>
                    <li><a href="insert_student.php">Add a new student</a> </li>
                    <li><a href="add_result.php">Add Result</a> </li>
                    <li><a href="mng_std.php">Manage student information</a></li>
                    <li><a href="a_change.php">Change Admin Password</a></li>
                    <li><a href="logout.php">logout</a></li>
                    

                </ul>
            </div>
            <div class="main_content">
                <form action="after_admin_login.php" method="post">
                    <div class="serchbar">
                        <label>Search By Student ID</label>
                        <input type="text" name="search">
                        <button name="btn">Search</button>
                    </div>
                    <div class="after_search">
                        <table cellpadding="10">
                        
                        <?php
                        if(empty($_POST['search'])){
                            
                        }
                        else if(isset($_POST['btn'])){
    
                            

                            $query="select * from tbl_studemt where std_id like '%$_POST[search]'";
                            
                            
                            $result=  mysqli_query($connection, $query);
                           
                           
                            
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <?php echo '<img src="'.$row["imglink"].'" class="img">';?>
                                <tr>
                                    <th>Name: </th>
                                    <td><?php echo $row['std_name']?></td>
                                
                               </tr>
                               <tr>
                                    <th>ID: </th>
                                    <td><?php echo $row['std_id']?></td>
                                
                               </tr>
                               <tr>
                                    <th>Age: </th>
                                    <td><?php echo $row['std_age']?></td>
                                
                               </tr>
                               <tr>
                                    <th>Gender</th>
                                    <td><?php if($row['gender']==1){echo "Male";} else{echo "Female";}?></td>
                                </tr>
                                <tr>
                                    <th>Department: </th>
                                    <td><?php echo $row['std_dept']?></td>
                                
                               </tr>
                               <tr>
                                    <th>Phone: </th>
                                    <td><?php echo $row['std_phone']?></td>
                                
                               </tr>
                               <tr>
                                    <th>Email: </th>
                                    <td><?php echo $row['email']?></td>
                                
                               </tr>
                               
                               <tr>
                                    <th>Results</th>
                                    <td></td>
                                
                               </tr>
                               <tr>
                                    <th>Level-1, Term-1: </th>
                                    <td><?php echo $row['l1t1']?></td>
                                
                               </tr>
                               <tr>
                                    <th>Level-1, Term-2: </th>
                                    <td><?php echo $row['l1t2']?></td>
                                
                               </tr>
                               <tr>
                                    <th>Level-2, Term-1: </th>
                                    <td><?php echo $row['l2t1']?></td>
                                
                               </tr>
                               <tr>
                                    <th>Level-2, Term-2: </th>
                                    <td><?php echo $row['l2t2']?></td>
                                
                               </tr>
                               <tr>
                                    <th>Level-3, Term-1: </th>
                                    <td><?php echo $row['l3t1']?></td>
                                
                               </tr>
                               <tr>
                                    <th>Level-3, Term-2: </th>
                                    <td><?php echo $row['l3t2']?></td>
                                
                               </tr>
                               <tr>
                                    <th>Level-4, Term-1: </th>
                                    <td><?php echo $row['l4t1']?></td>
                                
                               </tr>
                               <tr>
                                    <th>Level-4, Term-2: </th>
                                    <td><?php echo $row['l4t2']?></td>
                                
                               </tr>
                               <tr>
                                    <td>
                                        <a href="edit_std.php?id=<?php echo $row['std_id'];?>">Edit</a> 
                                    </td>
                                    <td>
                                        <a href="delete_std.php?id=<?php echo $row['std_id'];?>">Delete</a> 
                                    </td>
                               </tr>
                                
                        <?php
                            }
                            }
                        ?>

                    </table>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

